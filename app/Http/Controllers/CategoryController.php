<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Category;
use Illuminate\Http\Request;
use App\DataTables\CategoryDataTable;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CategoryDataTable $dataTable ,Request $request)
    {
        return $dataTable->render('admin.categories.index');

    }

    protected function _datatable(Request $request)
    {
        $datatable = DataTables::of(Category::query());

        $datatable->addColumn('action', function ($model){

            $html = '<button onclick="location.href='."'".route('admin.categories.edit', $model->id)."'".'"
                             type="button"
                             class="btn btn-info btn-circle"
                             data-toggle="tooltip"
                             title="Edit">
                        <i class="fa fa-pencil"></i>
                    </button>&nbsp;';

            $html .= '<button data-url="'.route('admin.categories.destroy', $model->id).'" type="button"
                            class="btn btn-danger btn-circle btn-delete"
                            data-toggle="tooltip"
                            title="Delete">
                        <i class="fa fa-trash"></i>
                    </button>';

            return $html;
        })->rawColumns(['action']);

        return $datatable->make(true);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category)
    {
        $data['model'] = $category;
        return view('admin.categories.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Category $category)
    {
        $this->_save($request, $category);
        Alert::success('Category created successfully!', 'Success');
        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show(Categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $data['model'] = $category;
        return view('admin.categories.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->_save($request, $category);
        Alert::success('Category updated successfully!', 'Success');
        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $model = Category::find($id);
        if($model) {
            $model->delete();
        }
        if($request->ajax()){
            return response()->json(true);
        }else{
            return redirect('/categories');
        }
    }

    protected function _validate($request)
    {
        $this->validate($request, [
            'foo' => "bar",
        ]);
    }

    protected function _save($request, $model)
    {
        $model->fill($request->except(['_token']));
        $model->save();
    }
}
