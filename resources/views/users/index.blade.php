

@extends('admin.layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Users Index') }}</div>
    
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Date Created</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td> {{$user->id}} </td>
                                    <td> {{$user->name}} </td>
                                    <td> {{$user->email}} </td>
                                    <td> {{$user->created_at}} </td>
                                    <td>
                                        <a class="btn btn-primary" href="/users/{{$user->id}}">Show</a>
                                        <a class="btn btn-success" href="/users/{{$user->id}}/edit">Edit</a>
                                        <a onclick="return confirm ('Anda pasti untuk padam?')" class="btn btn-danger" href="/users/{{$user->id}}/delete">Padam</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$users->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
