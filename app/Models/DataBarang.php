<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBarang extends Model
{
    use HasFactory;

    protected $table = 'data_barang';

    //tentukan bahwa idbarang merupakan primarykey
    protected $primaryKey = 'idbarang';

    //Set untuk non-increment ID
    public $incrementing = false;

    //set tipe data ID menjadi string (karena id manual jadi bisa berupa string)
    protected $keyType = 'string';

    //menentukan kolom yang bisa diisi
    protected $fillable = [
        'idbarang',
        'nama_barang',
        'harga',
        'stok',
        'foto'
    ];

    public $timestamps = false;
}
