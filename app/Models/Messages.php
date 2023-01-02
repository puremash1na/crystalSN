<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'firstID';
    protected $fillable = ['firstID', 'secondID', 'datentime', 'messageText'];
}
