<?php

namespace App\Http\Controllers;

use App\Http\Requests\Web\StoreWarrantyRequest;
use App\Models\Warranty;
use Illuminate\Http\Request;
use App\Mail\WarrantyApplication;
use Illuminate\Support\Facades\Mail;
use App\DataTables\WarrantyDataTable;
use Illuminate\Support\Facades\Storage;

class WarrantyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(WarrantyDataTable $dataTable, Request $request)
    {
        return $dataTable->render('admin.warranties.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWarrantyRequest $request, Warranty $warranty)
    {
        $this->_save($request, $warranty);

        Mail::to(env('MAIL_FROM_ADDRESS','developers@beitsfe.com'))->send(new WarrantyApplication($warranty));

        return redirect()->route('dashboard')->with('success','Warranty submission successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Warranty  $warranty
     * @return \Illuminate\Http\Response
     */
    public function show(Warranty $warranty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Warranty  $warranty
     * @return \Illuminate\Http\Response
     */
    public function edit(Warranty $warranty)
    {
        $data['model'] = $warranty;
        return view('admin.warranties.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Warranty  $warranty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Warranty $warranty)
    {
        $this->_save($request, $warranty);
        return redirect()->route('admin.warranties.index')->with('success','Warranty updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Warranty  $warranty
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $model = Warranty::find($id);
        if($model) {
            $model->delete();
        }
        if($request->ajax()){
            return response()->json(true);
        }else{
            return redirect('/warranties');
        }
    }

    protected function _validate($request, $id = null)
    {
        $this->validate($request, [

        ]);
    }

    protected function _save($request, $model)
    {
        $model->fill($request->except(['_token','signature']));
        $model->save();

        //process signature
        if($image = $request['signature']) {
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageName = "signatures/{$model->id}.png";
            Storage::disk('public')->put($imageName, base64_decode($image));

            $model->signature()->updateOrCreate(
                ['resourceable_id' => $model->id,'resourceable_type'=>'App\Models\Order'],
                ["filepath"=>$imageName]
            );
        }
    }

}
