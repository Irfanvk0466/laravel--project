<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Support\Facades\Log;

class ApiController 
{
    public function loginProfile()
    {
        try {
            $user = User::where('email', request('email'))->first();

            return response()->json([
                'email' => request('email'),
                'password' => request('password'),
            ]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                'error' => 'An error occurred during loginProfile.',
            ], 500);
        }
    }

    public function Profile()
    {
        try {
            $userId = request('user_id');
            $user = User::find($userId);

            return response()->json([
                'status' => 200,
                'data' => ['profile' => $user],
                'message' => 'user created successfully',
            ]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                'error' => 'An error occurred during Profile.',
            ], 500);
        }
    }
}

  
    

