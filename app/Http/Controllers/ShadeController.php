<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Shade;
use Illuminate\Http\Request;
use App\DataTables\ShadeDataTable;

class ShadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ShadeDataTable $dataTable ,Request $request)
    {
        return $dataTable->render('admin.shades.index');

    }

    protected function _datatable(Request $request)
    {
        $datatable = DataTables::of(Shade::query());

        $datatable->addColumn('action', function ($model){

            $html = '<button onclick="location.href='."'".route('admin.shades.edit', $model->id)."'".'"
                             type="button"
                             class="btn btn-info btn-circle"
                             data-toggle="tooltip"
                             title="Edit">
                        <i class="fa fa-pencil"></i>
                    </button>&nbsp;';

            $html .= '<button data-url="'.route('admin.shades.destroy', $model->id).'" type="button"
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
    public function create(Shade $category)
    {
        $data['model'] = $category;
        return view('admin.shades.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Shade $category)
    {
        $this->_save($request, $category);
        Alert::success('Shade created successfully!', 'Success');
        return redirect()->route('admin.shades.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categories  $shades
     * @return \Illuminate\Http\Response
     */
    public function show(Categories $shades)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categories  $shades
     * @return \Illuminate\Http\Response
     */
    public function edit(Shade $category)
    {
        $data['model'] = $category;
        return view('admin.shades.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categories  $shades
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shade $category)
    {
        $this->_save($request, $category);
        Alert::success('Shade updated successfully!', 'Success');
        return redirect()->route('admin.shades.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categories  $shades
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $model = Shade::find($id);
        if($model) {
            $model->delete();
        }
        if($request->ajax()){
            return response()->json(true);
        }else{
            return redirect('/shades');
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
