<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageRole extends Model
{
    protected $table = 'page_role';
    protected $fillable = ['role_id', 'page_id'];
    public $timestamps = false;
   
}
