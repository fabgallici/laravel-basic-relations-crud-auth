<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //Non servirebbe avendo usato il nome del model al singolare e la tabella al plurale
    protected $table = 'posts';
    
    //Le colonne che vogliamo salvare e editare durante i salvataggi
    protected $fillable = ['category_id', 'title', 'author'];

    //Un post ha una categoria, una categoria avrà diversi post
    public function postInformation()
    {
        return $this->hasOne('App\PostInformation');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

}
