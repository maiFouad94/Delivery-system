<?php

namespace App\Models\Order;
use App\Models\Order\Traits\Relationship\ItemRelationship;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    use 
        ItemRelationship;


    protected $fillable = [
        'order_id',
        'item_name',
        'item_id'

    ];
}
