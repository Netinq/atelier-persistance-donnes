<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
    use HasFactory;

    protected $fillable = ['titre', 'date_de_parution', 'nombre_de_pages', 'auteur_id', 'actif'];
    public $timestamps = false;

    public function emprunts()
    {
        return $this->hasMany(Emprunt::class);
    }

    public function auteur()
    {
        return $this->belongsTo(Auteur::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Categorie::class);
    }
}
