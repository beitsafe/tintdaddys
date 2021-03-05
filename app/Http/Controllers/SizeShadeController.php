<?php

namespace App\Http\Controllers;

use Alert;
use App\Http\Requests\Auth\BulkSaveSizeShadeRequest;
use App\Http\Requests\Auth\SaveSizeShadeRequest;
use App\Models\SizeShade;
use Illuminate\Http\Request;
use App\DataTables\SizeShadeDataTable;

class SizeShadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SizeShadeDataTable $dataTable ,Request $request)
    {
        return $dataTable->render('admin.sizeshades.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(SizeShade $sizeshade)
    {
        $data['model'] = $sizeshade;
        return view('admin.sizeshades.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveSizeShadeRequest $request, SizeShade $sizeshade)
    {
        $this->_save($request, $sizeshade);
        return redirect()->route('admin.sizeshades.index')->with('success', 'SizeShade created successfully!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SizeShade  $sizeshade
     * @return \Illuminate\Http\Response
     */
    public function bulkSave(BulkSaveSizeShadeRequest $request)
    {
        $rows = $request->get('rows');
        foreach ($rows as $id => $row) {
            SizeShade::find($id)->update($row);
        }

        return redirect()->route('admin.sizeshades.index')->with('success', 'SizeShade bulk updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SizeShade  $sizeshade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $model = SizeShade::find($id);
        if($model) {
            $model->delete();
        }
        if($request->ajax()){
            return response()->json(true);
        }else{
            return redirect()->back();
        }
    }

    protected function _save($request, $model)
    {
        $model->fill($request->except(['_token']));
        $model->save();
    }
}
