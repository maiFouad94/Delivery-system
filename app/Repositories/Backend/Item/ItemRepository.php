<?php

namespace App\Repositories\Backend\Item;

use App\Models\Order\Item;
use App\Models\Order\Location;

class ItemRepository
{

	protected $item;

	public function __construct(Item $item)
	{
	    $this->item = $item;
	}

    public function createItem(array $data)
    {
        return Item::create($data)->save();
    }

    public function getItems($order_id)
    {
        return Item::where('order_id' , $order_id)->get();
    }

    public function delete($item_id)
    {
        return Item::where('id' , $item_id)->delete();
    }


}

?>