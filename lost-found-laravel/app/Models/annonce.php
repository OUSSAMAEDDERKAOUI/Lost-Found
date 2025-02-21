<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class annonce extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'type',
        'description',
        'image',
        'lieu',
        'phone',
        'user_id', 
        'categorie_id', 
    ];
    protected $guarded=[];

    public function user(){
        return $this->belongsTo(User::class);
     }

     
public function comments()
{
    return $this->hasMany(comment::class, 'id_annonce');
}

     
}
