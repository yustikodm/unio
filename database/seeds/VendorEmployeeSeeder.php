<?php

use App\Models\VendorEmployee;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class VendorEmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employees = [
            [
                'vendor_id' => 1,
                'name' => 'Ade Wulandari',
                'birthdate' => '1985-04-20',
                'position' => 'Customer Service',
                'phone' => '(+62) 898 2216 6254',
                'email' => 'adewulandari@gmail.com',
                'address' => 'Jl. Raden No. 723, Jakarta'
            ],
            [
                'vendor_id' => 1,
                'name' => 'Adhiarja Hardiansyah',
                'birthdate' => '1987-10-13',
                'position' => 'Operations Manager',
                'phone' => '(+62) 818 505 9032',
                'email' => 'adhiarja.hardiansyah@gmail.com',
                'address' => 'Jl. Merdeka No. 34, Jakarta'
            ],
            [
                'vendor_id' => 2,
                'name' => 'Gamanto Nugroho',
                'birthdate' => '1981-12-03',
                'position' => 'Office manager',
                'phone' => '(+62) 823 948 0538',
                'email' => 'gamanto.nugroho@gmail.com',
                'address' => 'Jl. Bagas Pati No. 93, Jakarta'
            ],
            [
                'vendor_id' => 2,
                'name' => 'Aris Gunawan',
                'birthdate' => '1990-11-30',
                'position' => 'Office Staff',
                'phone' => '(+62) 873 0485 1745',
                'email' => 'aris.gunawan@gmail.com',
                'address' => 'Jl. Setiabudi No. 38 Jakarta'
            ],
            [
                'vendor_id' => 2,
                'name' => 'Rini Laksita',
                'birthdate' => '1986-05-07',
                'position' => 'Receptionist',
                'phone' => '(+62) 853 2384 3957',
                'email' => 'rini.laksita@gmail.com',
                'address' => 'Jl. Cokroaminoto No. 172 Jakarta'
            ],
            [
                'vendor_id' => 2,
                'name' => 'Ella Pratiwi',
                'birthdate' => '1989-08-21',
                'position' => 'Receptionist',
                'phone' => '(+62) 813 5385 7593',
                'email' => 'ella.pratiwi@gmail.com',
                'address' => 'Jl. Sudirman No. 45 Jakarta'
            ],
            [
                'vendor_id' => 3,
                'name' => 'Sabrina Suryatmi',
                'birthdate' => '1979-12-28',
                'position' => 'Staff',
                'phone' => '(+62) 819 5884 4555',
                'email' => 'sabrina.suryatmi@gmail.com',
                'address' => 'Jl. Sumoharjo No. 94 Jakarta'
            ],
            [
                'vendor_id' => 3,
                'name' => 'Septi Natalia',
                'birthdate' => '1981-05-03',
                'position' => 'Receptionist',
                'phone' => '(+62) 811 4858 6023',
                'email' => 'septi.natalia@gmail.com',
                'address' => 'Jl. Adisucipto No. 66 Jakarta'
            ]
        ];

        foreach($employees as $employee){
            VendorEmployee::create(array_merge($employee, [
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]));
        }
    }
}
