@extends('frontend.layouts.app')

@section('content')
@if (session('alert'))
    <div class="alert alert-success">
        {{ session('alert') }}
    </div>
@endif

    <div class="row mb-4">
        <div class="col">
            <div class="card" >
                <div class="card-header" style="background-color: #60b119; width: 100%; height: 80px; ">
               
                    <strong >
                    <h1 style="color: white;">
                        <i class="fas fa-tachometer-alt" ></i> {{ __('navs.frontend.dashboard') }}
                        </h1>
                    </strong>
                </div><!--card-header-->

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 col-xs-12 order-1 order-sm-2  mb-4">
                            <div class="card  bg-light">
                                <img class="card-img-top" src="{{ $logged_in_user->picture }}" alt="Profile Picture" style="width:100%">

                                <div class="text">
                                    <h1>
                                        {{ $logged_in_user->name }}<br/>
                                    </h1>

                                    <p class="card-text">
                                        
                                            <i class="fas fa-envelope"></i> {{ $logged_in_user->email }}<br/>
                                            <i class="fas fa-calendar-check"></i> {{ __('strings.frontend.general.joined') }} {{ $logged_in_user->created_at->timezone(get_user_timezone())->format('F jS, Y') }}
                                    </p>

                                    <p class="card-text">

                                        <a href="{{ route('frontend.user.account')}}" class="btn btn-info btn-sm mb-1" style="background-color: #60b119;">
                                            <i class="fas fa-user-circle"></i> {{ __('navs.frontend.user.account') }}
                                        </a>

                                        @can('view backend')
                                            &nbsp;<a href="{{ route ('admin.dashboard')}}" class="btn btn-danger btn-sm mb-1">
                                                <i class="fas fa-user-secret"></i> {{ __('navs.frontend.user.administration') }}
                                            </a>
                                        @endcan
                                    </p>
                                    <p>
                                     <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal" style="background-color: #60b119;">Show Source</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Source address</h4>
      </div>
      <div class="modal-body">
      <div>
          <p>
              {{ $location -> src_address }}
          </p>
      </div>
         <div style="width: 300px; height: 500px; margin:0 auto;" >
                        {!! Mapper::render() !!}
                    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" style="background-color: #60b119; color: white;">Close</button>
      </div>
    </div>

  </div>
</div>   
                                    </p>
                                </div>
                            </div>

                            
                        </div><!--col-md-4-->
                      
            <div class="col-md-8 col-xs-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr style="background-color:  #a8b0a2 ;">
                            <th>Order number</th>
                            <th>Destination address </th>
                            <th>Customer Name</th>
                            <th>Mobile number</th>
                            <th>Picked </th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($orders as $order)
                            <tr style="background-color:  #eaeee7 ;" class='clickable-row' data-href='{{ url('/orders/'.$order->id) }}'>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->dest_address }}</td>
                                <td>{{ $order->user_name }}</td>
                                <td>{{ $order->phone  }}</td>
                                @if($order->is_picked)
                                <td>
                                <img src="/img/frontend/true.png" width="50" height="50"></td>
                                @elseif($order->is_picked == 0 && $order->is_failed == 0)
                                <td>
                                <img src="/img/frontend/pending2.png" width="50" height="50">
                                </td>
                                @else
                                <td>
                                    <img src="/img/frontend/false.png" width="50" height="50">
                                </td>    
                                @endif                          
                                <td><button type="button" class="btn btn-success" onclick="location.href='{{ url('/orders/'.$order->id) }}'" style="background-color: #60b119;">Show</button></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!--col-->


                            </div><!--row-->
                        </div><!--col-md-8-->
                    </div><!-- row -->
                   <div class="card-footer text-center" >
  <button type="button" class="btn btn-success footerbtn" onclick="location.href='{{ url('history') }}'"  style="background-color: #60b119;">History</button>
                   
                    </div>
                </div> <!-- card-body -->
            </div><!-- card -->
        </div><!-- row -->
    </div><!-- row -->
   
@endsection
