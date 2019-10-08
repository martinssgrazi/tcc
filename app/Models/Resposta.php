<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Resposta extends Model
{
    //uma resposta pertence a uma pergunta
    public function pergunta()
    {
        return $this->belongsTo('App\Pergunta');
    }
}
