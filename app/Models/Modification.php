<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modification extends Model
{
    use HasFactory;
    protected $table = "modifications";
    public $timestamps = false;
    protected $fillable = ['lesson_id', 'new_adress', 'new_postcode', 'reason', 'start_date', 'end_date', 'specialty'];

    public function instructors(){
        return $this->belongsTo(Lesson::class, 'lesson_id');
    }
}
