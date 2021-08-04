@extends('admin.layouts.main')

@section('content')

<form action="" method="get">
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="">Tên tài khoản</label>
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
            <th>Tên tài khoản</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>
                <a href="#" class="btn btn-primary">Tạo mới</a>
            </th>
        </thead>
        <tbody>
            @foreach($data_user as $u)
            <tr>
                <td>{{(($data_user->currentPage()-1)*20) + $loop->iteration}}</td>
                <td>{{$u->name}}</td>
                <td>{{$u->email}}</td>
                <td>{{$u->phone_number}}</td>
                <td>
                    <a href="#" class="btn btn-info">Sửa</a>
                    {{-- <a href="{{route('user.remove', ['id' => $u->id])}}" class="btn btn-danger">Xóa</a> --}}
                    <a href="#" class="btn btn-danger">Xóa</a>
                </td>
            </tr>
            @endforeach
            
        </tbody>
        
    </table>
    <div class="d-flex justify-content-end">
        {{$data_user->links()}}
    </div>
</div>
@endsection