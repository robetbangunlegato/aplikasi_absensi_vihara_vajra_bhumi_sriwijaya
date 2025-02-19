<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roles = Role::all();
        return view('Role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if(!'role:super admin'){
            abort(403,'Unauthorized action.');
        }
        return view('Role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if(!'role:super admin'){
            abort(403, 'Unauthorized action');
        }

        $validate = $request->validate([
            'roleName' => 'required|unique:roles,name|regex:/^[a-z]+$/',
            'guardName' => 'required'
        ]);
        $role = new Role();
        $role->name = $validate['roleName'];
        $role->guard_name = $validate['guardName'];
        $role->save();
        return redirect()->route('role.index')->with('sukses','Role/peran berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if(!'role:super admin'){
            abort(403, 'Unauthorized action');
        }
        
        $role = Role::findOrFail($id);
        return view('Role.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if(!'role:super admin'){
            abort(403, 'Unauthorized action');
        }

        $validate = $request->validate([
        'roleName' => 'required|regex:/^[a-z]+$/|unique:roles,name',
        'guardName' => 'required'
        ]);

        $role = Role::findOrFail($id);
        $role->name = $validate['roleName'];
        $role->guard_name = $validate['guardName'];
        $role->update();
        return redirect()->route('role.index')->with('sukses', 'Role berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if(!'role:super admin'){ 
        abort(403,'Unuthorized action.');
        }
        $role = Role::findOrFail($id);
        $role->delete();
        return redirect()->route('role.index')->with('sukses', 'Role berhasil dihapus!');
       
        
    }
}
