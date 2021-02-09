<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\DataTables\ProductDataTable;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductDataTable $dataTable, Request $request)
    {
        return $dataTable->render('admin.products.index');

    }

    protected function _initForm()
    {
        $data['categories'] = Category::all()->pluck('name', 'id');

        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        $data = $this->_initForm();
        $data['model'] = $product;

        return view('admin.products.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
        $this->_save($request, $product);
//        Alert::success('Product created successfully!', 'Success');

        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $data = $this->_initForm();
        $data['model'] = $product;

        return view('admin.products.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $this->_save($request, $product);
//        Alert::success('Product updated successfully!', 'Success');

        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        if ($product) {
            $product->delete();
        }
        if ($request->ajax()) {
            return response()->json(true);
        }

        return redirect()->route('admin.products.index');
    }

    protected function _save($request, $model)
    {
        $model->fill($request->except(['_token', 'category']));
        $model->save();
        $model->categories();

        $altval = [];

        if($session_files =  session()->get('filepath')){
            $crop_path = session()->get('crop_path');
            $i=0;
            foreach ($session_files as $session_file) {
                if(@$crop_path[$i]){
                    $session_file = @$crop_path[$i];
                }
                $model->resources()->create(["filepath"=>$session_file,"resourceable_type"=>"App\Models\Product"]);
                $i++;
            }
            session()->forget('filepath');
            session()->forget('crop_path');
            session()->forget('resourceable_type');
        }
    }
}
