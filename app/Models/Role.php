<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Role extends Model
{
	protected $fillable = ['nome'];
    //um papel pode conter muitos usuarios
    public function users()
    {
        return $this->belongsToMany('App\User', 'role_user')->withPivot('id');
    }
}
