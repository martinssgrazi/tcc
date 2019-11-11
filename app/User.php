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
    public function roles(){
        return $this->belongsToMany('App\Role')->withPivot('id')->withTimestamps();
    }

    public function hasAnyRoles($roles){
        return null !== $this->roles()->whereIn('nome', $roles)->first(); 
    }

    public function hasAnyRole($role){
        return null !== $this->roles()->where('nome', $role)->first(); 
    }
    //um usuario pode criar vários tutoriais
    //se ele for moderador
    public function tutoriais()
    {
        return $this->hasMany('App\Models\Tutorial');
    }
    //um usuario pode estudar varios tutoriais
    public function estudos()
    {
        return $this->hasMany('App\Models\Estudo');
    }
    public function tentativas()
    {
        return $this->hasMany('App\Models\Tentativa');
    }

}