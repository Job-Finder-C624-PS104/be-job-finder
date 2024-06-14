<?php

namespace App\Http\Controllers;

use App\Http\Resources\ApiResource;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function UpdateProfile(Request $request) {
        DB::beginTransaction();
        try {
            $rules = [
                'name' => ['required', 'min:1', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
                'password' => ['required', 'min:8', Password::defaults()],
                'confirm_password' => ['required', 'min:8', 'same:password'],
                'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:12', 'unique:'.User::class],
                'address' => ['required', 'max:65000'],
                'description' => ['required', 'max:4000000000'],
                'foto' => ['image', 'mimes:jpg,png,jpeg', 'max:70000'],
                'file' => ['file', 'mimes:pdf', 'max:4084']
            ];
            
            foreach ($rules as $field => $rule) {
                if (!isset($request->$field)) {
                    unset($rules[$field]);
                }
            }
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                // DB::rollBack();
                return response()->json(new ApiResource(422, false, $validator->errors(), null), 422);
            }
            $validatedData = $validator->validated();

            $user = User::find(Auth::user()->id);
            $updateData = [];
            if (isset($validatedData['name'])) {
                $updateData['name'] = $validatedData['name'];
            }
            if (isset($validatedData['email'])) {
                $updateData['email'] = $validatedData['email'];
            }
            if (isset($validatedData['password'])) {
                $updateData['password'] = Hash::make($validatedData['password']);
            }
            if (isset($validatedData['phone'])) {
                $updateData['phone'] = $validatedData['phone'];
            }            
            if (isset($validatedData['address'])) {
                $updateData['address'] = $validatedData['address'];
            }            
            if (isset($validatedData['description'])) {
                $updateData['description'] = $validatedData['description'];
            }            
            if (isset($validatedData['foto'])) {
                $file_path = public_path('assets/users/user-'. Auth::user()->id .'/images/' . $user->foto);

                if (file_exists($file_path) && is_file($file_path)) {
                    unlink($file_path);
                }
    
                $image_name = 'user-'. Auth::user()->id . '-' . time() . '.' . $request->foto->extension();
                $request->foto->move(public_path('assets/users/user-'. Auth::user()->id .'/images/'), $image_name);

                $updateData['foto'] = $image_name;
            }            
            if (isset($validatedData['file'])) {
                $file_path = public_path('assets/users/user-'. Auth::user()->id .'/files/' . $user->file);

                if (file_exists($file_path) && is_file($file_path)) {
                    unlink($file_path);
                }
    
                $file_name = 'user-'. Auth::user()->id . '-'. time() . '.' . $request->file->extension();
                $request->file->move(public_path('assets/users/user-'. Auth::user()->id .'/files/'), $file_name);

                $updateData['file'] = $file_name;
            }            
            $user->update($updateData);
            DB::commit();
            return response()->json(new ApiResource(200, true, "Profile has been successfully updated", $user), 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(new ApiResource(500, true, "Profile has been failed to be updated", null), 500);
        }
    }
}
