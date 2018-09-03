<?php

namespace App\Models\Order\Traits\Relationship;
use App\Models\Auth\User;
use App\Models\Order\Item;
use App\Models\Order\Location;


trait OrderRelationship
{

	 public function user() 
	 {
        return $this ->belongsTo(User::class);
     }

     public function item()
     {
     	return $this ->hasMany(Item::class);
     }

     public function location() 
     {
        return  $this ->hasOne(Location::class);
	 }


}
?>