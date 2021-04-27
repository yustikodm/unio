<?php

use App\Models\University;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UniversitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $universities = [
            ['country_id' => '1','state_id' => '1','district_id' => '1', 'name' => 'Harvard University', 'description' => 'Harvard is at the frontier of academic and intellectual discovery. Those who venture here—to learn, research, teach, work, and grow—join nearly four centuries of students and scholars in the pursuit of truth, knowledge, and a better world.', 'logo_src' => '','type' => '','accreditation' => '','address' => 'Cambridge, MA, Amerika Serikat', 'email' => 'college@fas.harvard.edu'],
            ['country_id' => '1','state_id' => '1','district_id' => '1', 'name' => 'Institut Teknologi Sepuluh Nopember (ITS)', 'description' => '', 'logo_src' => '','type' => '','accreditation' => '', 'address' => 'Jl. Teknik Kimia, Keputih, Kec. Sukolilo, Kota SBY, Jawa Timur 60111', 'email' => 'humas@its.ac.id'],
            ['country_id' => '1','state_id' => '1','district_id' => '1', 'name' => 'University of Oxford', 'description' => '', 'logo_src' => '','type' => '','accreditation' => '', 'address' => 'Oxford OX1 2JD, United Kingdom ', 'email' => 'enquiries@devoff.ox.ac.uk'],
        ];

        foreach($universities as $univ){
            University::create(array_merge($univ, [
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]));
        }
    }
}
