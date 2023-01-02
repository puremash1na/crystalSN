<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    use HasFactory;

    public $table = 'users';
    public $timestamps = false;
    protected $fillable = ['name', 'shortname', 'password',];
}
