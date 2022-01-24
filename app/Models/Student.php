<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = "students";
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'address',
        'city',
        'postal_code',
        'lessons_to_go'
    ];
//    protected $with = ['user'];

   public function user()
   {
       return $this->belongsTo(User::class, 'user_id');
   }
}
