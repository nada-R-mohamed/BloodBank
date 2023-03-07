<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::paginate();
        return view('dashboard.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name',
            'guard_name' => 'required|string||max:255|unique:roles,guard_name',
        ]);
        // store in role model
        $role = Role::create($request->all());
        // return redirect to index page with success message
        return redirect()->route('roles.index')
            ->with('success','Role created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //find the role by id
        try{
            $role = Role::findOrFail($id);
        }catch (\Exception $e){
            return redirect()->route('roles.index')
                ->with('info','Role not found');
        }
        //return view with role data
        return view('dashboard.roles.show',compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // check the id parameter is in model
        try{
            $role = Role::findOrFail($id);
        }catch (\Exception $e){
            return redirect()->route('roles.index')->with('error','Role not found');
        }
        //return view with the edit form by id parameter
        return view('dashboard.roles.edit',compact('role'));
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
        // validation for update
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name',
            'guard_name' => 'required|string||max:255|unique:roles,guard_name',
        ]);
        // find role
        $role = Role::findOrFail($id);
        //update role model
        $role->update($request->all());
        //return redirect to index page with success message
        return redirect()->route('roles.index')
            ->with('success','Role updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        //return redirect to index page with success message
        return redirect()->route('roles.index')
            ->with('success','Role deleted successfully.');
    }
}
