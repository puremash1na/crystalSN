<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publications extends Model
{
    use HasFactory;

    public $table = 'publications';

    protected $primaryKey = 'idAuthor';
    public $timestamps = false;
    protected $fillable = ['typePub', 'datePub', 'countPage', 'titlePub', 'shortDesc', 'messagePub'];
}
