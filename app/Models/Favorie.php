<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorie extends Model
{
    /** @use HasFactory<\Database\Factories\FavorieFactory> */
    use HasFactory;

    protected $fillable = ['user_id', 'produit_id'];
    protected $table = 'favoriee';
    

}
