
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
                                          class="form-control" name="image" id="image" aria-describedby="helpId" accept="image/*">
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
                                    <th>Action</th>
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
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#productModal"
                                        data-id="{{ $product->id }}" data-car_vin="{{ $product->car_vin }}" data-car_model="{{ $product->car_model }}"
                                        data-price="{{ $product->price }}" data-stock="{{ $product->stock }}" data-year="{{ $product->year }}">Edit</button>
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#stockModal"
                                        data-product_id="{{ $product->id }}">Stock</button>
                                    </td>

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

<!-- Modal -->
<div class="modal fade" id="stockModal" tabindex="-1" role="dialog" aria-labelledby="stockModalId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Stock</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <form action="{{ Route('topup.product') }}" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="product_id" id="product_id">
                    <div class="form-group">
                      <label for="stock">Stock (This will goin to top up on stock)</label>
                      <input type="number"
                        class="form-control" name="stock" id="stock" aria-describedby="helpId" placeholder="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Product Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <form action="{{ Route('edit.product') }}" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                    <label for="">Car VIN</label>
                    <input type="text"
                        class="form-control" name="car_vin" id="car_vin" aria-describedby="helpId" required>
                    </div>

                    <div class="form-group">
                    <label for="">Car Model</label>
                    <input type="text"
                        class="form-control" name="car_model" id="car_model" aria-describedby="helpId" required>
                    </div>

                    <div class="form-group">
                    <label for="">Price</label>
                    <input type="number"
                        class="form-control" name="price" id="price" aria-describedby="helpId" required>
                    </div>

                    <div class="form-group">
                    <label for="">Year</label>
                    <input type="number"
                        class="form-control" name="year" id="year" aria-describedby="helpId" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $('#stockModal').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget)
        var product_id = button.data('product_id')
        var modal = $(this)

        modal.find('#product_id').val(product_id)
    })

    $('#productModal').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget)
        var id = button.data('id')
        var car_vin = button.data('car_vin')
        var car_model = button.data('car_model')
        var price = button.data('price')
        var year = button.data('year')
        var modal = $(this)

        modal.find('#id').val(id)
        modal.find('#car_vin').val(car_vin)
        modal.find('#car_model').val(car_model)
        modal.find('#price').val(price)
        modal.find('#year').val(year)
    })
</script>
@endsection
