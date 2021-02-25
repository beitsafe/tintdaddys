<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Installer;
use Illuminate\Http\Request;
use App\DataTables\InstallerDataTable;

class InstallerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(InstallerDataTable $dataTable ,Request $request)
    {
        return $dataTable->render('admin.installers.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Installer $installer)
    {
        $data['model'] = $installer;
        return view('admin.installers.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Installer $installer)
    {
        $this->_save($request, $installer);
        Alert::success('Installer created successfully!', 'Success');
        return redirect()->route('admin.installers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Installer  $installer
     * @return \Illuminate\Http\Response
     */
    public function show(Installer $installer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Installer  $installer
     * @return \Illuminate\Http\Response
     */
    public function edit(Installer $installer)
    {
        $data['model'] = $installer;
        return view('admin.installers.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Installer  $installer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Installer $installer)
    {
        $this->_save($request, $installer);
        Alert::success('Installer updated successfully', 'Success');
        return redirect()->route('admin.installers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Installer  $installer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $model = Installer::find($id);
        if($model) {
            $model->delete();
        }
        if($request->ajax()){
            return response()->json(true);
        }else{
            return redirect('/installers');
        }
    }

    protected function _validate($request)
    {
        $this->validate($request, [
            'longitude' => "required",
            'latitude' => "required",
            'name' => "required",
        ]);
    }

    protected function _save($request, $model)
    {
        $model->fill($request->except(['_token']));
        $model->save();
    }
}
