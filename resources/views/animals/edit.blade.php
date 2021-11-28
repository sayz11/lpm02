
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Animals Create') }}</div>
                
                <div class="card-body">
                    <form action="" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Please enter animal name"value="{{$animal->name}}">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control">{{$animal->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Edit My Animal Name!</button>
                        </div>
                        <div>
                        <a class="btn btn-link" href="/animals/{{$animal->index}}">Back</a>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection
