<?php

namespace App\Http\Controllers;

use App\Models\UserList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;

class UserManagerController extends Controller
{
    public function userManager()
    {
        $users = UserList::orderBy('first_name')->orderBy('last_name')->get();
        return view('user_manager.UserManager', compact('users'));
    }

    public function deleteUser($id)
    {
        $user = UserList::find($id);
        if ($user) {
            $user->delete();
            return redirect()->back()->with('success', 'User deleted successfully.');
        }
        return redirect()->back()->with('error', 'User not found.');
    }

    public function editUser(UserList $user)
    {
        return view('user_manager.EditUser', compact('user'));
    }


    public function updateUser(Request $request, UserList $user)
    {
        try {
            $validatedData = $request->validate([
                'username' => 'required|unique:user_lists,username,' . $user->id,
                'email' => 'required|email|unique:user_lists,email,' . $user->id,
                'first_name' => 'required',
                'middle_name' => 'nullable',
                'last_name' => 'required',
            ], [
                'username.required' => 'Please enter a username.',
                'username.unique' => 'The username is already taken.',
                'email.required' => 'Please enter an email address.',
                'email.email' => 'Please enter a valid email address.',
                'email.unique' => 'The email address is already taken.',
                'first_name.required' => 'Please enter a first name.',
                'last_name.required' => 'Please enter a last name.',
            ]);

            $user->update($validatedData);

            if ($user->wasChanged()) {
                return response()->json([
                    'message' => 'User updated successfully!',
                    'user' => $user
                ]);
            } else {
                return response()->json([
                    'message' => 'No changes were made to the user.',
                ]);
            }
        } catch (ValidationException $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 422);
        }
    }


    public function storeUser(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'username' => 'required|string|unique:user_lists,username|max:255',
                'first_name' => 'required|string|max:255',
                'middle_name' => 'nullable|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|email|unique:user_lists,email|max:255',
                'password' => 'required|string|min:8',
            ]);

            $user = UserList::create([
                'username' => $validatedData['username'],
                'first_name' => $validatedData['first_name'],
                'middle_name' => $validatedData['middle_name'],
                'last_name' => $validatedData['last_name'],
                'email' => $validatedData['email'],
                'password' => bcrypt($validatedData['password']),
            ]);

            return response()->json([
                'message' => 'User created successfully!',
                'user' => $user
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 422);
        }
    }



    public function addUser()
    {
        return view('user_manager.NewUser');
    }


}
