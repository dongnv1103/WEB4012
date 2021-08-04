<table>
    <thead>
        <th>ID</th>
        <th>Name</th>
        <th>
            <a href="">Tạo mới</a>
        </th>
    </thead>
    <tbody>
        @foreach($cates as $c)
            <tr>
                <td>{{$c->id}}</td>
                <td>{{$c->name}}</td>
                <td>
                    <a href="{{route('cate.remove', ['id' => $c -> id])}}">Xóa</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>