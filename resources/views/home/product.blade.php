<table>
    <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Image</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>
            <a href="products/them">Tạo mới</a>
        </th>
    </thead>
    <tbody>
        @foreach($products as $p)
            <tr>
                <td>{{$p->id}}</td>
                <td>{{$p->name}}</td>
                <td>{{$p->image}}</td>
                <td>{{$p->price}}</td>
                <td>{{$p->quantity}}</td>
                <td>
                    <a href="">Xóa</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div>
    <form action="">
        <div>
            <label for="">Danh mục</label>
            <input type="text" name="category">
        </div>
    
        <div>
            <label for="">Tên</label>
            <input type="text" name="name">
        </div>
    
        <div>
            <label for="">Giá</label>
            <input type="text" name="price">
        </div>
    
        <div>
            <label for="">Sắp xếp theo</label>
            <select name="sx" id="">
                <option value="1">Giá tăng dần</option>
                <option value="2">Giá giảm dần</option>
                <option value="3">Trạng thái active</option>
                <option value="4">Số lượng giảm dần</option>
                <option value="5">Số lượng tăng dần</option>
            </select>
        </div>
        
    </form>
</div>