@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-info">{{ __('Reffer UserList') }}</div>

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

        <div class="col-md-8">
            <div class="card">
                <div class="card-header  bg-info">{{ __('Reffer Users LIst') }}</div>

                <div class="card-body">
                    <form action="{{ route('refferamount.update') }}" method="post">
                        @csrf
                        <div class="form-group">
                          <label for="">Bonus Amount</label>
                          <input type="text" name="reffer_amount" value="{{ $refferBonus->reffer_amount }}" id="" class="form-control" aria-describedby="helpId" placeholder="amount">
                        </div>
                        <div class="form-group">
                          <label for="">Select Status</label>
                          <select class="form-control" name="status" id="">
                            <option selected disabled>Select One</option>
                            <option value="active" {{ $refferBonus->status == 'active' ? 'selected':'' }}>Active</option>
                            <option value="inactive" {{ $refferBonus->status == 'inactive' ? 'selected':'' }}>Inactive</option>
                            <option></option>
                          </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-danger">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
