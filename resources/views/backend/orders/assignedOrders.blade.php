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

            <!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr >
                            <th>Order number</th>
                            <th>Customer Name </th>
                            <th>Phone </th>
                            <th>Destination </th>
                            <th>Picked</th>
                            <th>Assigned to</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($orders as $order)
                            <tr class='clickable-row' data-href='{{ url('/admin/orders/'.$order->id.'/show') }}'>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->user_name }}</td>
                                <td>{{ $order->phone }}</td>
                                <td>{{ $order->dest_address }}</td>
                                @if($order->is_picked)
                                <td>
                                <img src="/img/frontend/true.png" width="50" height="50"></td>
                                @else
                                <td>
                                <img src="/img/frontend/pending2.png" width="50" height="50">
                                </td>
                                @endif
                                <td>{{ $order->user->name }}</td>
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
