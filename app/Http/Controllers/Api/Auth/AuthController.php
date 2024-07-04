<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required',
                'password' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'success',
                    'message' => $validator->errors(),
                ]);
            }

            $credentials = request(['email', 'password']);
            if (!Auth::attempt($credentials)) {
                return response()->json([
                    'message' => 'Unauthorized'
                ], 401);
            }

            $user = $request->user();
            $pelanggan = Pelanggan::where('email', '=', $user->email)->first();
            $tokenResult = $user->createToken('Personal Access Token');
            $token = $tokenResult->plainTextToken;

            return response()->json([
                'accessToken' => $token,
                'user' => $pelanggan,
                'token_type' => 'Bearer',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }

    public function logout(Request $request)
    {
        try {

            $request->user()->tokens()->delete();

            return response()->json([
                'message' => 'Successfully logged out'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }

    public function register(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                "name" => "required",
                "email" => "required",
                "password" => "required",

            ]);

            if ($validator->fails()) {
                return response()->json([
                    "status" => "errors",
                    "message" => "bad request",
                    "errors" => $validator->errors()
                ]);
            }
            $input = $request->all();
            $input["password"] = Hash::make($input["password"]);
            $this->create($input);
            Pelanggan::create([
                'nama' => $input['name'],
                'email' => $input['email'],
                'created_by' => $input['name']
            ]);
            return response()->json([
                'status' => 'success',
                'message' => 'registration successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'internal server error',
                'message' => $e->getMessage()
            ]);
        }
    }

    public function create($data)
    {
        $user = User::create(
            [
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $data['password'],

            ]
        );

        return $user;
    }
    public function user(Request $request)
    {
        return response()->json($request->user());
    }

    public function updateprofile(Request $request)
    {
        $id = $request->id;
        $foto = $request->foto;
        $datadecode = base64_decode($foto);
        $currentTimestamp = time();

        $fileExtension = 'jpg'; // Change this to your desired extension

        // Define the file name with the timestamp and extension
        $fileName = $currentTimestamp . '.' . $fileExtension;

        $directory = 'profile/';

        // $user = User::findOrFail($id);
        $user = Pelanggan::where('id','=',$id)->first();
        Log::info($user);
        $user->update([
            'foto' => url('profile/' . $fileName)
        ]);

        // Save the decoded data to a file
        file_put_contents($directory . $fileName, $datadecode);

        // Log::info($foto);
        return response()->json(['message' => 'success'], 200);
    }
}
