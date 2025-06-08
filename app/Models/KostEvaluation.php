<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KostEvaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        'kost_id', 'criteria_id', 'raw_value', 'fuzzy_value', 'normalized_value'
    ];

    protected $casts = [
        'raw_value' => 'decimal:2',
        'fuzzy_value' => 'decimal:2',
        'normalized_value' => 'decimal:6',
    ];

    public function kost()
    {
        return $this->belongsTo(Kost::class);
    }

    public function criteria()
    {
        return $this->belongsTo(Criteria::class);
    }
}