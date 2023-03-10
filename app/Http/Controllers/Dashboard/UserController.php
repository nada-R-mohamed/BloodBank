<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Client;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate();
        return view('dashboard.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('dashboard.users.create',compact('roles'));
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
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|string',['exists:roles,name'],
        ]);
        $data = $request->except('password');
        //password hashing
        $data['password'] = Hash::make($request->password);
        // store user
        $user = User::create($data);
        // return redirect to index page with success message
        return redirect()->route('users.index')
            ->with('success','User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //find the user by id
        try{
            $user = User::findOrFail($id);
        }catch (\Exception $e){
            return redirect()->route('users.index')
                ->with('info','User not found');
        }
        //return view with user data
        return view('dashboard.users.show',compact('user'));
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
            $user = User::findOrFail($id);
            $roles = Role::all();
        }catch (\Exception $e){
            return redirect()->route('users.index')->with('error','User not found');
        }
        //return view with the edit form by id parameter
        return view('dashboard.users.edit',compact('user','roles'));
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
        $user = User::findOrFail($id);
        // validation for update
        $data = [
            'name' => 'max:255',
            'email' => "email|unique:users,email,$id",
            'role' => 'string',['exists:roles,name'],
        ];
        $request->validate($data, [
            'password' => $request->password != null ?'sometimes|required|min:8|confirmed': ''
        ]);

        if($request->has('password'))
        {
            $data = $request->except('password');
            $data['password'] = Hash::make($request->password);
        }
        //update user model
        $user->update($data);
        //return redirect to index page with success message
        return redirect()->route('users.index')
            ->with('success','User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        //return redirect to index page with success message
        return redirect()->route('users.index')
            ->with('success','User deleted successfully.');
    }
    public function changePassword()
    {
        return view('dashboard.users.change-password');
    }
    public function updatePassword(Request $request)
    {
        //validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        //match the old password
        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }

        //update the new password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        return redirect()->route('dashboard.users.change-password')->with("status", "Password changed successfully!");
    }
}
