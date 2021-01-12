@extends('layout')

@section('title', 'My Orders')



@section('content')

    <div class="container">
        @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <div class="products-section my-orders container">
        <div class="sidebar">

            <ul>
              <li><a href="{{ route('users.edit') }}">My Profile</a></li>
              <li class="active"><a href="{{ route('orders.index') }}">My Orders</a></li>
            </ul>
        </div> <!-- end sidebar -->
        <div class="row">
            <div class="products-header">
                <h1 class="stylish-heading">My Orders</h1>
            </div>

            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th class="table-image">ID</th>
                        <th>Date</th>
                        <th>Quantity products</th>
                        <th>Delivery</th>
                        <th>Total price</th>

                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->created_at }}</td>
                            <td>
                                {{ count($order->products)}}
                            </td>
                            <td> {{ presentPrice($order->billing_total- $order->billing_subtotal) }}</td>
                            <td class="">
                                {{ presentPrice($order->billing_total) }}
                            </td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>
            </div>

            <div class="spacer"></div>
        </div>
    </div>

@endsection

@section('extra-js')

@endsection
