<?php

namespace App\Http\Controllers;

use App\Http\Resources\ApiResource;
use App\Models\ApplyJob as ModelsApplyJob;
use App\Models\Job;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ApplyJob extends Controller
{
    public function ApplyJob($id) {
        DB::beginTransaction();
        try {            
            $job = Job::find($id);
            if (!$job) {
                // DB::rollBack();
                return response()->json(new ApiResource(404, false, 'Job not found', null), 404);
            }
    
            ModelsApplyJob::create([
                'id_user' => Auth::user()->id,
                'id_job' => $job->id,
                'status' => 'pending'
            ]);
            DB::commit();
            return response()->json(new ApiResource(201, true, "Apply job has been successfully added", $job), 201);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(new ApiResource(500, true, "Apply job has been failed to be added", null), 500);
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

            $apply = ModelsApplyJob::where('id_job', $id)->first();
            if (!$apply) {
                // DB::rollBack();
                return response()->json(new ApiResource(404, false, 'Job not found', null), 404);
            }
            $apply->update([
                'status' => $validatedData['status']
            ]);
            DB::commit();
            return response()->json(new ApiResource(200, true, "Apply job has been successfully updated", $apply->getJob()), 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(new ApiResource(500, true, "Apply job has been failed to be updated", null), 500);
        }
    }
}
