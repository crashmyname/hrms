<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
    public $table = 'position';
    protected $guarded = ['id_position'];
    protected $primaryKey = 'id_position';
}
