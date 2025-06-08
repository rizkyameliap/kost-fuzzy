<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kost extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'address', 'owner_name', 'phone', 'price_per_year',
        'distance_to_campus', 'facility_count', 'cleanliness', 
        'security', 'food_access', 'facilities', 'description', 'is_active'
    ];

    protected $casts = [
        'price_per_year' => 'decimal:2',
        'facilities' => 'array',
        'is_active' => 'boolean',
    ];

    public function evaluations()
    {
        return $this->hasMany(KostEvaluation::class);
    }

    public function sawResult()
    {
        return $this->hasOne(SawResult::class);
    }

    public function getFormattedPriceAttribute()
    {
        return 'Rp ' . number_format($this->price_per_year, 0, ',', '.');
    }

    public function getDistanceInKmAttribute()
    {
        return round($this->distance_to_campus / 1000, 2);
    }
}