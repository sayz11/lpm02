
@extends('admin.layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Users Create') }}</div>
                
                <div class="card-body">
                    <form action="" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Please enter your name"value="{{$user->name}}">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <textarea name="email" class="form-control">{{$user->email}}</textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Edit My Details!</button>
                        </div>
                        <div>
                        <a class="btn btn-link" href="/users/{{$user->index}}">Back</a>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection
