
@extends('admin.layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Animals Create') }}</div>
                
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Nama Haiwan</label>
                            <input type="text" name="name" class="form-control" placeholder="Please enter animal name">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Attachment</label>
                            <input type="file" name="attachment" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Store My Animal Name!</button>
                            <a class="btn btn-link" href="{{ url()->previous() }}"> Back</a>
                        </div>


                    </form>
            </div>
        </div>
    </div>
</div>
@endsection
