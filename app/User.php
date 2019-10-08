<?php
namespace App;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class User extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    //um usuario pode conter muitos papeis
    function roles(){
        return $this->belongsToMany('App\Models\Role');
    }
    //um usuario pode criar vários tutoriais
    //se ele for moderador
    public function tutoriais()
    {
        return $this->hasMany('App\Tutorial');
    }
    //um usuario pode estudar varios tutoriais
    public function estudos()
    {
        return $this->hasMany('App\Estudo');
    }
    public function tentativas()
    {
        return $this->hasMany('App\Tentativa');
    }
    
}