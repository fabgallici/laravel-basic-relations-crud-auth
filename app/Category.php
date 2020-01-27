<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //Non servirebbe avendo usato il nome del model al singolare e la tabella al plurale
    protected $table = 'categories';

    protected $fillable = ['title', 'slug'];

    public function posts()
    {
        return $this->hasMany('App\Post');
    }
    
}
