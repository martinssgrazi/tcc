<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Pergunta extends Model
{
    //uma pergunta pertence a uma avaliacao
    public function avaliacao()
    {
        return $this->belongsTo('App\Avaliacao');
    }
    //uma pergunta contém várias respostas.
    public function respostas()
    {
        return $this->hasMany('App\Resposta');
    }
}