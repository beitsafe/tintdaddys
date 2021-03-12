<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Size;
use Illuminate\Http\Request;
use App\DataTables\SizeDataTable;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SizeDataTable $dataTable ,Request $request)
    {
        return $dataTable->render('admin.sizes.index');

    }

    protected function _datatable(Request $request)
    {
        $datatable = DataTables::of(Size::query());

        $datatable->addColumn('action', function ($model){

            $html = '<button onclick="location.href='."'".route('admin.sizes.edit', $model->id)."'".'"
                             type="button"
                             class="btn btn-info btn-circle"
                             data-toggle="tooltip"
                             title="Edit">
                        <i class="fa fa-pencil"></i>
                    </button>&nbsp;';

            $html .= '<button data-url="'.route('admin.sizes.destroy', $model->id).'" type="button"
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
    public function create(Size $category)
    {
        $data['model'] = $category;
        return view('admin.sizes.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Size $category)
    {
        $this->_save($request, $category);
        Alert::success('Size created successfully!', 'Success');
        return redirect()->route('admin.sizes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categories  $sizes
     * @return \Illuminate\Http\Response
     */
    public function show(Categories $sizes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categories  $sizes
     * @return \Illuminate\Http\Response
     */
    public function edit(Size $category)
    {
        $data['model'] = $category;
        return view('admin.sizes.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categories  $sizes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Size $category)
    {
        $this->_save($request, $category);
        Alert::success('Size updated successfully!', 'Success');
        return redirect()->route('admin.sizes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categories  $sizes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $model = Size::find($id);
        if($model) {
            $model->delete();
        }
        if($request->ajax()){
            return response()->json(true);
        }else{
            return redirect('/sizes');
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
