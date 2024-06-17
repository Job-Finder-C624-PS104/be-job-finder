<?php

namespace App\Http\Controllers;

use App\Http\Resources\ApiResource;
use App\Models\ApplyJob as ModelsApplyJob;
use App\Models\Job;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ApplyJob extends Controller
{
    public function GetAllApplyJob() {
        $jobs = ModelsApplyJob::with('GetJob')->with('GetUser')->get();

        if ($jobs) {
            return response()->json(new ApiResource(200, true, 'Successfully to get all applied jobs', $jobs), 200);
        } else {
            return response()->json(new ApiResource(400, true, 'Failed to get all applied jobs, not found', null), 400);
        }
    }

    public function GetApplyJob(Request $request) {
        $jobs = ModelsApplyJob::where('id_user', $request->user('sanctum')->id)->with('GetJob')->with('GetUser')->get();

        if ($jobs) {
            return response()->json(new ApiResource(200, true, 'Successfully to get applied jobs', $jobs), 200);
        } else {
            return response()->json(new ApiResource(400, true, 'Failed to get applied jobs, not found', null), 400);
        }
    }

    public function ApplyJob(Request $request, $id) {
        DB::beginTransaction();
        try {            
            $job = Job::find($id);
            if (!$job) {
                // DB::rollBack();
                return response()->json(new ApiResource(404, false, 'Job not found', null), 404);
            }
            $job_exist = ModelsApplyJob::where('id_user', $request->user('sanctum')->id)->where('id_job', $id)->first();
            if ($job_exist) {
                // DB::rollBack();
                return response()->json(new ApiResource(400, false, 'Job have already applied', null), 400);
            }
            
            ModelsApplyJob::create([
                'id_user' => $request->user('sanctum')->id,
                'id_job' => $job->id,
                'status' => 'pending'
            ]);
            DB::commit();
            return response()->json(new ApiResource(201, true, "Apply job has been successfully added", $job), 201);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(new ApiResource(500, true, "Apply job has been failed to be added", $e->getMessage()), 500);
        }        
    }

    public function UpdateApplyJob(Request $request, $id) {
        DB::beginTransaction();
        try {
            $validator = Validator::make($request->all(), [
                'status' => ['required', 'in:pending,accept,reject']
            ]);
            if ($validator->fails()) {
                // DB::rollBack();
                return response()->json(new ApiResource(422, false, $validator->errors(), null), 422);
            }
            $validatedData = $validator->validated();

            $apply = ModelsApplyJob::where('id_job', $id)->with('GetJob')->with('GetUser')->first();
            if (!$apply) {
                // DB::rollBack();
                return response()->json(new ApiResource(404, false, 'Job applied not found', null), 404);
            }
            $apply->update([
                'status' => $validatedData['status']
            ]);
            DB::commit();
            return response()->json(new ApiResource(200, true, "Apply job has been successfully updated", $apply), 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(new ApiResource(500, true, "Apply job has been failed to be updated", $e->getMessage()), 500);
        }
    }
}
