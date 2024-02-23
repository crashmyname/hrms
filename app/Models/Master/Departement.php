<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    use HasFactory;
    public $table = 'departement';
    protected $guarded = ['id_dept'];
    protected $primaryKey = 'id_dept';

    //Relasi One to Many dengan Karyawan
    // public function karyawan() {
    //     return $this->hasMany(Karyawan::class, 'id_jabatan', 'id_dept');
    // }
}
