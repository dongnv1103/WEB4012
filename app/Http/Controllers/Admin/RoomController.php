<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    public function index(Request $request){
        $pagesize = 20;
        $searchData = $request->except('page');
        
        if(count($request->all()) == 0){
            // Lấy ra danh sách room & phân trang cho nó
            $rooms = Room::paginate($pagesize);
        }else{
            $roomQuery = Room::where('room_no', 'like', "%" .$request->keyword . "%");
            if($request->has('order_by') && $request->order_by > 0){
                if($request->order_by == 1){
                    $roomQuery = $roomQuery->orderBy('room_no');
                }else if($request->order_by == 2){
                    $roomQuery = $roomQuery->orderByDesc('room_no');
                }else if($request->order_by == 3){
                    $roomQuery = $roomQuery->orderBy('price');
                }else {
                    $roomQuery = $roomQuery->orderByDesc('price');
                }
            }
            $rooms = $roomQuery->paginate($pagesize)->appends($searchData);
        }
        
        // trả về cho người dùng 1 giao diện + dữ liệu rooms vừa lấy đc 
        return view('admin.rooms.index', [
            'data_room' => $rooms, 
            'rooms' => $rooms,
            'searchData' => $searchData
        ]);
    }

    public function remove($id){
        Room::destroy($id);
        return redirect()->back();;
    }

    public function addForm(){
        $rooms = Room::all();
        return view('admin.rooms.add-form', compact('rooms'));
    }

    public function saveAdd(Request $request){
        $model = new Room(); 
        $model->fill($request->all());
        // upload ảnh
        if($request->hasFile('uploadfile')){
            $path = $request->file('uploadfile')->storeAs('public/uploads/products', uniqid() . '-' . $request->uploadfile->getClientOriginalName());
            $model->image = str_replace('public/', '', $path);
        }

        $model->save();

        return redirect(route('room.index'));
    }

    public function editForm($id){
        $model = Room::find($id);
        if(!$model){
            return redirect()->back();
        }
        $rooms = Room::all();
        return view('admin.rooms.edit-form', compact('model', 'rooms'));
    }

    public function saveEdit($id, Request $request){
        $model = Room::find($id); 
        if(!$model){
            return redirect()->back();
        }
        $model->fill($request->all());
        // upload ảnh
        if($request->hasFile('uploadfile')){
            $path = $request->file('uploadfile')->storeAs('public/uploads/products', uniqid() . '-' . $request->uploadfile->getClientOriginalName());
            $model->image = str_replace('public/', '', $path);
        }
        $model->save();
        return redirect(route('room.index'));
    }
}
