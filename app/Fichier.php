<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fichier extends Model
{
    protected $fillable = ['title', 'cat', 'description', 'user_id', 'file', 'image', 'status'];
}
