<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;
    protected $table='role'; // Eloquent akan membuat model mahasiswa menyimpan record di tabel mahasiswa
    protected $primaryKey = 'id'; // Memanggil isi DB Dengan primarykey
/**
 * The attributes that are mass assignable.
 *
 * @var array
 */
    protected $fillable = [
    'role_name',
    ];

    public function user(){
        return $this->hasMany(User::class);
    }
}
