<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $table = 'data';
    protected $fillable = ['pembayaran_tertinggi','pembayaran_terendah','tips_tertinggi','tips_terendah','pelayanan_tertinggi','pelayanan_terendah','user_id'];
     public $timestamps = false;
}
