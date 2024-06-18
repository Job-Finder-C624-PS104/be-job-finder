<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\ApiResource;
use App\Http\Controllers\Controller;
use App\Models\ApplyJob;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Jobs extends Controller
{
    public function GetAllJob() {
        $jobs = Job::with('GetUser')->orderBy('id', 'desc')->get();
        
        if ($jobs) {
            return response()->json(new ApiResource(200, true, 'Successfully to get all job', $jobs), 200);
        }
        else {
            return response()->json(new ApiResource(400, true, 'Failed to get all job, not found', null), 400);
        }
    }
    
    public function GetDashboardAllJob(Request $request) {
        if ($request->user('sanctum')->role != 'hire') {
            return response()->json(new ApiResource(403, true, 'Failed to get all job, forbidden access no permission', null), 403);            
        }
        $jobs = Job::where('id_user', $request->user('sanctum')->id)->orderBy('id', 'desc')->with('GetUser')->get();
        
        if ($jobs) {
            return response()->json(new ApiResource(200, true, 'Successfully to get all job', $jobs), 200);
        }
        else {
            return response()->json(new ApiResource(400, true, 'Failed to get all job, not found', null), 400);
        }        
    }

    public function GetDashboardJob(Request $request) {
        if ($request->user('sanctum')->role != 'hire') {
            return response()->json(new ApiResource(403, true, 'Failed to get dashboard job, forbidden access no permission', null), 403);            
        }
        $jobs = Job::where('id_user', $request->user('sanctum')->id)->get();
        if ($jobs) {

            $count_jobs = $jobs->count();
            $count_apply = 0;
            $records_jobs_month = [];
            $records_apply_month = [];
            for ($i = 0; $i <= 5; $i++) {
                $start_date = Carbon::now()->startOfMonth()->addMonths($i)->toDateString();
                $end_date = Carbon::now()->startOfMonth()->addMonths($i)->endOfMonth()->toDateString();
                        
                $total_count_job = Job::where('id_user', $request->user('sanctum')->id)->whereBetween('created_at', [$start_date, $end_date])->count();            
                $records_jobs_month[$start_date] = $total_count_job;
            }
            foreach ($jobs as $job) {
                $count_apply = ApplyJob::where('id_job', $job->id)->count();

                for ($i = 0; $i <= 5; $i++) {
                    $start_date = Carbon::now()->startOfMonth()->addMonths($i)->toDateString();
                    $end_date = Carbon::now()->startOfMonth()->addMonths($i)->endOfMonth()->toDateString();
                            
                    $total_count_apply = ApplyJob::where('id_job', $job->id)->whereBetween('created_at', [$start_date, $end_date])->count();
                    $records_apply_month[$start_date] = $total_count_apply;
                }
            }        
            
            return response()->json(new ApiResource(200, true, 'Successfully to get all job', [
                'totalJobs' => $count_jobs,
                'recordsJobs' => $records_jobs_month,
                'totalApply' => $count_apply,
                'recordsApply' => $records_apply_month
            ]), 200);
        }
        else {
            return response()->json(new ApiResource(400, true, 'Failed to get all job, not found', null), 400);
        }
    }

    public function CreateJob(Request $request) {
        if ($request->user('sanctum')->role != 'hire') {
            return response()->json(new ApiResource(403, true, 'Failed to create job, forbidden access no permission', null), 403);            
        }
        DB::beginTransaction();
        try {
            $validator = Validator::make($request->all(), [
                'title' => ['required', 'max:255'],
                'company' => ['required', 'max:255'],
                'location' => ['required', 'max:255'],
                'salarymin' => ['required', 'min:1'],
                'salarymax' => ['required', 'min:1'],
                'type' => ['required', 'in:Full Time,Part Time,Remote'],
                'description' => ['required', 'max:4000000'],
            ]);
            if ($validator->fails()) {
                // DB::rollBack();
                return response()->json(new ApiResource(422, false, $validator->errors(), null), 422);
            }
            $validatedData = $validator->validated();

            $job = Job::create([
                'title' => $validatedData['title'],
                'company' => $validatedData['company'],
                'location' => $validatedData['location'],
                'salarymin' => $validatedData['salarymin'],
                'salarymax' => $validatedData['salarymax'],
                'type' => $validatedData['type'],
                'description' => $validatedData['description'],
                'id_user' => $request->user('sanctum')->id
            ]);
            DB::commit();
            return response()->json(new ApiResource(201, true, "Job has been successfully added", $job), 201);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(new ApiResource(500, true, "Job has been failed to be added", $e->getMessage()), 500);
        }
    }

    public function EditJob(Request $request, $id) {
        if ($request->user('sanctum')->role != 'hire') {
            return response()->json(new ApiResource(403, true, 'Failed to edit job, forbidden access no permission', null), 403);            
        }
        DB::beginTransaction();
        try {
            $validator = Validator::make($request->all(), [
                'title' => ['required', 'max:255'],
                'company' => ['required', 'max:255'],
                'location' => ['required', 'max:255'],
                'salarymin' => ['required', 'min:1'],
                'salarymax' => ['required', 'min:1'],
                'type' => ['required', 'in:Full Time,Part Time,Remote'],
                'description' => ['required', 'max:4000000'],
            ]);
            if ($validator->fails()) {
                // DB::rollBack();
                return response()->json(new ApiResource(422, false, $validator->errors(), null), 422);
            }
            $validatedData = $validator->validated();

            $job = Job::find($id);
            if (!$job) {
                // DB::rollBack();
                return response()->json(new ApiResource(404, false, 'Job not found', null), 404);
            }

            $job->update([
                'title' => $validatedData['title'],
                'company' => $validatedData['company'],
                'location' => $validatedData['location'],
                'salarymin' => $validatedData['salarymin'],
                'salarymax' => $validatedData['salarymax'],
                'type' => $validatedData['type'],
                'description' => $validatedData['description'],
                'id_user' => $request->user('sanctum')->id
            ]);
            DB::commit();
            return response()->json(new ApiResource(200, true, "Job has been successfully updated", $job), 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(new ApiResource(500, true, "Job has been failed to be updated", $e->getMessage()), 500);
        }
    }

    public function DeleteJob(Request $request, $id) {
        if ($request->user('sanctum')->role != 'hire') {
            return response()->json(new ApiResource(403, true, 'Failed to delete job, forbidden access no permission', null), 403);            
        }
        DB::beginTransaction();
        try {
            $job_dump = Job::find($id);
            $job = Job::find($id);
            if (!$job) {
                return response()->json(new ApiResource(404, false, 'Job not found', null), 404);
            }
            $job->delete();
            DB::commit();
            return response()->json(new ApiResource(200, true, "Job has been successfully deleted", $job_dump), 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(new ApiResource(500, true, "Job has been failed to be deleted", $e->getMessage()), 500);
        }
    }
}
