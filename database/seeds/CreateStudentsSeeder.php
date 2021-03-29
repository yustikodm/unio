<?php

use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CreateStudentsSeeder extends Seeder
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
                'user_id' => NULL,
                'guardian_id' => NULL,
                'username' => 'yustiko404',
                'password' => '$2y$10$YAFTTbRa9LpeEPvUI.yPYusUl4JJDq4j57/MOmqEQ2rvzt5Y.80NS',
                'name' => 'Yustiko Daru Murti',
                'picture' => NULL,
                'school_origin' => 'SMK Negeri 1 Surabaya',
                'graduation_year' => NULL,
                'birth_date' => '1999-09-02',
                'birth_place' => 'Surabaya',
                'email' => 'yustiko@demo.com',
                'nik' => '999111999111',
                'religion_id' => 1,
                'address' => 'Surabaya',
                'phone' => '08781223344',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // [
            //     'user_id' => 1,
            //     'guardian_id' => NULL,
            //     'username' => 'rangga_pvg',
            //     'password' => '$2y$10$aTRrwJWa3GXVYDPe5SZlq.k5F5AnY0ZMP/ApOrOn76zCHRySDgsle',
            //     'name' => 'Rangga Hermawan',
            //     'picture' => NULL,
            //     'school_origin' => 'SMK Negeri 1 Surabaya',
            //     'graduation_year' => NULL,
            //     'birth_date' => '1999-09-02',
            //     'birth_place' => 'surabaya',
            //     'email' => 'rangga@demo.com',
            //     'nik' => '999111999112',
            //     'religion_id' => 1,
            //     'address' => 'Surabaya',
            //     'phone' => '08781223343',
            //     'created_at' => Carbon::now(),
            //     'updated_at' => Carbon::now(),
            // ],
        ];

        Student::insert($data);
    }
}
