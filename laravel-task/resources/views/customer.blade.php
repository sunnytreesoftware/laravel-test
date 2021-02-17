
@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">{{ __('Customers') }}</div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ Route('add.customer') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">First Name</label>
                                        <input type="text"
                                          class="form-control" name="first_name" id="" aria-describedby="helpId" required>
                                      </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Last Name</label>
                                        <input type="text"
                                          class="form-control" name="last_name" id="" aria-describedby="helpId" required>
                                      </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email"
                                          class="form-control" name="email" id="" aria-describedby="helpId" required>
                                      </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Phone Number</label>
                                        <input type="text"
                                          class="form-control" name="phone_number" id="" aria-describedby="helpId" required>
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
                        @if (count($customers))
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customers as $key => $customer)
                                    <tr>
                                        <td scope="row">{{ $key+1 }}</td>
                                        <td>{{ $customer->first_name }}</td>
                                        <td>{{ $customer->last_name }}</td>
                                        <td>{{ $customer->email }}</td>
                                        <td>{{ $customer->phone_number }}</td>
                                        <td>
                                            Actions
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif

                        {{ $customers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
