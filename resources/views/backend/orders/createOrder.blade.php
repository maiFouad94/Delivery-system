@extends ('backend.layouts.app')


@section('breadcrumb-links')
@endsection
<head>
        <style type="text/css">
          #map{ width:700px; height: 500px; }
        </style>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyATkVi_q5VW4VhUtmaojf78U36QzcvDi98"></script>
    </head>
@section('content')

       <div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h2 class="card-title mb-0">
                Add new order :
                </h2>
                </div>
                </div>
                <div class="row mt-4">
            <div class="col">
          
        
        <!--our form-->
            <form method="post" id="loc-form" action="/admin/order/create" >
    		 {{csrf_field()}}

   <input type="hidden" id="lat" readonly="yes" name="dest_lat"><br>
   <input type="hidden" id="lng" readonly="yes" name="dest_long">
        
           <div class="form-group">
      <label >   Order number:
</label>

   <input type="number" name="id" required="required" class="form-control">
 </div>
            <div class="form-group">

   <label>Customer Name:</label>
   
   <input type="text" name="user_name" class="form-control" >
   </div>
   <div class="form-group">
   <label>Phone:</label>
   <input type="text" name="phone" class="form-control">
   </div>
   <div class="form-group">
   <label>
   Customer address:
   </label>
   <input type="text" name="dest_address" class="form-control">
     </div>
     <div class="form-group">
     <label>
     Select a location!</label>
        <p>Click on a location on the map to select it. Drag the marker to change location.</p>
        </div>
        <!--map div-->
        <div class="form-group">

        <div id="map" style="width: 300px; height: 300px;"></div>
   </div>
      



   <button type="button" class="btn btn-success"  onclick="document.getElementById('loc-form').submit()"> Add </button>
</form>
                        
</div>
          
            </div>
            </div>
            </div>

          

@endsection