@extends('layout')

@section('title', 'Checkout')



@section('content')

    <div class="container">
        @if (session()->has('success_message'))
            <div class="spacer"></div>
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if(count($errors) > 0)
            <div class="spacer"></div>
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{!! $error !!}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h1 class="checkout-heading stylish-heading">Checkout</h1>
        <div class="checkout-section">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('checkout.store') }}" method="POST" id="payment-form">
                        {{ csrf_field() }}
                        <h2>Billing Details</h2>

                        <div class="form-group">
                            <label for="email">Email Address</label>
                            @if (auth()->user())
                                <input type="email" class="form-control" id="email" name="email"
                                       value="{{ auth()->user()->email }}" readonly>
                            @else
                                <input type="email" class="form-control" id="email" name="email"
                                       value="{{ old('email') }}" required>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                                   required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address"
                                   value="{{ old('address') }}" required>
                        </div>

                        <div class="half-form">
                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="province">Province</label>
                                <input type="text" class="form-control" id="province" name="province"
                                       value="{{ old('province') }}" required>
                            </div>
                        </div> <!-- end half-form -->

                        <div class="half-form">
                            <div class="form-group">
                                <label for="postalcode">Postal Code</label>
                                <input type="text" class="form-control" id="postalcode" name="postalcode"
                                       value="{{ old('postalcode') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                       value="{{ old('phone') }}" required>
                            </div>
                        </div> <!-- end half-form -->

                        <div class="spacer"></div>

                    </form>
                </div>


                <div class="col-md-6">
                    <h2>Your Order</h2>

                    <table class="table">
                        <thead>
                        <tr>
                            <th class="table-image"></th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th></th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach (Cart::content() as $item)
                            <tr>
                                <td class="table-image"><a href="{{ url('shop', [$item->model->slug]) }}"><img
                                                src="{{ asset('img/' . $item->model->image) }}" alt="product"
                                                class="img-responsive cart-image"></a></td>
                                <td>{{ $item->name }}</td>
                                <td>
                                  {{$item->qty}}
                                </td>
                                <td>{{ presentPrice($item->subtotal) }}</td>
                                <td class=""></td>
                            </tr>

                        @endforeach
                        <tr>
                            <td class="table-image"></td>
                            <td></td>
                            <td class="small-caps table-bg" style="text-align: right">Subtotal</td>
                            <td>{{ Cart::instance('default')->subtotal() }} р.</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="table-image"></td>
                            <td></td>
                            <td class="small-caps table-bg" style="text-align: right">Delivery</td>
                            <td>{{ presentPrice(Cart::instance('default')->tax()) }}</td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr class="border-bottom">
                            <td class="table-image"></td>
                            <td style="padding: 40px;"></td>
                            <td class="small-caps table-bg" style="text-align: right">Your Total</td>
                            <td class="table-bg">{{ Cart::total() }} р.</td>
                            <td class="column-spacer"></td>
                            <td></td>
                        </tr>

                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <button id="complete-order" type="submit" style="float: right" class="btn btn-success btn-lg right">Complete Order</button>
                </div>
            </div>

        </div>
    </div>

@endsection

@section('extra-js')

    <script>
        (function () {


            // Custom styling can be passed to options when creating an Element.
            // (Note that this demo uses a wider set of styles than the guide below.)
            var style = {
                base: {
                    color: '#32325d',
                    lineHeight: '18px',
                    fontFamily: '"Roboto", Helvetica Neue", Helvetica, sans-serif',
                    fontSmoothing: 'antialiased',
                    fontSize: '16px',
                    '::placeholder': {
                        color: '#aab7c4'
                    }
                },
                invalid: {
                    color: '#fa755a',
                    iconColor: '#fa755a'
                }
            };

            // Handle form submission
            var form = document.getElementById('payment-form');
            var subm = document.getElementById('complete-order');
            subm.addEventListener('click', function (event) {
                event.preventDefault();

                // Disable the submit button to prevent repeated clicks
                subm.disabled = true;

                var options = {
                    address_line1: document.getElementById('address').value,
                    address_city: document.getElementById('city').value,
                    address_state: document.getElementById('province').value,
                    address_zip: document.getElementById('postalcode').value
                }

                form.submit();

            });


        })();
    </script>
@endsection
