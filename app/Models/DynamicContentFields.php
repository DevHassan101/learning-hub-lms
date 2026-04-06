<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DynamicContentFields extends Model
{
    use HasFactory;
    public function dynamicContent(){
        return $this->belongsTo(DynamicContent::class);
    }
}
