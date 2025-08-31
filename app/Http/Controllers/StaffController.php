<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use APP\Http\Requests\StaffDataRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\Staff;
class StaffController extends Controller
{
    //
    public function store(StaffDataRequest $request)
    {
        $validatedData = $request->validated();

        Staff::create([
            'firstname' => $validatedData['firstname'],
            'middlename' => $validatedData['middlename'],
            'lastname' => $validatedData['lastname'],
            'email' => $validatedData['email'],
            'phoneno' => $validatedData['phoneno'],
            // It is critical to hash the password before storing it.
            'address' => $validatedData['address'],
            'password' => Hash::make($validatedData['password']),

        ]);
    }
}