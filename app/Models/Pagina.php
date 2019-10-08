<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Pagina extends Model
{
    //uma pagina pertence a um tutorial
    public function tutorial()
    {
        return $this->belongsTo('App\Tutorial');
    }
    //uma pagina contem muitas imagens
    public function imagens()
    {
        return $this->hasMany('App\Imagem');
    }
}