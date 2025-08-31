<?php

namespace App\Http\Controllers;
// use App\Http\Controllers\Controller;
use App\Models\CustomerDetails;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerDetailsRequest;
use Illuminate\Support\Facades\Hash;
use function _PHPStan_781aefaf6\React\Promise\all;

class CustomerDetailsController extends Controller
{
    //
    /**
     * Store a newly created user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CustomerDetailsRequest $request)
    {
        // 1. Validate the incoming request data.
        // $validatedData = $request->validated();

        // $customerdetail = new CustomerDetails();
        // $customerdetail->name = $validatedData['name'];
        // $customerdetail->save();

        CustomerDetails::create([
            'name' => $request['name'],
            'email' => $request['email'],
            // It is critical to hash the password before storing it.
            'password' => Hash::make($request['password']),

        ]);


        // 3. Redirect the user back with a success message.
        return redirect('/app')->with('success', 'Registration successful!');
    }

    public function login(Request $request)
    {

    }

    public function getall_user()
    {
        // $CustomerDetails = find::all();

    }
}
