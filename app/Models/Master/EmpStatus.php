<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpStatus extends Model
{
    use HasFactory;
    public $table = 'emp_status';
    protected $guarded = ['id_emp_status'];
    protected $primaryKey = 'id_emp_status';
}
