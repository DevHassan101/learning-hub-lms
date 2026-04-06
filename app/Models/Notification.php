<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $cast = ['read_by' => 'array'];


    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function isReadBy($userId)
    {
        return in_array($userId, json_decode($this->read_by) ?? []);
    }
}
