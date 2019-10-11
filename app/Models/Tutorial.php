<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Tutorial extends Model {
    protected $table = 'tutoriais';

    //um tutorial tem muitas paginas
    public function paginas()
    {
        return $this->hasMany('App\Pagina');
    }
    //um tutorial eh criado por um usuario
    //com papel de moderador (deve ser verificado no momento
    //da criação) 
    public function criador()
    {
        return $this->belongsTo('App\User');
    }
    //um tutorial pode ser estudado por
    //muitos usuarios
    public function estudos()
    {
        return $this->hasMany('App\Estudo');
    }
}
