<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Estudo extends Model
{
    //
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function tutorial()
    {
        return $this->belongsTo('App\Tutorial');
    }
}
