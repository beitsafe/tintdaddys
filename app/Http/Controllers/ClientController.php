<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            return $this->_datatable($request);
        }else{
            return view('admin.clients.index');
        }
    }

    protected function _datatable(Request $request)
    {
        $datatable = DataTables::of(Client::query());

        $datatable->addColumn('action', function ($model){
            $html = '<button onclick="location.href='."'".route('admin.clients.edit', $model->id)."'".'"
                             type="button"
                             class="btn btn-info btn-circle"
                             data-toggle="tooltip"
                             title="Edit">
                        <i class="fa fa-pencil"></i>
                    </button>&nbsp;';

            $html .= '<button data-url="'.route('admin.clients.destroy', $model->id).'" type="button"
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
    public function create(Request $request, Client $client)
    {
        $data['model'] = $client;
        return view('admin.clients.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Client $client)
    {
        $this->_validate($request);
        $this->_save($request, $client);

        return redirect()->route('admin.clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        $data['model'] = $client;

        return view('admin.clients.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $this->_validate($request);
        $this->_save($request, $client);

        return redirect()->route('admin.clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Client $client)
    {
        if($client) {
            $client->delete();
        }
        if($request->ajax()){
            return response()->json(true);
        }
        return redirect()->route('admin.clients.index');
    }

    protected function _validate($request, $id = null)
    {
        $this->validate($request, [
            'email' => "required",
            'phone' => "required",
            'organisation' => "required",
            'address' => "required",
            'city' => "required",
            'state' => "required",
            'postcode' => "required"
        ]);
    }

    protected function _save($request, $model)
    {
        $model->fill($request->except(['_token']));
        $model->save();
    }

}
