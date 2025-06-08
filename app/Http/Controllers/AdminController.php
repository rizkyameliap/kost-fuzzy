<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kost;
use App\Models\Criteria;
use App\Models\SawResult;
use App\Services\FuzzySawService;

class AdminController extends Controller
{
    protected $fuzzySawService;
    
    public function __construct(FuzzySawService $fuzzySawService)
    {
        $this->middleware('auth');
        $this->fuzzySawService = $fuzzySawService;
    }
    
    public function dashboard()
    {
        $totalKosts = Kost::count();
        $activeCriteria = Criteria::where('is_active', true)->count();
        $lastCalculation = SawResult::latest('calculated_at')->first();
        
        return view('admin.dashboard', compact('totalKosts', 'activeCriteria', 'lastCalculation'));
    }
    
    public function kosts()
    {
        $kosts = Kost::paginate(10);
        return view('admin.kosts.index', compact('kosts'));
    }
    
    public function createKost()
    {
        return view('admin.kosts.create');
    }
    
    public function storeKost(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'owner_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'price_per_year' => 'required|numeric|min:0',
            'distance_to_campus' => 'required|integer|min:0',
            'facility_count' => 'required|integer|min:0',
            'cleanliness' => 'required|in:Ya,Cukup,Tidak',
            'security' => 'required|in:Ya,Tidak',
            'food_access' => 'required|in:Mudah,Sulit',
        ]);
        
        $facilities = $request->facilities ? explode(',', $request->facilities) : [];
        
        Kost::create([
            'name' => $request->name,
            'address' => $request->address,
            'owner_name' => $request->owner_name,
            'phone' => $request->phone,
            'price_per_year' => $request->price_per_year,
            'distance_to_campus' => $request->distance_to_campus,
            'facility_count' => $request->facility_count,
            'cleanliness' => $request->cleanliness,
            'security' => $request->security,
            'food_access' => $request->food_access,
            'facilities' => $facilities,
            'description' => $request->description,
        ]);
        
        return redirect()->route('admin.kosts')->with('success', 'Data kost berhasil ditambahkan.');
    }
    
    public function editKost(Kost $kost)
    {
        return view('admin.kosts.edit', compact('kost'));
    }
    
    public function updateKost(Request $request, Kost $kost)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'owner_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'price_per_year' => 'required|numeric|min:0',
            'distance_to_campus' => 'required|integer|min:0',
            'facility_count' => 'required|integer|min:0',
            'cleanliness' => 'required|in:Ya,Cukup,Tidak',
            'security' => 'required|in:Ya,Tidak',
            'food_access' => 'required|in:Mudah,Sulit',
        ]);
        
        $facilities = $request->facilities ? explode(',', $request->facilities) : [];
        
        $kost->update([
            'name' => $request->name,
            'address' => $request->address,
            'owner_name' => $request->owner_name,
            'phone' => $request->phone,
            'price_per_year' => $request->price_per_year,
            'distance_to_campus' => $request->distance_to_campus,
            'facility_count' => $request->facility_count,
            'cleanliness' => $request->cleanliness,
            'security' => $request->security,
            'food_access' => $request->food_access,
            'facilities' => $facilities,
            'description' => $request->description,
        ]);
        
        return redirect()->route('admin.kosts')->with('success', 'Data kost berhasil diupdate.');
    }
    
    public function destroyKost(Kost $kost)
    {
        $kost->delete();
        return redirect()->route('admin.kosts')->with('success', 'Data kost berhasil dihapus.');
    }
    
    public function criteria()
    {
        $criteria = Criteria::all();
        return view('admin.criteria.index', compact('criteria'));
    }
    
    public function updateCriteria(Request $request)
    {
        $request->validate([
            'criteria' => 'required|array',
            'criteria.*.weight' => 'required|numeric|min:0|max:10'
        ]);
        
        foreach ($request->criteria as $id => $data) {
            Criteria::find($id)->update(['weight' => $data['weight']]);
        }
        
        return redirect()->route('admin.criteria')->with('success', 'Bobot kriteria berhasil diupdate.');
    }
    
    public function calculateSaw()
    {
        $result = $this->fuzzySawService->processKostData();
        
        if ($result['success']) {
            return redirect()->route('admin.results')->with('success', $result['message']);
        } else {
            return back()->with('error', $result['message']);
        }
    }
    
    public function results()
    {
        $results = SawResult::with('kost')->orderBy('rank', 'asc')->get();
        return view('admin.results.index', compact('results'));
    }
}