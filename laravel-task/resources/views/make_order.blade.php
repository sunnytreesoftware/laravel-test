
@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">{{ __('Make Order') }}</div>

            <div class="card-body">
                <form action="{{ Route('make.order') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                              <label for="customer_id">Customer</label>
                              <select class="form-control" name="customer_id" id="customer_id" required>
                                <option value="" selected>--Select Customer--</option>
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}"> {{ $customer->first_name }} {{ $customer->last_name }}, {{ $customer->email }}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                              <label for="product_id">Product</label>
                              <select class="form-control" name="product_id" id="product_id" required>
                                <option value="" selected>--Select Customer--</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">Car vin {{ $product->car_vin }}, Car Model {{ $product->car_model }}, Price ${{ $product->price }}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                              <label for="quantity">Quantity</label>
                              <input type="number"
                                class="form-control" name="quantity" id="quantity" required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Order</button>
                        </div>
                    </div>
                </form>
                <br>
                <br>
                @if (count($orders) > 0)
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product</th>
                            <th>Customer</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $key => $order)
                        <tr>
                            <td scope="row">{{ $key+1 }}</td>
                            <td>{{ $order->product->car_vin }}</td>
                            <td>{{ $order->customer->first_name }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>{{ $order->price }}</td>
                            <td>{{ $order->total_price }}</td>
                            <td>
                                @if ($order->order_status)
                                <span class="badge badge-success">Paid</span>
                                @else
                                <span class="badge badge-danger">Unpaid</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ Route('make.paid', ['order_id' => $order->id]) }}" class="btn btn-success {{ $order->order_status ? 'disabled': '' }}">Mark Paid</a>
                                <button class="btn btn-info" {{ $order->order_status ? 'disabled': '' }}>Edit</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
