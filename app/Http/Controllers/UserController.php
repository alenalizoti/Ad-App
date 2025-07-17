<?php

namespace App\Http\Controllers;

use App\Http\Requests\createUserRequest;
use App\Http\Requests\updateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users = User::paginate(10);

        return view('admin.customers-index', compact('users'));
    }

    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('customers.index')->with('success', 'Uspesno ste obrisali korisnika!');
    }

    public function create(){
        return view('admin.customers-create');
    }

    public function store(createUserRequest $request){
        $validated = $request->validated();

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']), 
            'role' => $validated['role'],
        ]);

        return redirect()->route('customers.index')->with('success', 'Uspesno ste kreirali korisnika!');
    }

    public function edit($id){
        $user = User::findOrFail($id);
        return view('admin.customers-edit',compact('user'));
    }

    public function update(updateUserRequest $request, $id){
        $user = User::findOrFail($id);
        $validated = $request->validated();

        $user->name = $validated['name'];
        $user->role = $validated['role'];

        $user->save();

        return redirect()->route('customers.index')->with('success', 'Uspesno ste azurirali korisnika!');
    }
}

    
