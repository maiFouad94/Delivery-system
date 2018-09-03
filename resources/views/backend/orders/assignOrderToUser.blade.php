@extends ('backend.layouts.app')


@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                   
                </h4>
            </div><!--col-->

           
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Picture</th>
                            <th>{{ __('labels.backend.access.users.table.last_name') }}</th>
                            <th>{{ __('labels.backend.access.users.table.first_name') }}</th>
                            <th>{{ __('labels.backend.access.users.table.email') }}</th>
                            <th>{{ __('labels.general.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            @if ($user->hasRole('user'))
            
                            <tr>
                                <td><img width="200" height="200"  src="{{ $user->picture }}"  
                                ></td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td><button type="button" class="btn btn-success" onclick="location.href='{{ url('/admin/orders/'.$order_id.'/assign/'.$user->id) }}'">select</button></td>
                            </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!--col-->
        </div><!--row-->
       
    </div><!--card-body-->
</div><!--card-->
@endsection
