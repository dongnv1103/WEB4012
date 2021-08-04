@extends('admin.layouts.main')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="">Tên sản phẩm</label>
                <input type="text" name="name" class="form-control">
                
            </div>
            <div class="form-group">
                <label for="">Danh mục</label>
                <select name="cate_id" class="form-control">
                    @foreach($cates as $c)
                    <option value="{{$c->id}}">{{$c->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Giá</label>
                <input type="text" name="price" class="form-control">
                {{-- @error('price')
                    <span class="text-danger">{{$message}}</span>
                @enderror --}}
            </div>
            <div class="form-group">
                <label for="">Số lượng</label>
                <input type="text" name="quantity" class="form-control">
                {{-- @error('quantity')
                    <span class="text-danger">{{$message}}</span>
                @enderror --}}
            </div>
        </div>
        <div class="col-6">
            <div class="add-product-preview-img">

            </div>
            <div class="form-group">
                <label for="">Ảnh sản phẩm</label>
                <input type="file" name="uploadfile" class="form-control">
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="">Chi tiết sản phẩm:</label>
                <textarea name="detail" class=form-control  rows="10"></textarea>
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