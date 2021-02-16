@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">{{ __('Employee') }}</div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ Route('add.employee') }}" method="post">
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

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Start Date</label>
                                        <input type="date"
                                          class="form-control" name="start_date" id="" aria-describedby="helpId" required>
                                      </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                      <label for="">Title</label>
                                      <select class="form-control" name="role" id="" required>
                                        <option value="" selected>--Select Title--</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                                        @endforeach
                                      </select>
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
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Start Date</th>
                                    <th>Title</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employee as $key => $user)
                                <tr>
                                    <td scope="row">{{ $key+1 }}</td>
                                    <td>{{ $user->first_name }}</td>
                                    <td>{{ $user->last_name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone_number }}</td>
                                    <td>{{ $user->start_date }}</td>
                                    <td>
                                        @foreach ($user->roles as $role)
                                            {{ $role->name }}
                                        @endforeach
                                    </td>
                                    <td>
                                        Actions
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $employee->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
