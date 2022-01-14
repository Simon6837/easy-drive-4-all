<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    use HasFactory;
    protected $table = "registers";
    public $timestamps = false;
    protected $fillable = ['first_name', 'last_name', 'birthday', 'postcode', 'adress', 'email', 'processed', 'register_day'];

    public function users(){
        return $this->belongsTo(User::class, 'email');
    }
}
