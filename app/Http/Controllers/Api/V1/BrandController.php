<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\BrandResource;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    { //morteza roozbehi tlg:@mr_roz
        $brands = Brand::paginate(2);
        return $this->okRes([
            'brands'=>BrandResource::collection($brands),
            'link'=>BrandResource::collection($brands)->response()->getData()->links,
            'meta'=>BrandResource::collection($brands)->response()->getData()->meta
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:brands,display_name',
            'display_name' => 'required|unique:brands,display_name',
        ]);

         $brand = Brand::create([

             'name' =>$request->name,
             'display_name' =>$request->display_name,

         ]);

         return $this->okRes([
             'وضعيت فيلم'=> 'با موفقيت ساخته شد',
             'data'=>$brand
         ]);


    }

    public function show(Brand $brand)
    {
        return $this->okRes(new BrandResource($brand));
    }

    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => 'required|unique:brands,display_name',
            'display_name' => 'required|unique:brands,display_name',
        ]);

        $brand->update([

            'name' =>$request->name,
            'display_name' =>$request->display_name,

        ]);

        return $this->okRes([
            'وضعيت فيلم'=> 'با موفقيت آبديت شد',
            'data'=>$brand
        ]);


    }

    public function destroy(Brand  $brand)
    {
        $brand->delete();
        return $this->okRes('برند حذف شد');
    }


    public function deleteList()
    {
        $brand = Brand::onlyTrashed()->get();

     //   $total = $brand[1]->created_at - $brand[1]->deleted_at;

        return $this->okRes([
            'محتوا'=>'ليست برند هاي حذف شده',
            'brands'=> $brand,

        ]);


    }




    public function okRes($data='ok response')
    {
        return Response()->json([
            'status'=>'ok',
            'message'=>'',
            'data'=>$data,
        ]);
    }

    public function erRes($message)
    {
        return Response()->json([
            'status'=>'error',
            'message'=>$message,
            'data'=>'can`t get',
        ]);
    }
}
