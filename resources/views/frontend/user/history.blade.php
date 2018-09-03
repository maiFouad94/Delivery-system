@extends('frontend.layouts.app')

@section('content')


<table class="table">
                        <thead>
                        <tr>
                            <th>Order number </th>
                            <th>Destination Address </th>
                            <th>Customer name </th>
                            <th>Phone </th>
                            <th>Date </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->dest_address }}</td>
                                <td>{{ $order->user_name }}</td>
                                <td>{{ $order->phone }}</td>
                                <td> {{ $order->updated_at}} </td>                              
                            </tr>
                        @endforeach
                        </tbody>
                    </table>





                    @endsection  
    