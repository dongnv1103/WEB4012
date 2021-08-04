@extends('admin.layouts.main')

@section('content')

<form action="" method="get">
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="">Tên phòng</label>
                <input class="form-control" type="text" name="keyword" @isset($searchData['keyword']) value="{{$searchData['keyword']}}" @endisset>
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
        </div>
        <div class="col-6">
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
        </div>
    </div>
</form><br>
<div class="row">
    <table class="table table-striped">
        <thead>
            <th>STT</th>
            <th>Room_no</th>
            <th>Image</th>
            <th>Floor</th>
            <th>Price</th>
            <th>
                <a href="{{route('room.add')}}" class="btn btn-primary">Tạo mới</a>
            </th>
        </thead>
        <tbody>
            @foreach($data_room as $r)
            <tr>
                <td>{{(($data_room->currentPage()-1)*20) + $loop->iteration}}</td>
                <td>{{$r->room_no}}</td>
                <td><img src="{{asset( 'storage/' . $r->image)}}" width="70" /></td>
                <td>{{$r->floor}}</td>
                <td>{{$r->price}}</td>
                <td>
                    <a href="{{route('room.edit', ['id' => $r->id])}}" class="btn btn-info">Sửa</a>
                    <a href="{{route('room.remove', ['id' => $r->id])}}" class="btn btn-danger">Xóa</a>
                </td>
            </tr>
            @endforeach
            
        </tbody>
        
    </table>
    <div class="d-flex justify-content-end">
        {{$data_room->links()}}
    </div>
</div>
@endsection