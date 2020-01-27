<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostInformation extends Model
{
    protected $table = 'posts_information';
 
    //Le colonne che vogliamo salvare e editare durante i salvataggi
    protected $fillable = ['post_id', 'description', 'slug'];

    public function post()
    {
        return $this->belongsTo('App\Post');
    }

}
