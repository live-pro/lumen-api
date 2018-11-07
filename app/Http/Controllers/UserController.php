<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json([
            'success' => true,
            'data' => $users
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users'
        ]);
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->mobile_no = $request->mobile_no;
        $user->email = $request->email;
        $user->password = app('hash')->make($request->password);
        $user->save();
        return response()->json([
            'success' => true,
            'message' => 'User created successfully!',
            'data' => $user
        ]);
    }

    public function show($id)
    {
        $user = User::find($id);
        return response()->json([
            'success' => true,
            'data' => $user
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'unique:users,email,' . $user->id

        ]);

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->mobile_no = $request->mobile_no;
        $user->password = app('hash')->make($request->password);
        $user->save();
        return response()->json([
            'success' => true,
            'message' => 'Data updated successfully!',
            'data' => $user
        ]);
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
            return response()->json([
                'success' => true,
                'message' => 'Data Deleted Successfully!',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'No record found!',
            ]);
        }
    }
}
