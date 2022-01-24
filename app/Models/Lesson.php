<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    protected $table = "lessons";
    public $timestamps = false;
    protected $fillable = ['instructor_id', 'student_id', 'pickup_address', 'pickup_postal_code', 'pickup_city', 'start_date', 'end_date', 'goal', 'result', 'comment'];

    public function instructors(){
        return $this->belongsTo(Instructor::class, 'instructor_id');
    }
    public function students(){
        return $this->belongsTo(Student::class, 'student_id');
    }
}
