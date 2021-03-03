<?php

namespace App\Http\Controllers;

use Alert;
use App\DataTables\UserDataTable;
use App\Mail\UserApplicationApproved;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function index(UserDataTable $dataTable, Request $request)
    {
        return $dataTable->render('admin.users.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, User $user)
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $data['user'] = $data['model'] = $user;


        return view('admin.users.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->_validate($request, $id);

        $model = User::find($id);
        $this->_save($request, $model);

        Alert::success('User updated successful!', 'Success');

        return redirect('admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $model = User::find($id);
        if ($model) {
            $model->delete();
        }
        if ($request->ajax()) {
            return response()->json(true);
        } else {
            return redirect('admin/user');
        }
    }

    protected function _validate($request, $id = null)
    {
        $rules = [
            'name' => "required",
            'email' => "required|email|unique:users,email,{$id},id,deleted_at,NULL",
        ];

        if (!$id) {
            $rules['password'] = 'required';
            $rules['confirm_password'] = ['required', 'same:password'];
        } else {
            $rules['confirm_password'] = ['same:password'];
        }

        $this->validate($request, $rules);
    }

    protected function _save($request, $model)
    {
        $model->fill($request->except(['_token', 'password', 'confirm_password', 'roles']));
        if ($password = $request->password) {
            $model->password = bcrypt($password);
        }
        $model->save();

    }

    public function toggleApprove(User $user)
    {
        $role = User::ROLE_APPROVED;
        if (!$user->hasRole($role)) {
            $user->assignRole($role);
            Mail::to($user->email)->queue(new UserApplicationApproved($user));
        } else {
            $user->removeRole($role);
        }

        return redirect()->back();
    }
}
