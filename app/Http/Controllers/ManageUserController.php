<?php

namespace App\Http\Controllers;

use App\Models\cr;
use App\Models\District;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;

class ManageUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles=Roles::query()->get();
        $district=District::query()->get();
        $users=User::query()->where('roles_id','!=',1)->with('roles')->with('district')->get();
        return inertia('Admin/ManageUsersPage',[
            'roles'=>$roles,
            'districts'=>$district,
            'users'=>$users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validate=$this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'roles_id'=>'required',
            'district_id'=>'required',
        ]);
        User::query()->create($validate);
        return to_route('manage-user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(cr $cr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cr $cr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, cr $cr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,int $id)
    {

        $user=User::query()->where('id',$id)->first();
        $user->delete();
    }
}
