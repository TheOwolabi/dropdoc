<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function filiere()
    {
        return $this->belongsTo(Filiere::class);
    }


    protected $fillable = [
        'nom',
        'description',
        'duree',
        'debut',
        'fin',
        'user_id',
        'filiere_id'
    ];

}
