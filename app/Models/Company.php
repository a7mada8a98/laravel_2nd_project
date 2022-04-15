<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table ='companies';

    public function employees(){
        return $this->hasMany(Employee::class,'comp_id');
    }
    
    protected $fillable = [
        'name',
        'email',
        'logo',
        'website',
    ];
}