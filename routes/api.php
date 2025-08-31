<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

// This is the public route to get a token.
Route::post('login', function (Request $request) {
    $user = User::where('email', $request->email)->first();
    // $credentials = $request->only('email', 'password');

    if (!$user || !Hash::check($request->password, $user->password)) {
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    $token = $user->createToken('Personal Access Token')->accessToken;

    return response()->json(['token' => $token]);

});

// This is a protected route.
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });