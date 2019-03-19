<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class buku extends Model
{
    protected $table = 'books';

    protected $fillable = [
        'id', 'title', 'slug','description','author','publisher','cover','price','views',
        'stock','status','created_by','updated_by','deleted_by','created_at',"update_at","delete_at"
    ];
}











