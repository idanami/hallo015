<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobsController extends Controller
{
    public function getPersonWithHighestSalary($job){
        // sql query get person with highest salary by job
        $sql = "SELECT name FROM `jobs` WHERE job = ? ORDER BY Salary DESC LIMIT 1";

        $highestSalary = DB::select($sql,[$job]);
        // // return name with highest salary by job
        return response()->json([
            'status' => 200,
            'highestSalary' => $highestSalary
        ]);
    }

    public function getJobsAndAverageSalary(){
        // sql query get jobs and avrage salary
        $sql = 'SELECT job, AVG(salary) as salary FROM `jobs` GROUP BY job';

        $jobsAndAvgSalary = DB::select($sql);

        // return jobs and avrage salary
        // return $jobsAndAvgSalary;
        return response()->json([
            'status' => 200,
            'jobsAndAvgSalary' => $jobsAndAvgSalary
        ]);
    }

    public function getJobsByPupularity(){
        // sql query get jobs by pupularity
        $sql = 'SELECT job as jobName, COUNT(*) as popularity FROM `jobs` GROUP BY job DESC';

        $jobsByPopularity = DB::select($sql);

        // return jobs by pupularity
        return response()->json([
            'status' => 200,
            'jobsByPopularity' => $jobsByPopularity
        ]);
    }

    public function addNewRowOrUpdate(Request $request){
        if($request->name){
            $name = $request->name;
            $isNameExist = Jobs::where('name', '=', $name)->get();
            // is_int($request->salary);
            if(count($isNameExist) > 0){
                if($request->job || is_int($request->salary)){
                    $job = $request->job !== null ? $request->job : null;
                    $salary = $request->salary !== null ? $request->salary : null;
                    if($job !== null && $salary !== null){
                        Jobs::where('name', '=', $name)->update([
                            'job' => $job,
                            'salary' => $salary
                        ]);
                    }
                    if($job === null && $salary !== null){
                        Jobs::where('name', '=', $name)->update([
                            'salary' => $salary
                        ]);
                    }
                    if($job !== null && $salary === null){
                        Jobs::where('name', '=', $name)->update([
                            'job' => $job,
                        ]);
                    }
                }
                return 'Update successfully';
            }
            if($request->job && is_int($request->salary)){
                $newJob = new Jobs();
                $newJob->name = $name;
                $newJob->job = $request->job;
                $newJob->salary = $request->salary;
                $newJob->save();

                return 'New Row Added';
            }
        }
    }
}
