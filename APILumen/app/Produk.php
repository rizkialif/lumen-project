<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class Produk extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
     public $timestamps = false;
     protected $table = 'produk';
     protected $fillable = [
         'nama','stok','harga'
     ];

     // JIKA ADA RELASI TABEL
    // public function kategori() 
    // {
    //     return $this->belongsTo('App\Kategori');
    // }
    
    // harus dideklarasi primary keynya dan incrementing jika tidak menggunakan "id" sebagai pk
    // protected $primaryKey = 'kode_barang';
    // public $incrementing = false;

}
