<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\ApiResource;
use App\Http\Controllers\Controller;
use App\Models\ApplyJob;
use App\Models\Job;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function AddUser(Request $request) {
        if ($request->user('sanctum')->role != 'admin') {
            return response()->json(new ApiResource(403, true, 'Failed to add user, forbidden access no permission', null), 403);            
        }
        DB::beginTransaction();
        try {
            $validator = Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
                'password' => ['required', 'min:8', Rules\Password::defaults()],
                'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:12', 'unique:'.User::class],
                'role' => ['required', 'in:worker,hire,admin']
            ]);
            if ($validator->fails()) {
                // DB::rollBack();
                return response()->json(new ApiResource(422, false, $validator->errors(), null), 422);
            }
            $validatedData = $validator->validated();
            $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
                'phone' => $validatedData['phone'],
                'role' => $validatedData['role']
            ]);
            DB::commit();
            return response()->json(new ApiResource(201, true, "Add User Success", $user), 201);
            
        } catch(Exception $e) {
            DB::rollBack();
            return response()->json(new ApiResource(500, true, "Add User Failed, An Error Occurred", $e->getMessage()), 500);
        }
    }

    public function EditUser(Request $request, $id) {
        if ($request->user('sanctum')->role != 'admin') {
            return response()->json(new ApiResource(403, true, 'Failed to edit user, forbidden access no permission', null), 403);
        }
        DB::beginTransaction();
        try {
            $validator = Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
                'password' => ['required', 'min:8', Rules\Password::defaults()],
                'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:12', 'unique:'.User::class],
                'role' => ['required', 'in:worker,hire,admin']
            ]);
            if ($validator->fails()) {
                // DB::rollBack();
                return response()->json(new ApiResource(422, false, $validator->errors(), null), 422);
            }
            $validatedData = $validator->validated();

            $user = User::find($id);
            if (!$user) {
                // DB::rollBack();
                return response()->json(new ApiResource(404, false, 'User not found', null), 404);
            }

            $updateData = [];

            if (isset($validatedData['name'])) {
                $updateData['name'] = $validatedData['name'];
            }
            if (isset($validatedData['email'])) {
                $updateData['email'] = $validatedData['email'];
            }
            if (isset($validatedData['password'])) {
                $updateData['password'] = $validatedData['password'];
            }
            if (isset($validatedData['phone'])) {
                $updateData['phone'] = $validatedData['phone'];
            }
            if (isset($validatedData['role'])) {
                $updateData['role'] = $validatedData['role'];
            }

            $user->update($updateData);
            DB::commit();
            return response()->json(new ApiResource(200, true, "User has been successfully updated", $user), 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(new ApiResource(500, true, "User has been failed to be updated", $e->getMessage()), 500);
        }
    }

    public function DeleteUser(Request $request, $id) {
        if ($request->user('sanctum')->role != 'admin') {
            return response()->json(new ApiResource(403, true, 'Failed to delete user, forbidden access no permission', null), 403);            
        }
        DB::beginTransaction();
        try {
            $user_dump = User::find($id);
            $user = User::find($id);
            if (!$user) {
                return response()->json(new ApiResource(404, false, 'User not found', null), 404);
            }

            $file = public_path('assets/users/user-'. $user->id .'/files/' . $user->file);

            if (file_exists($file) && is_file($file)) {
                unlink($file);
            }

            $image = public_path('assets/users/user-'. $user->id .'/images/' . $user->foto);

            if (file_exists($image) && is_file($image)) {
                unlink($image);
            }

            ApplyJob::where('id_user', $user->id)->delete();
            Job::where('id_user', $user->id)->delete();

            $user->delete();
            DB::commit();
            return response()->json(new ApiResource(200, true, "User has been successfully deleted", $user_dump), 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(new ApiResource(500, true, "User has been failed to be deleted", $e->getMessage()), 500);
        }
    }
}
