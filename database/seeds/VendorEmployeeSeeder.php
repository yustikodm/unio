<?php

use App\Models\VendorEmployee;
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
                'address' => 'Jl. Raden No. 723, Jakarta',
                'description' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'vendor_id' => 1,
                'name' => 'Adhiarja Hardiansyah',
                'birthdate' => '1987-10-13',
                'position' => 'Operations Manager',
                'phone' => '(+62) 818 505 9032',
                'email' => 'adhiarja.hardiansyah@gmail.com',
                'address' => 'Jl. Bakaru No. 34, Jakarta',
                'description' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'vendor_id' => 2,
                'name' => 'Gamanto Nugroho',
                'birthdate' => '1981-12-03',
                'position' => 'Office manager',
                'phone' => '(+62) 823 948 0538',
                'email' => 'gamanto.nugroho@gmail.com',
                'address' => 'Jl. Parepare No. 93, Jakarta',
                'description' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'vendor_id' => 2,
                'name' => 'Aris Gunawan',
                'birthdate' => '1990-11-30',
                'position' => 'Office Staff',
                'phone' => '(+62) 873 0485 1745',
                'email' => 'aris.gunawan@gmail.com',
                'address' => 'Jl. Setiabudhi No. 38 Jakarta',
                'description' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'vendor_id' => 2,
                'name' => 'Rini Laksita',
                'birthdate' => '1986-05-07',
                'position' => 'Receptionist',
                'phone' => '(+62) 853 2384 3957',
                'email' => 'rini.laksita@gmail.com',
                'address' => 'Jl. Surapati No. 172 Jakarta',
                'description' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'vendor_id' => 2,
                'name' => 'Ella Pratiwi',
                'birthdate' => '1989-08-21',
                'position' => 'Receptionist',
                'phone' => '(+62) 813 5385 7593',
                'email' => 'ella.pratiwi@gmail.com',
                'address' => 'Jl. Sudirman No. 45 Jakarta',
                'description' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ];

        foreach($employees as $employee){
            VendorEmployee::create(array_merge($employee, [
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]));
        }
    }
}
