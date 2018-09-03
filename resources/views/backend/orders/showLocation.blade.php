@extends ('backend.layouts.app')


@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection
<head>
       
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyATkVi_q5VW4VhUtmaojf78U36QzcvDi98"></script>
    </head>
@section('content')

       <div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h2 class="card-title mb-0">
                  Current Location :
                </h2>
                </div>
                </div>
                <div class="row mt-4">
            <div class="col">
            @if($location)
            

            <h4>
            	{{ $location->src_address }}
            </h4>
            </p>
            <br/>
            <br/>
            @endif
       
            
            

            <form method="post" id="loc-form" action="location/edit" >
    		 {{csrf_field()}}
           <div class="form-group">
  <h3>Change:</h3>
  <br/>
      <label >Select a location!</label>
          <input type="hidden" id="lat" readonly="yes" name="lat" class="form-control"  >
          <input type="hidden" id="lng" readonly="yes" name="long" class="form-control"  >

</div>
  <div class="form-group">        
        <!--map div-->
        <div id="map" style="width: 300px; height: 300px;"></div>
  </div>

  
     <div class="form-group">
           <label >   Enter Address:
</label>
  <input type="text" name="src_address" class="form-control"  >
</div>
   <button type="button" class="btn btn-success"  onclick="document.getElementById('loc-form').submit()"> Change </button>
</form>
                        
</div>
          
            </div>
            </div>
            </div>

          

@endsection