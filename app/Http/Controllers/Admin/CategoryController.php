<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    public function detail($id){
        $cate = Category::find($id);
        $cate->load('products');
        return view('admin.category.detail', ['cate' => $cate]);
    }

    public function index(Request $request){
        $pagesize = 20;
        $searchData = $request->except('page');
        
        if(count($request->all()) == 0){
            // Lấy ra danh sách danh mục & phân trang cho nó
            $cates = Category::paginate($pagesize);
        }else{
            $cateQuery = Category::where('name', 'like', "%" .$request->keyword . "%");
            if($request->has('order_by') && $request->order_by > 0){
                if($request->order_by == 1){
                    $cateQuery = $cateQuery->orderBy('name');
                }else if($request->order_by == 2){
                    $cateQuery = $cateQuery->orderByDesc('name');
                }else if($request->order_by == 3){
                    $cateQuery = $cateQuery->orderBy('price');
                }else {
                    $cateQuery = $cateQuery->orderByDesc('price');
                }
            }
            $cates = $cateQuery->paginate($pagesize)->appends($searchData);
        }
        
        // trả về cho người dùng 1 giao diện + dữ liệu products vừa lấy đc 
        return view('admin.category.index', [
            'data_cate' => $cates, 
            'cates' => $cates,
            'searchData' => $searchData
        ]);
    }
}