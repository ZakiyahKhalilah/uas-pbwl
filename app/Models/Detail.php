<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;
    
    protected $table = "tb_penjualan_detail";

    protected $primaryKey = 'transaksi_detail_id';

    protected $guarded = [];

}
