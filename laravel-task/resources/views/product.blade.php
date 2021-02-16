
@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">{{ __('Products') }}</div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ Route('add.product') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Car VIN</label>
                                        <input type="text"
                                          class="form-control" name="car_vin" id="" aria-describedby="helpId" required>
                                      </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Car Model</label>
                                        <input type="text"
                                          class="form-control" name="car_model" id="" aria-describedby="helpId" required>
                                      </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Price</label>
                                        <input type="number"
                                          class="form-control" name="price" id="" aria-describedby="helpId" required>
                                      </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Staock</label>
                                        <input type="number"
                                          class="form-control" name="stock" id="" aria-describedby="helpId" required>
                                      </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Year</label>
                                        <input type="number"
                                          class="form-control" name="year" id="" aria-describedby="helpId" required>
                                      </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Image</label>
                                        <input type="file"
                                          class="form-control" name="image" id="" aria-describedby="helpId" accept="image/*">
                                      </div>
                                </div>

                                <div class="col-md-12">
                                    <button class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-12">
                        <br>
                        <br>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Car VIN</th>
                                    <th>Car Model</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Year</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $key => $product)
                                <tr>
                                    <td scope="row">{{ $key+1 }}</td>
                                    <td>{{ $product->car_vin }}</td>
                                    <td>{{ $product->car_model }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->stock }}</td>
                                    <td>{{ $product->year }}</td>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection
