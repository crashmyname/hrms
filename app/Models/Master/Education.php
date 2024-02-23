<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;
    public $table = 'education';
    protected $guarded = ['id_education'];
    protected $primaryKey = 'id_education';
}
