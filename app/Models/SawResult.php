<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SawResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'kost_id', 'final_score', 'rank', 'calculated_at'
    ];

    protected $casts = [
        'final_score' => 'decimal:6',
        'calculated_at' => 'datetime',
    ];

    public function kost()
    {
        return $this->belongsTo(Kost::class);
    }
}