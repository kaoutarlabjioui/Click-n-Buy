<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandeItems extends Model
{
    use HasFactory;

  protected  $fillable = [
    'produit_id',
    'commande_id',
    'prix',
    'quantite'
  ];

  public function commande()
  {
      return $this->hasOne(Commande::class, 'commande_id');
  }

  public function produit()
  {
      return $this->BelongsTo(Produit::class, 'produit_id');
  }



}
