<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class produit extends Model
{
    /** @use HasFactory<\Database\Factories\ProduitFactory> */
    use HasFactory;
    

    protected $fillable = [ 'nom', 'description', 'prix', 'image_url', 'stock', 'categorie_id','is_favorited' ];
    
    public function categorie()
    {
        return $this->belongsTo(categorie::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
