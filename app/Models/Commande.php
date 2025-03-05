<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;


    protected $fillable = [
        'client_id',
        'prix_totale',
        'status',
    ];

    public function commandesItems()
    {
        return $this->hasMany(CommandeItems::class);
    }



}
