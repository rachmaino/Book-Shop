<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    protected $table = 'category';

    protected $fillable = [
        'parent_id', 'name', 'description','url','status',
    ];
}
