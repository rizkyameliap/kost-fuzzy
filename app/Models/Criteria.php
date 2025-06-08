<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    use HasFactory;

    protected $table = 'criteria';

    protected $fillable = [
        'code', 'name', 'description', 'weight', 'type', 'is_active'
    ];

    protected $casts = [
        'weight' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    public function kostEvaluations()
    {
        return $this->hasMany(KostEvaluation::class);
    }

    public function isBenefit()
    {
        return $this->type === 'benefit';
    }

    public function isCost()
    {
        return $this->type === 'cost';
    }
}