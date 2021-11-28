
@extends('admin.layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session()->has('message'))
                <div class ="alert {{session()->get('type')}}">
                     {{ session()->get('message')}}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    {{ __('Animals Index') }}
                
                    <div class="float-right">
                        <form action="" method="">
                            <div class="input-group">
                                <input type="text" class="form-control" name="keyword" value="{{request()->get('keyword')}}">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                
                </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Created</th>
                                <th>Creator</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($animals as $animal)
                                <tr>
                                    <td> {{$animal->id}} </td>
                                    <td> {{$animal->name}} </td>
                                    <td> {{$animal->description}} </td>
                                    <td> {{$animal->created_at->diffForHumans()}} </td>
                                    <td> {{$animal->user->name}} </td>
                                    <td>
                                        <a class="btn btn-primary" href="/animals/{{$animal->id}}">Show</a>
                                        <a class="btn btn-success" href="/animals/{{$animal->id}}/edit">Edit</a>
                                        <a onclick="return confirm ('Anda pasti untuk padam?')" class="btn btn-danger" href="/animals/{{$animal->id}}/delete">Padam</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$animals->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
