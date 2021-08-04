<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index(Request $request){
        $pagesize = 20;
        $searchData = $request->except('page');
        
        if(count($request->all()) == 0){
            // Lấy ra danh sách service & phân trang cho nó
            $services = Service::paginate($pagesize);
        }else{
            $serviceQuery = Service::where('name', 'like', "%" .$request->keyword . "%");
            if($request->has('order_by') && $request->order_by > 0){
                if($request->order_by == 1){
                    $serviceQuery = $serviceQuery->orderBy('name');
                }else{
                    $serviceQuery = $serviceQuery->orderByDesc('name');
                }
            }
            $rooms = $roomQuery->paginate($pagesize)->appends($searchData);
        }
        
        // trả về cho người dùng 1 giao diện + dữ liệu rooms vừa lấy đc 
        return view('admin.services.index', [
            'data_service' => $services, 
            'services' => $services,
            'searchData' => $searchData
        ]);
    }

    public function remove($id){
        Service::destroy($id);
        return redirect()->back();;
    }

    public function addForm(){
        $services = Service::all();
        return view('admin.services.add-form', compact('services'));
    }

    public function saveAdd(Request $request){
        $model = new Service(); 
        $model->fill($request->all());
        // upload ảnh
        if($request->hasFile('uploadfile')){
            $path = $request->file('uploadfile')->storeAs('public/uploads/products', uniqid() . '-' . $request->uploadfile->getClientOriginalName());
            $model->icon = str_replace('public/', '', $path);
        }

        $model->save();

        return redirect(route('service.index'));
    }

    public function editForm($id){
        $model = Service::find($id);
        if(!$model){
            return redirect()->back();
        }
        $services = Service::all();
        return view('admin.services.edit-form', compact('model', 'services'));
    }

    public function saveEdit($id, Request $request){
        $model = Service::find($id); 
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
        return redirect(route('service.index'));
    }
}
