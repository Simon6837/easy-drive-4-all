<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;
    protected $table = "instructors";
    public $timestamps = false;
    protected $fillable = ['user_id', 'description', 'photo'];

    public function instructor(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
