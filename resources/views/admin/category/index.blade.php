@extends('admin.layouts.main')

@section('content')

<form action="" method="get">
    <div>
        <label for="">Tên danh mục</label>
        <input type="text" name="keyword" @isset($searchData['keyword']) value="{{$searchData['keyword']}}" @endisset>
    </div>
    <div>
        <label for="">Sắp xếp theo</label>
        <select name="order_by" >
            <option value="0">Mặc định</option>
            <option @if(isset($searchData['order_by']) &&  $searchData['order_by'] == 1) selected @endif  value="1">Tên alphabet</option>
            <option @if(isset($searchData['order_by']) &&  $searchData['order_by'] == 2) selected @endif value="2">Tên giảm dần alphabet</option>
            <option @if(isset($searchData['order_by']) &&  $searchData['order_by'] == 3) selected @endif value="3">Giá tăng dần</option>
            <option @if(isset($searchData['order_by']) &&  $searchData['order_by'] == 4) selected @endif value="4">Giá giảm dần</option>
        </select>
    </div>
    <div>
        <button type="submit">Tìm kiếm</button>
    </div>
</form>

<table>
    <thead>
        <th>STT</th>
        <th>Tên danh mục</th>
        <th>
            <a href="#">Tạo mới</a>
        </th>
    </thead>
    <tbody>
        @foreach($data_cate as $c)
        <tr>
            <td>{{(($data_cate->currentPage()-1)*20) + $loop->iteration}}</td>
            <td>{{$c->name}}</td>
            <td>
                <button>Sửa</button>
                <button>Xóa</button>
            </td>
        </tr>
        @endforeach
        
    </tbody>
    
</table>
{{$data_cate->links()}}
@endsection