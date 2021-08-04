@extends('admin.layouts.main')
@section('content')
<form action="" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="">Room_No</label>
                <input type="text" name="room_no" class="form-control" value="{{$model->room_no}}">
            </div>
            <div class="form-group">
                <label for="">Floor</label>
                <input type="text" name="floor" class="form-control" value="{{$model->floor}}">
            </div>
            <div class="form-group">
                <label for="">Price</label>
                <input type="text" name="price" class="form-control" value="{{$model->price}}">
            </div>
        </div>
        <div class="col-6">
            <div class="add-product-preview-img">
                <img src="{{asset('storage/' . $model->image)}}" class="img-thumbnail">
            </div>
            <div class="form-group">
                <label for="">Ảnh sản phẩm</label>
                <input type="file" name="uploadfile" class="form-control">
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="">Chi tiết sản phẩm:</label>
                <textarea name="detail" class=form-control  rows="10">{{$model->detail}}</textarea>
            </div>
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-primary">Lưu</button>
            <a href="{{route('room.index')}}" class="btn btn-danger">Hủy</a>
        </div>
    </div>
    
</form>
<br>
@endsection