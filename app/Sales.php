<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $table = 'sales';
    protected $fillable = ['kode_transaksi', 'tanggal_transaksi','customer_id', 'item_id', 'qty', 'total_diskon', 'total_harga', 'total_bayar'];
}
