@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('User Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">DOB</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Email</th>
                                <th scope="col">Annual Income</th>
                                <th scope="col">Occupation</th>
                                <th scope="col">Family Type</th>
                                <th scope="col">Manglik</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user as $item)
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->first_name }}</td>
                                <td>{{ $item->last_name }}</td>
                                <td>{{ $item->bod }}</td>
                                <td>{{ $item->gender }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->annual_income }}</td>
                                <td>{{ $item->occupation }}</td>
                                <td>{{ $item->family_type }}</td>
                                <td>{{ $item->manglik }}</td>
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
