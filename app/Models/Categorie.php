<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
protected $fillable=['title','description'];

    public function souscategories()
    {
        return $this->hasMany(SousCategorie::class);
    }
}
