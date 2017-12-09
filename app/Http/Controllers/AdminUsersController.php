<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Language;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('is.admin');
    }

    public function index()
    {
        if (request('search')) {
            $search = request('search');
            $users = User::where('name', 'like', '%' . $search . '%')->
            orWhere('email', 'like', '%' . $search . '%')->paginate(12);
            return view('admin.users.index', compact('users'));
        }
        $users = User::paginate(12);
        return view('admin.users.index', compact('users'));
    }


    public function create()
    {
        $roles = Role::pluck('name', 'id')->all();
        $languages = Language::pluck('description', 'id')->all();
        return view('admin.users.create', compact('roles', 'languages'));
    }


    public function store(UsersRequest $request)
    {
        $input = $request->all();
        $input['password'] = bcrypt($request['password']);
        $user = User::create($input);
        return redirect()->action('AdminUsersController@show', $user);
    }


    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }


    public function edit(User $user)
    {
        $roles = Role::pluck('name', 'id')->all();
        $languages = Language::pluck('description', 'id')->all();
        return view('admin.users.edit', compact('user', 'roles', 'languages'));
    }


    public function update(UsersRequest $request, User $user)
    {
        $input = $request->all();
        $input['password'] = bcrypt($request['password']);
        $user->update($input);
        return redirect()->action('AdminUsersController@show', $user);
    }


    public function destroy(User $user)
    {
        if($user->id != 1) { // this user id should not be deleted !
            $user->delete();
        }
        return redirect()->action('AdminUsersController@index');
    }
}
