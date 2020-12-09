<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebUserControler extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->paginate(50);
        return view('admin.users.index', compact('users', $users));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\User $user
     * @param Role $role
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if(Gate::denies('edit-users')){
            session()->flash('message','You don\' have permissions to this action');
            return redirect(route('admin.users.index'));
        }
        $roles =Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);
        $request->session()->flash('message', 'Successfully modified the user: '.$user->id.' '.$user->name);
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, User $user)
    {
        if (Gate::denies('delete-users')) {
            session()->flash('message', 'You don\' have permissions to this action');
            return redirect(route('admin.users.index'));
        }
        $user->roles()->detach();
        $user->delete();
        $request->session()->flash('message', 'Successfully deleted the user: ' . $user->id . ' ' . $user->name);
        return redirect()->route('admin.users.index');
    }
}
