<?php

namespace App\Models\Order\Traits\Relationship;


trait ItemRelationship
{

	 public function order() 
	 {
        return $this ->belongsTo(Order::class);
     }

}

?>