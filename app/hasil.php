<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hasil extends Model
{
    protected $table = 'hasil';
    protected $fillable = ['hasil','total_biaya','durasi','data_id','user_id'];
}
