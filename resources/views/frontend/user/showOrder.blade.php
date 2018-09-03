@extends('frontend.layouts.app')

@section('content')
@if (session('alert'))
    <div class="alert alert-success">
        {{ session('alert') }}
    </div>
@endif

<div class="row mb-4 text-center">
        <div class="col">
            <div class="card">
                <div class="card-header" style="background-color: #60b119; width: 100%; height: 80px; ">
                    <strong>
                     <h1 style="color: white;">
                        <i class="fas fa-tachometer-alt"></i>Order details
                    </h1>
                    </strong>
                </div><!--card-header-->

                <div class="card-body">
                    <div class="row">
                    <div style="width: 500px; height: 500px; margin:0 auto;" >
						{!! Mapper::render() !!}
					</div>

          <table class="table">
                        <thead>
                        <tr style="background-color:  #a8b0a2 ;">
                            <th> Item Id </th>
                            <th> Item name</th>
                            <th> Order ID</th>
                        </tr>
                        </thead>
                        <tbody>
          @foreach ($items as $item)
<tr style="background-color:  #eaeee7 ;">
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->item_name }}</td>
                                <td> {{ $item->order_id}} </td>                                
                            </tr>
@endforeach
 </tbody>
                    </table>


              @if ($order->is_picked == 0) 
 <div class="row" style="width: 100%;">
    <div class="col-sm">
    <form method="post" id="pick-form" action="pick" >
     {{csrf_field()}}
   <input type="hidden" name="_method" value="PUT">

   <input type='hidden' name='id' value="{{$order->id}}">

   <button type="button" class="btn btn-success"  onclick="document.getElementById('pick-form').submit()" style="background-color: #60b119;"> Pick </button>
</form>

 <form method="post" id="fail-form" action="fail" >
     {{csrf_field()}}
   <input type="hidden" name="_method" value="PUT">

   <input type='hidden' name='id' value="{{$order->id}}">

   <button type="button" class="btn btn-danger"  onclick="document.getElementById('fail-form').submit()" style="background-color: #f53d3d;"> Fail </button>
</form>

</div>

    @else
    <div class="col-sm">

    <span> Order is Picked </span>
        </div>

    @endif
@if ($order->is_picked == 1) 
 <div class="col-sm">     
<form method="post" id="deliver-form" action="deliver" >
     {{csrf_field()}}
   <input type="hidden" name="_method" value="PUT">
   <input type='hidden' name='id' value="{{$order->id}}">

   <button type="button" class="btn btn-success" onclick="document.getElementById('deliver-form').submit()" style="background-color: #60b119;"> Delivered </button>
</form>
<form method="post" id="fail-form" action="fail" >
     {{csrf_field()}}
   <input type="hidden" name="_method" value="PUT">

   <input type='hidden' name='id' value="{{$order->id}}">

   <button type="button" class="btn btn-danger"  onclick="document.getElementById('fail-form').submit()" style="background-color: #f53d3d;"> Fail </button>
</form>
</div>
    @endif
    </div>
    </div>
     </div><!-- row -->
                   <div class="card-footer text-center" >
  <button type="button" class="btn btn-success footerbtn" onclick="location.href='{{ url('history') }}'"  style="background-color: #60b119;"><h4>History</h4></button>
                   
                    </div>


                    </div>
                    </div>
                    </div>
                    </div>

@endsection                    