<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;
    protected $fillable=['contenu','id_user','id_annonce'];

public function annonce()
{
    return $this->belongsTo(annonce::class, 'id_annonce');
}

public function user() {
    return $this->belongsTo(User::class, 'id_user'); 
}
    
}

