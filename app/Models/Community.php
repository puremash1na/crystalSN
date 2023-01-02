<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    use HasFactory;

    public $table = 'community';
    public $timestamps = false;
    protected $fillable = ['name', 'shortname', 'password',];
}
