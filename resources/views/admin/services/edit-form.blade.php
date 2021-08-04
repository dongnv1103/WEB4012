@extends('admin.layouts.main')
@section('content')
<form action="" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="">Tên dịch vụ</label>
                <input type="text" name="name" class="form-control" value="{{$model->name}}">
            </div>
        </div>
        <div class="col-6">
            <div class="add-product-preview-img">
                <img src="{{asset('storage/' . $model->icon)}}" class="img-thumbnail">
            </div>
            <div class="form-group">
                <label for="">Icon</label>
                <input type="file" name="uploadfile" class="form-control">
            </div>
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-primary">Lưu</button>
            <a href="{{route('service.index')}}" class="btn btn-danger">Hủy</a>
        </div>
    </div>
    
</form>
<br>
@endsection