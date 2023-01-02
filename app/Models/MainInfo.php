<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainInfo extends Model
{
    use HasFactory;

    public $table = 'maininfo';

    protected $primaryKey = 'idUser';
    public $timestamps = false;
    protected $fillable = ['datebirth','firstEdu','secondEdu','thirdEdu','firstEduStartEnd','secondEduStartEnd','thirdEduStartEnd'];
}
