<?php

namespace App\Console\Commands;

use Meals;
use Carbon\Carbon;
use App\Models\Meal;
use App\Mail\WeeklyReport;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class sendWeeklyReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weekly:mail_report';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Weekly report send to Manager';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $meal = Meal::where('created_at', '>=', Carbon::now()->subdays(7))->get(['type', 'person_count', 'expense', 'created_at']);
        $snacks = $meal->where('type', '==', 'snacks');
        $expense_for_snacks = $snacks->sum('expense');
        $person_for_snacks = $snacks->sum('person_count');

        $lunch = $meal->where('type', '==', 'lunch');
        $expense_for_lunch = $lunch->sum('expense');
        $person_for_lunch = $lunch->sum('person_count');

        $party = $meal->where('type', '==', 'party');
        $expense_for_party = $party->sum('expense');
        $person_for_party = $party->sum('person_count');

            $email = "parvej@gmail.com";
            $body = [
            'expense_for_snacks'=>$expense_for_snacks,
            'person_for_snacks'=> $person_for_snacks,
            'expense_for_lunch'=> $expense_for_lunch,
            'person_for_lunch'=> $person_for_lunch,
            'expense_for_party'=> $expense_for_party,
            'person_for_party'=> $person_for_party
            ];
            Mail::to($email)->send(new WeeklyReport($body));
            $this->info('Weekly report has been sent successfully');

    }
}
