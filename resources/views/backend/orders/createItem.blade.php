@extends ('backend.layouts.app')


@section('breadcrumb-links')
@endsection

@section('content')

       <div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h2 class="card-title mb-0">
                Add new item :
                </h2>
                </div>
                </div>
                <div class="row mt-4">
            <div class="col">
          
        
        <!--our form-->
            <form method="post" id="loc-form" action="/admin/order/{{$order_id}}/item/create" >
    		 {{csrf_field()}}

   <div class="form-group">
   <label>
   Item number:
   </label>
   <input type="number" name="item_id" required="required" class="form-control">
   </div>
   <div class="form-group">
   <label>
   Item Name:
   </label>
   <input type="text" name="item_name" class="form-control">
   </div>
   



   <button type="button" class="btn btn-success"  onclick="document.getElementById('loc-form').submit()"> Add </button>
</form>
                        
</div>
          
            </div>
            </div>
            </div>

          

@endsection