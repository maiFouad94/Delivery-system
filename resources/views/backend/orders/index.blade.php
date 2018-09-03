@extends ('backend.layouts.app')


@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">

                </h4>
            </div><!--col-->
<div class="col-sm-7">
                <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
    <a href="/admin/order/new" class="btn btn-success ml-1" data-toggle="tooltip" title="Create New"><i class="fas fa-plus-circle"></i></a>
</div><!--btn-toolbar-->
            </div><!--col-->
            <!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Order number</th>
                            <th>Customer Name </th>
                            <th>Phone </th>
                            <th>Destination </th>
                            <th>Assigne To</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($orders as $order)
                            <tr >
                                <td class='clickable-row' data-href='{{ url('/admin/orders/'.$order->id.'/show') }}'>{{ $order->id }}</td>
                                <td class='clickable-row' data-href='{{ url('/admin/orders/'.$order->id.'/show') }}'>{{ $order->user_name }}</td>
                                <td class='clickable-row' data-href='{{ url('/admin/orders/'.$order->id.'/show') }}'>{{ $order->phone }}</td>
                                <td class='clickable-row' data-href='{{ url('/admin/orders/'.$order->id.'/show') }}'> {{ $order->dest_address }}</td>
                                <td><button type="button" class="btn btn-success" onclick="location.href='{{ url('/admin/orders/'.$order->id) }}'">Assign to</button></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!--col-->
        </div><!--row-->
     
    </div><!--card-body-->
</div><!--card-->

@endsection
