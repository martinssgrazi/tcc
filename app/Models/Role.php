<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Role extends Model
{
    //um papel pode conter muitos usuarios
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
