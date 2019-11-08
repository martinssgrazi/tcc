<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Role extends Model
{
	protected $fillable = ['nome'];
    //um papel pode conter muitos usuarios
    public function users()
    {
        return $this->belongsToMany('App\User')->withPivot('id')->withTimestamps();
    }
}
