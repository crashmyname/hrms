<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Religion extends Model
{
    use HasFactory;
    public $table = 'religion';
    protected $guarded = ['id_religion'];
    protected $primrayKey = 'id_religion';
}
