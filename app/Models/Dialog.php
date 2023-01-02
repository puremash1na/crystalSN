<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dialog extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'firstID';
    protected $fillable = ['firstID', 'secondID', 'datentime', 'messageText'];
    protected $dateFormat = 'd/m/Y H:i:s';
}
