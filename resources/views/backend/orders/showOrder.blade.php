@extends ('backend.layouts.app')


@section('breadcrumb-links')
@endsection

@section('content')

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                Order Details
                </h4>
            </div><!--col-->
<div class="col-sm-7">
                <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
    <a href="/admin/order/{{$order[0]->id}}/item/new" class="btn btn-success ml-1" data-toggle="tooltip" title="Create New">Add Item</a>
</div><!--btn-toolbar-->
            </div><!--col-->
            <!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        
                        <tr>
                            <td>Order number</td>
                            <td>{{ $order[0]->id }}</td>
                            </tr><tr>
                            <td>Customer Name </td>
                            <td>{{ $order[0]->user_name }}</td>
                            </tr><tr>
                            <td>Phone </td>
                            <td>{{ $order[0]->phone }}</td>
                            </tr><tr>
                            <td>Destination </td>
                            <td>{{ $order[0]->dest_address }}</td>
                            </tr><tr>
                            <td>Status</td>
                            <td>
                        @if($order[0]->is_failed == 1)
                            <img src="/img/frontend/false.png" style="width: 50px; height: 50px;">
                        @elseif($order[0]->is_delivered)
                            <img src="/img/frontend/true.png" style="width: 50px; height: 50px;">
                        @else
                            <img src="/img/frontend/pending2.png" style="width: 50px; height: 50px;">
                        @endif
                            </td>                            </tr><tr>                            
                            <td>Assigned to</td>
                            <td>
                            @if($order[0]->user_id == 0)
                            Not assigned
                            @else
                            {{ $order[0]->user->name }}
                            @endif
                            </td>
                            </tr>

                            <tr>
                                <td><h3>Items:</h3></td><td></td>
                                </tr>
                                <tr>
                                <td>Item number</td><td>Item Name</td><td>Action</td>
                                @foreach ($items as $item)
                                </tr>
                                <tr>
                                <td>{{ $item->item_id }}</td><td>{{ $item->item_name }}</td>
                                <td><button type="button" class="btn btn-success" onclick="location.href='{{ url('/admin/order/'.$order[0]->id.'/item/'.$item->id) }}'">Delete</button></td>
                                                            </tr>

                                @endforeach

                        </tr>
                        
                        

                    </table>
                </div>
            </div><!--col-->
        </div><!--row-->
     
    </div><!--card-body-->
</div><!--card-->

@endsection
