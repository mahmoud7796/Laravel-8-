<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\User;
use Carbon\Carbon;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{
    public function AllCat(){
        //$categories = DB::table('categories')->latest()->get();
          $categories = Category::latest()-> paginate(3);
        $trash = Category::onlyTrashed()->latest()-> paginate(3);
        return view('admin.category.index',compact('categories','trash'));
    }

    public function store(CategoryRequest $request){
     // return $request;
       Category::create([
           'category_name' => $request -> category_name,
           'user_id' => Auth::user()-> id,
           'created_at' => Carbon::now()
       ]);
       return redirect()-> route('all.category')-> with(['success'=> 'تم الحفظ بنجاح']);
        //save by query builder
/*        $data = array();
        $data['category_name'] = $request ->category_name;
        $data['user_id'] = Auth::user()-> id;
        $data['created_at'] = Carbon::now();
        DB::table('categories')-> insert($data);
        return redirect()-> route('all.category')-> with(['success'=> 'تم الحفظ بنجاح']);*/
    }

    public function edit($id){
        //$categories = DB::table('categories')->latest()->get();
         $categories = Category::find($id);
        return view('admin.category.edit',compact('categories'));
    }
    public function update(CategoryRequest $request, $id){
        //$categories = DB::table('categories')->latest()->get();
        $categories = Category::latest()-> paginate(3) -> find($id);
        $categories -> update([
            'category_name' => $request -> category_name,
        ]);
        return redirect()-> route('all.category')-> with(['success'=> 'تم التعديل بنجاح']);

    }
    public function MoveTrash($id){
        //$categories = DB::table('categories')->latest()->get();
        $categories = Category::find($id);
        $categories -> delete();
        return redirect()-> route('all.category')-> with(['success'=> 'تم الحذف بنجاح']);

    }
    public function restore($id){
        //$categories = DB::table('categories')->latest()->get();
        $categories = Category::withTrashed()->find($id);
        $categories -> restore();
        return redirect()-> route('all.category')-> with(['success'=> 'تم الحذف بنجاح']);

    }
    public function delete($id){
        //$categories = DB::table('categories')->latest()->get();
        $categories = Category::onlyTrashed()->find($id);
        $categories -> forceDelete();
        return redirect()-> route('all.category')-> with(['success'=> 'تم الحذف بنجاح']);

    }
}
