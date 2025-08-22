<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'description',
        'for_who',
        'is_popular',
    ];

    public function plan_features()
    {
        return $this->hasMany(PlanFeature::class);
    }
}
