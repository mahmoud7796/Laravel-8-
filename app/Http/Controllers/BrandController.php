<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use App\Traits\General;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    use General;
   public function index(){
       $brands = Brand::get();
       return view('admin.brand.index', compact('brands'));
   }

    public function store(BrandRequest $request){
      // return $request;
          //$photo = $this->SaveImage($request->file('brand_image'), 'images/brand');
        $photo= $this -> SaveImageResize($request->file('brand_image'),'images/brand/',200,200);
        Brand::create([
           'brand_name' => $request -> brand_name,
            'brand_image' => $photo
        ]);
        return redirect()-> route('brand.index')-> with(['success'=> 'تم الحفظ بنجاح']);
    }

    public function edit($id){
       $brands = Brand::find($id);
       return view('admin.brand.edit',compact('brands'));
    }
    public function update(BrandRequest $request, $id){
         $brands = Brand::find($id);
      // return $request->file('brand_image');
      // photo update
        if($request -> has('brand_image')) {
           // $photo = $this->SaveImage($request->file('brand_image'), 'images/brand');
            $photo= $this -> SaveImageResize($request->file('brand_image'),'images/brand/',500,500);
            $this -> DeleteImage($brands->brand_image, 'brand','images/brand');
            $brands->update([
                'brand_image' => $photo
            ]);
        }

        // remain inputs update
        $brands -> update([
            'brand_name' => $request -> brand_name,
        ]);

        return redirect()-> route('brand.index')-> with(['success'=> 'تم الحفظ بنجاح']);
    }
    public function delete($id){
       $brand = Brand::find($id);
       $this -> DeleteImage($brand->brand_image, 'brand','images/brand');
       $brand -> delete();
        return redirect()-> route('brand.index')-> with(['success'=> 'تم الحذف بنجاح']);
    }
}
