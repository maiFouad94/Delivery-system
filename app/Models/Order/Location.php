<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //

     protected $fillable = [
     'src_address',
     'lat',
     'long'
     ];
}
