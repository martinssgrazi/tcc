<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Tentativa extends Model
{
    //
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function avaliacao()
    {
        return $this->belongsTo('App\Models\Avaliacao');
    }
}