<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Post extends Model
{
    //table name
    protected $table='posts';
    //primary key <you can also change primary key>
    public $primaryKey='id';
    //timestamp
    public $timestamps = true;
public function user()
{
    return $this->belongsTo('App\User');
}
}
