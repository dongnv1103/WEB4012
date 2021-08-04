@extends('admin.layouts.main')

@section('content')

<form action="" method="get">
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="">Tên sản phẩm</label>
                <input class="form-control" type="text" name="keyword" @isset($searchData['keyword']) value="{{$searchData['keyword']}}" @endisset>
            </div>
            <div class="form-group">
                <label for="">Danh mục sản phẩm</label>
                <select class="form-control" name="cate_id" >
                    <option value="">Tất cả</option>
                    @foreach($cates as $c)
                    <option @if(isset($searchData['cate_id']) && $c->id == $searchData['cate_id']) selected @endif value="{{$c->id}}">{{$c->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="">Sắp xếp theo</label>
                <select class="form-control" name="order_by" >
                    <option value="0">Mặc định</option>
                    <option @if(isset($searchData['order_by']) &&  $searchData['order_by'] == 1) selected @endif  value="1">Tên alphabet</option>
                    <option @if(isset($searchData['order_by']) &&  $searchData['order_by'] == 2) selected @endif value="2">Tên giảm dần alphabet</option>
                    <option @if(isset($searchData['order_by']) &&  $searchData['order_by'] == 3) selected @endif value="3">Giá tăng dần</option>
                    <option @if(isset($searchData['order_by']) &&  $searchData['order_by'] == 4) selected @endif value="4">Giá giảm dần</option>
                </select>
            </div>
            <div class="text-center">
                <br>
                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
            </div>
        </div>
    </div>
</form>
<div class="row">
    <table class="table table-striped">
        <thead>
            <th>STT</th>
            <th>Tên SP</th>
            <th>Ảnh</th>
            <th>Danh mục</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>
                <a href="{{route('product.add')}}" class="btn btn-primary">Tạo mới</a>
            </th>
        </thead>
        <tbody>
            @foreach($data_product as $p)
            <tr>
                <td>{{(($data_product->currentPage()-1)*20) + $loop->iteration}}</td>
                <td>{{$p->name}}</td>
                <td><img src="{{asset( 'storage/' . $p->image)}}" width="70" /></td>
                <td>
                    <a href="{{route('category.detail', ['id' => $p->cate_id])}}">{{$p->category->name}}</a>
                </td>
                <td>{{$p->price}}</td>
                <td>{{$p->quantity}}</td>
                <td>
                    <a href="{{route('product.edit', ['id' => $p->id])}}" class="btn btn-info">Sửa</a>
                    <a href="{{route('product.remove', ['id' => $p->id])}}" class="btn btn-danger">Xóa</a>
                </td>
            </tr>
            @endforeach
            
        </tbody>
        
    </table>
    <div class="d-flex justify-content-end">
        {{$data_product->links()}}
    </div>
</div>
@endsection