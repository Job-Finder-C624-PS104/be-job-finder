<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\ApiResource;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class Jobs extends Controller
{
    public function GetAllJob() {
        $jobs = Job::all();
        
        if ($jobs) {
            return new ApiResource(200, true, 'Successfully to get all job', $jobs);
        }
        else {
            return new ApiResource(400, true, 'Failed to get all job, not found', null);
        }
    }

    public function CreateJob(Request $request) {
        DB::beginTransaction();
        try {
            $validator = Validator::make($request->all(), [
                'title' => ['required', 'max:255'],
                'company' => ['required', 'max:255'],
                'location' => ['required', 'max:255'],
                'salary' => ['required', 'min:1'],
                'description' => ['required', 'max:4000000'],
                'id_user' => ['required', 'exists:users,id']
            ]);
            if ($validator->fails()) {
                DB::rollBack();
                return response()->json(new ApiResource(422, false, $validator->errors(), null), 422);
            }
            $validatedData = $validator->validated();

            $job = Job::create([
                'title' => $validatedData['title'],
                'company' => $validatedData['company'],
                'location' => $validatedData['location'],
                'salary' => $validatedData['salary'],
                'description' => $validatedData['description'],
                'id_user' => $validatedData['id_user']
            ]);
            DB::commit();
            return response()->json(new ApiResource(201, true, "Job has been successfully added", $job), 201);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(new ApiResource(500, true, "Job has been failed to be added", null), 500);
        }
    }
}
