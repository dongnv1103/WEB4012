<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index(Request $request){
        $pagesize = 20;
        $searchData = $request->except('page');
        
        if(count($request->all()) == 0){
            // Lấy ra danh sách sản phẩm & phân trang cho nó
            $products = Product::paginate($pagesize);
        }else{
            $productQuery = Product::where('name', 'like', "%" .$request->keyword . "%");
            if($request->has('cate_id') && $request->cate_id != ""){
                $productQuery = $productQuery->where('cate_id', $request->cate_id);
            }

            if($request->has('order_by') && $request->order_by > 0){
                if($request->order_by == 1){
                    $productQuery = $productQuery->orderBy('name');
                }else if($request->order_by == 2){
                    $productQuery = $productQuery->orderByDesc('name');
                }else if($request->order_by == 3){
                    $productQuery = $productQuery->orderBy('price');
                }else {
                    $productQuery = $productQuery->orderByDesc('price');
                }
            }
            $products = $productQuery->paginate($pagesize)->appends($searchData);
        }
        
        $products->load('category');
        
        $cates = Category::all();
        // trả về cho người dùng 1 giao diện + dữ liệu products vừa lấy đc 
        return view('admin.products.index', [
            'data_product' => $products, 
            'cates' => $cates,
            'searchData' => $searchData
        ]);
    }

    public function remove($id){
        Product::destroy($id);
        return redirect()->back();;
    }

    public function addForm(){
        // dd(1);
        $cates = Category::all();
        return view('admin.products.add-form', compact('cates'));
    }


    public function saveAdd(ProductFormRequest $request){
        $model = new Product(); 
        $model->fill($request->all());
        // upload ảnh
        if($request->hasFile('uploadfile')){
            $path = $request->file('uploadfile')->storeAs('public/uploads/products', uniqid() . '-' . $request->uploadfile->getClientOriginalName());
            $model->image = str_replace('public/', '', $path);
        }

        $model->save();

        return redirect(route('product.index'));
    }

    public function editForm($id){
        $model = Product::find($id);
        if(!$model){
            return redirect()->back();
        }
        $cates = Category::all();
        return view('admin.products.edit-form', compact('model', 'cates'));
    }

    public function saveEdit($id, Request $request){
        $model = Product::find($id); 
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
        return redirect(route('product.index'));
    }
}