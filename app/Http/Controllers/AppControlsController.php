<?php

namespace App\Http\Controllers;

use App\Models\AppControls;
use Illuminate\Http\Request;

class AppControlsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $download=AppControls::query()->first();
        return inertia('Admin/ManageAppButtons',[
            'downloadBtn'=>$download
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AppControls $appControls)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AppControls $appControls)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AppControls $appControls)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AppControls $appControls)
    {
        //
    }

    public function downloadBtn(Request $request)
    {
        AppControls::query()->update(array('download_button'=>$request->data));
    }

    public function permissionBtn(Request $request)
    {
        AppControls::query()->update(array('permission_button'=>$request->data));
    }
}
