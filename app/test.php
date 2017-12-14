<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class test extends Model
{
    protected $table = 'proses';
    protected $fillable = ['satu','dua','tiga','empat','lima','enam','tujuh','delapan',];
    public $timestamps = false;
}
