
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Animals Show') }}</div>
                
                <div class="card-body">                     
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" value="{{$animal->name}}" name="title" class="form-control" placeholder="Please enter animal name" readonly> 
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control"readonly>{{$animal->description}}</textarea>
                        </div>
                        <div>
                        <a class="btn btn-link" href="/animals/{{$animal->index}}">Back</a>
                        </div>
                @if($animal->attachment)        
                <a target="_blank"
                    href="{{$animal->attachment_url}}"
                    class="btn btn-link">
                    Open Attachment
                </a>
                @endif
            </div>

        </div>
    </div>
</div>
@endsection
