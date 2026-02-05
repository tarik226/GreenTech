<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categorie extends Model
{
    /** @use HasFactory<\Database\Factories\CategorieFactory> */
    use HasFactory;
    protected $guarded = [];
    
    public function produit()
    {
        return $this->hasMany(produit::class);
    }

    public function parent() 
    { 
        return $this->belongsTo(categorie::class, 'parent_id'); 
    } 
    
    public function children() 
    { 
        return $this->hasMany(categorie::class, 'parent_id'); 
    }
}
