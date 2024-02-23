<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemLog extends Model
{
    use HasFactory;
    public $table = 'sys_log';
    protected $guarded = ['id_log'];
    protected $primaryKey = 'id_log';

    //Relationship one to many with table users (user who made the action)
    // public function user() {
    //     return $this->belongsTo('App\Models\User', 'id_usuario');
    // }
    
    // /**
    //  * Get all of the owning system_logable models.
    //  */
    // public function system_logable()  
    // { 
    //     return $this->morphTo();  
    // } 
}
