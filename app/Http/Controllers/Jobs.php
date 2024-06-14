<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\ApiResource;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Jobs extends Controller
{
    public function GetAllJob() {
        $jobs = Job::all();
        
        if ($jobs) {
            return response()->json(new ApiResource(200, true, 'Successfully to get all job', $jobs), 200);
        }
        else {
            return response()->json(new ApiResource(400, true, 'Failed to get all job, not found', null), 400);
        }
    }

    public function GetDashboardJob() {
        $jobs = Job::where('id_user', Auth::user()->id)->get();
        
        if ($jobs) {
            $count_jobs = $jobs->count();
            $records_jobs_month = [];

            for ($i = 0; $i <= 5; $i++) {
                $start_date = Carbon::now()->startOfMonth()->addMonths($i)->toDateString();
                $end_date = Carbon::now()->startOfMonth()->addMonths($i)->endOfMonth()->toDateString();
                        
                $total_count = Job::where('id_user', Auth::user()->id)->whereBetween('date', [$start_date, $end_date])->count();
            
                $records_jobs_month[$start_date] = $total_count;
            }
            
            return response()->json(new ApiResource(200, true, 'Successfully to get all job', [
                'totalJobs' => $count_jobs,
                'recordsJobs' => $records_jobs_month
            ]), 200);
        }
        else {
            return response()->json(new ApiResource(400, true, 'Failed to get all job, not found', null), 400);
        }
    }

    public function CreateJob(Request $request) {
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
                'id_user' => Auth::user()->id
            ]);
            DB::commit();
            return response()->json(new ApiResource(201, true, "Job has been successfully added", $job), 201);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(new ApiResource(500, true, "Job has been failed to be added", null), 500);
        }
    }

    public function EditJob(Request $request, $id) {
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
                'id_user' => Auth::user()->id
            ]);
            DB::commit();
            return response()->json(new ApiResource(201, true, "Job has been successfully added", $job), 201);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(new ApiResource(500, true, "Job has been failed to be added", null), 500);
        }
    }

    public function DeleteJob($id) {
        DB::beginTransaction();

        try {
            $job = Job::where('id', $id)->first();
            Job::where('id', $id)->delete();
            DB::commit();
            return response()->json(new ApiResource(200, true, "Job has been successfully deleted", $job), 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(new ApiResource(500, true, "Job has been failed to be deleted", null), 500);
        }
    }
}
