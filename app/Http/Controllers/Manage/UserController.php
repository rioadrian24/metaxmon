<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(Request $request)
    {

        $get = $request->get('tab');

        switch ($get) {
            case null:
                $users = User::where('name', '!=', 'Master')->orderBy('id', 'desc')->paginate(10);
                break;
            case 'trash':
                $users = User::where('name', '!=', 'Master')->onlyTrashed()->paginate(10);
                break;
            default:
                $users = User::where('name', '!=', 'Master')->where('status', ucfirst($get))->orderBy('id', 'desc')->paginate(10);
                break;
        }

        $total_user = User::where('name', '!=', 'Master')->count();
        $total_active = User::where('name', '!=', 'Master')->where('status', 'active')->count();
        $total_pending = User::where('name', '!=', 'Master')->where('status', 'pending')->count();
        $total_suspend = User::where('name', '!=', 'Master')->where('status', 'suspend')->count();
        $total_trash = User::where('name', '!=', 'Master')->onlyTrashed()->count();

        return view('manage.user.index', compact('users', 'total_user', 'total_active', 'total_pending', 'total_suspend', 'total_trash'));
    }

    public function create()
    {
        return view('manage.user.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5',
            'status' => 'required',
        ]);

        if ($request->file('file')) {
            $path = $request->file('file')->store('user', 'public');
            $request['avatar'] = $path;
        }

        $request['password'] = bcrypt($request->password);

        User::create($request->all());
        return redirect()->route('user.index')->with('success', 'User has been added');
    }

    public function edit(User $user)
    {
        return view('manage.user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required',
            'status' => 'required',
        ]);

        if ($request->file('file')) {

            if (!is_null($user->avatar)) {
                Storage::disk('public')->delete($user->avatar);
            }

            $path = $request->file('file')->store('user', 'public');
            $request['avatar'] = $path;
        }

        $user->update($request->all());
        return redirect()->route('user.index')->with('success', 'User has been edited');
    }

    public function profile()
    {
        return view('manage.user.profile');
    }

    public function update_profile(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        if ($request->file('file')) {

            if (!is_null($user->avatar)) {
                Storage::disk('public')->delete($user->avatar);
            }

            $path = $request->file('file')->store('user', 'public');
            $request['avatar'] = $path;
        }

        $user->update($request->all());
        return redirect()->back()->with('success', 'User profile has been edited');
    }

    public function password()
    {
        return view('manage.user.password');
    }

    public function update_password(Request $request, User $user)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|min:5',
            're_password' => 'required|min:5|same:password'
        ]);

        if (password_verify($request->old_password, $user->password)) {
            $request['password'] = bcrypt($request->password);

            $user->update($request->all());

            return redirect()->back()->with('success', 'Password has been changed');
        } else {
            return back()->with('error', 'Old password is wrong');
        }
    }

    public function destroy(User $user)
    {
        $user->delete();

        return back()->with('success', 'User move to trash');
    }

    public function forceDestroy($id)
    {
        User::withTrashed()->find($id)->forceDelete();

        return back()->with('success', 'User was deleted permantly');
    }

    public function destroyAll(Request $request)
    {
        User::onlyTrashed()->forceDelete();

        return back()->with('success', 'User was deleted permantly');
    }

    public function restore($id)
    {
        User::withTrashed()->find($id)->restore();

        return back()->with('success', 'User has been restored');
    }
}
