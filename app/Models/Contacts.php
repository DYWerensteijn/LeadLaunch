<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'name',
        'e-mail',
        'phone_number',
        'primary_company',
        'city',
        'contact_owner',
        'lead_status',
    ];
}
