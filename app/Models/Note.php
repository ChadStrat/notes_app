<?php
namespace App\Models;

class Note extends Model{
    public function user(){
        return $this->belongsTo('App\User');
    }
}
?>