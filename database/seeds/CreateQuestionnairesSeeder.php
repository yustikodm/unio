<?php

use App\Models\Questionnaire;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CreateQuestionnairesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'question' => 'Are u interest in information technology?',
                'type' => 'basic',
                'answer_choice' => NULL,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        Questionnaire::insert($data);
    }
}
