<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function points() {
        return $this->hasMany(PlanPoint::class);
    }
    public function category() {
        return $this->belongsTo(Category::class);
    }
}
