@extends('admin.layouts.main')
@section('content')
<form action="" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="">Tên sản phẩm</label>
                <input type="text" name="name" class="form-control" value="{{$model->name}}">
            </div>
            <div class="form-group">
                <label for="">Danh mục</label>
                <select name="cate_id" class="form-control">
                    @foreach($cates as $c)
                    <option value="{{$c->id}}" @if($c->id == $model->cate_id) selected @endif>{{$c->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Giá</label>
                <input type="text" name="price" class="form-control" value="{{$model->price}}">
            </div>
            <div class="form-group">
                <label for="">Số lượng</label>
                <input type="text" name="quantity" class="form-control" value="{{$model->quantity}}">
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
            <a href="{{route('product.index')}}" class="btn btn-danger">Hủy</a>
        </div>
    </div>
    
</form>
<br>
@endsection