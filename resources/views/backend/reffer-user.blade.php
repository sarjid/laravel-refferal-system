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
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Total Reffer</th>
                                <th>Total Points</th>
                                <th>Refferer</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $item)
                            <tr>
                                <td scope="row">{{ $item->name }}</td>
                                <td scope="row">{{ $item->username }}</td>
                                <td scope="row">{{ $item->email }}</td>
                                <td>{{ count($item->referrals) ?? '0'  }}</td>
                                <td>{{ count($item->referrals) * $refferBonus->reffer_amount ?? '0' }} pts</td>
                                <td>{{ $item->referrer->name ?? 'Not Specified' }}</td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
