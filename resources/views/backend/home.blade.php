@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Set Reffer') }}</div>

                <div class="card-body">
                    <ul class="list-group">
                        <a href="{{ route('admin.dashboard') }}">
                            <li class="list-group-item">Refer Bonus</li>
                        </a>
                        <a href="{{ route('refferUser.list') }}">
                            <li class="list-group-item disabled">
                            Total Users
                            </li>
                        </a>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="card">
                <div class="card-header bg-info">{{ __('Set Reffer Amount') }}</div>

                <div class="card-body">
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th>Per Reffer points pts</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          @php
                               $refferBonus = App\Models\RefferBonus::first();
                          @endphp
                            <tr>
                                <td scope="row">{{ number_format($refferBonus->reffer_amount ,2) ?? 'not' }} .pts</td>
                                <td >
                                    <span class="badge badge-success">{{ $refferBonus->status }}</span>
                                </td>

                                <td>
                                    <a href="{{ route('refferamount.edit') }}" class="btn btn-sm btn-info">Edit</a>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-header">{{ __('Admin Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                    <form action="{{ route('refferamount.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                          <label for="">Per Reffer Bonus Amount</label>
                          <input type="text" name="reffer_amount" id="" class="form-control" aria-describedby="helpId" placeholder="amount">
                        </div>
                        <div class="form-group">
                          <label for="">Select Status</label>
                          <select class="form-control" name="status" id="">
                            <option selected disabled>Select One</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                            <option></option>
                          </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-danger">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
