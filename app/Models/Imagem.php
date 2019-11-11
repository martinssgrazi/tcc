<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Imagem extends Model
{
    //uma imagem pertence a uma pagina
    public function pagina()
    {
        return $this->belongsTo('App\Models\Pagina');
    }
}