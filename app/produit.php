<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class produit extends Model
{
    public $fillable = ['label', 'prix', 'quantite'];
}
