<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Avaliacao extends Model
{
    //uma avaliacao contém várias perguntas
    public function perguntas()
    {
        return $this->hasMany('App\Models\Pergunta');
    }
    //uma avaliacao pode ser tentada várias vezes
    public function tentativas()
    {
        return $this->hasMany('App\Models\Tentativa');
    }
}
