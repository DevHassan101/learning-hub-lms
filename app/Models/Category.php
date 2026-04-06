<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded  = ['id'];

    public function plans() {
        return $this->hasMany(Plan::class);
    }
    public function courses() {
        return $this->hasMany(Course::class);
    }
}
