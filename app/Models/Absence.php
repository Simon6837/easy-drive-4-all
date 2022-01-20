<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    use HasFactory;
    protected $table = "absence";
    protected $fillable = ['instructor_id', 'reason', 'start_date', 'end_date', 'created_at', 'updated_at'];
}
