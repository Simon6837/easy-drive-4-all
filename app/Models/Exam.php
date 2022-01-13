<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $table = "exams";
    public $timestamps = false;
    protected $fillable = ['student_id', 'description', 'date', 'result'];

    public function exams(){
        return $this->belongsTo(Student::class, 'student_id');
    }
}
