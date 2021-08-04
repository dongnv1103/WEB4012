<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request){
        $pagesize = 20;
        $searchData = $request->except('page');
        
        if(count($request->all()) == 0){
            // Lấy ra danh sách user & phân trang cho nó
            $users = User::paginate($pagesize);
        }else{
            $userQuery = User::where('name', 'like', "%" .$request->keyword . "%");
            if($request->has('order_by') && $request->order_by > 0){
                if($request->order_by == 1){
                    $userQuery = $userQuery->orderBy('name');
                }else{
                    $userQuery = $userQuery->orderByDesc('name');
                }
            }
            $users = $userQuery->paginate($pagesize)->appends($searchData);
        }
        
        // trả về cho người dùng 1 giao diện + dữ liệu user vừa lấy đc 
        return view('admin.user.index', [
            'data_user' => $users, 
            'users' => $users,
            'searchData' => $searchData
        ]);
    }

    public function remove($id){
        User::destroy($id);
        return redirect()->back();;
    }
}