<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    use HasFactory;

    public $table = 'contactinfo';

    protected $primaryKey = 'idUser';
    public $timestamps = false;
    protected $fillable = ['rayon','street','house','apartament','firstNumber','secondNumber','thirdNumber','skype','telegram','whatsapp','viber','vk','instagram','discord','myWeb'];
}
