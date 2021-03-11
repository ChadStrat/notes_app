<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Note extends Model{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'note',
    ];

    public static function boot()
    {
        parent::boot();

        self::creating(function($model){
            $model['user_id'] = Auth::user()->id;
        });
    }

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
    
}
?>