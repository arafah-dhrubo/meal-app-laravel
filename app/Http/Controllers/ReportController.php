<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Meal;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    
    public function report($day)
    {
        $meal = Meal::where('created_at', '>=', Carbon::now()->subdays($day))->get(['type', 'person_count', 'expense', 'created_at']);
        $snacks = $meal->where('type', '==', 'snacks');
        $expense_for_snacks = $snacks->sum('expense');
        $person_for_snacks = $snacks->sum('person_count');

        $lunch = $meal->where('type', '==', 'lunch');
        $expense_for_lunch = $lunch->sum('expense');
        $person_for_lunch = $lunch->sum('person_count');

        $party = $meal->where('type', '==', 'party');
        $expense_for_party = $party->sum('expense');
        $person_for_party = $party->sum('person_count');

        return view('report.report', compact(
            'day',
            'expense_for_snacks',
            'person_for_snacks',
            'expense_for_lunch',
            'person_for_lunch',
            'expense_for_party',
            'person_for_party'
        ));
    }

    public function range(){
        return view('report.range');
    }

    public function dynamic(
        Request $request
    ) {
        $meal = Meal::whereRaw(
            "(created_at >= ? AND created_at <= ?)",
            [
                $request->from_date . " 00:00:00",
                $request->to_date . " 23:59:59"
            ]
        )->get();
        $day = "Dynamic";
        $snacks = $meal->where('type', '==', 'snacks');
        $expense_for_snacks = $snacks->sum('expense');
        $person_for_snacks = $snacks->sum('person_count');

        $lunch = $meal->where('type', '==', 'lunch');
        $expense_for_lunch = $lunch->sum('expense');
        $person_for_lunch = $lunch->sum('person_count');

        $party = $meal->where('type', '==', 'party');
        $expense_for_party = $party->sum('expense');
        $person_for_party = $party->sum('person_count');

        return view('report.report', compact(
            'day',
            'expense_for_snacks',
            'person_for_snacks',
            'expense_for_lunch',
            'person_for_lunch',
            'expense_for_party',
            'person_for_party'
        ));
    }
}
