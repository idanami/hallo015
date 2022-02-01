<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobsController extends Controller
{
    public function getPersonWithHighestSalary(){
        // sql query get person with highest salary by job
        $sql = 'SELECT name FROM `jobs` WHERE salary IN
                (SELECT MAX(salary) FROM jobs GROUP BY job)';

        $highestSalary = DB::select($sql);
        // return name with highest salary by job
        return response()->json(['highestSalary' => $highestSalary]);
    }

    public function getJobsAndAverageSalary(){
        // sql query get jobs and avrage salary
        $sql = 'SELECT job, AVG(salary) as salary FROM `jobs` GROUP BY job';

        $jobsAndAvgSalary = DB::select($sql);

        // return jobs and avrage salary
        return response()->json($jobsAndAvgSalary);
    }

    public function getJobsByPupularity(){
        // sql query get jobs by pupularity
        $sql = 'SELECT job, COUNT(*) as pupularity FROM `jobs` GROUP BY job DESC';

        $jobsByPupularity = DB::select($sql);

        // return jobs by pupularity
        return response()->json($jobsByPupularity);

    }
}
