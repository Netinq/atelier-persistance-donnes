<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emprunt extends Model
{
    use HasFactory;

    protected $fillable = ['date_fin_prevue', 'date_emprunt', 'date_retour', 'adherent_id', 'livre_id'];
    public $timestamps = false;

    public function livre()
    {
        return $this->belongsTo(Livre::class);
    }

    public function adherent()
    {
        return $this->belongsTo(Adherent::class);
    }
}
