<?php

namespace App\Http\Controllers;

use App\DataTables\ProductDataTable;
use App\Http\Requests\Auth\SaveProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Shade;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $data['sizes'] = Size::query()->orderBy('name')->get()->pluck('name', 'id');
        $data['shades'] = Shade::query()->orderBy('name')->get()->pluck('name', 'id');

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
    public function store(SaveProductRequest $request, Product $product)
    {
        $this->_save($request, $product);

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully!');
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
    public function update(SaveProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $this->_save($request, $product);

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully!');
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
        $model->fill($request->except(['_token', 'sizes', 'shades', 'variants']));
        $model->save();

        if (!$model->wasRecentlyCreated) {
            DB::table('product_variants')->where('product_id', $model->id)->delete();
        }
        foreach ($request->get('variants', []) as $size => $shades) {
            foreach ($shades as $shade => $price) {
                if($size && $shade) {
                    DB::table('product_variants')->updateOrInsert([
                        'product_id' => $model->id,
                        'size_id' => $size,
                        'shade_id' => $shade,
                    ], ['price' => $price ?: 0]);
                }
            }
        }

        if ($session_files = session()->get('filepath')) {
            $crop_path = session()->get('crop_path');
            $i = 0;
            foreach ($session_files as $session_file) {
                if (@$crop_path[$i]) {
                    $session_file = @$crop_path[$i];
                }
                $model->resources()->create(["filepath" => $session_file, "resourceable_type" => "App\Models\Product"]);
                $i++;
            }
            session()->forget('filepath');
            session()->forget('crop_path');
            session()->forget('resourceable_type');
        }
    }
}
