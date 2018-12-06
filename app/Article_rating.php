<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article_rating extends Model
{
    protected $primaryKey = 'comment_id';
    public $timestamps = true;  
}
