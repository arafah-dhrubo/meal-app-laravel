<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Meal;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function lastdayreport(){
        $meal=Meal::where('created_at', '>=', Carbon::now()->subdays(1))->get(['name', 'created_at']);
        echo $meal;
    }
}
