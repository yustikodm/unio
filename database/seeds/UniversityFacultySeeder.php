<?php

use App\Models\UniversityFaculties;
use Illuminate\Database\Seeder;

class UniversityFacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faculties = [
            [
                'name' => 'Fakultas Ekonomi dan Bisnis. Manajemen. Akuntansi.',
                'description' => 'Fakultas Ekonomi dan Bisnis. Manajemen. Akuntansi.'
            ],
            [
                'name' => 'Fakultas Farmasi. Farmasi.',
                'description' => 'Fakultas Farmasi. Farmasi.'
            ],
            [
                'name' => 'Fakultas Hukum. Ilmu Hukum.',
                'description' => 'Fakultas Hukum. Ilmu Hukum.'
            ],
            [
                'name' => 'Fakultas Ilmu Administrasi. Ilmu Administrasi.',
                'description' => 'Fakultas Ilmu Administrasi. Ilmu Administrasi.'
            ],
            [
                'name' => 'Fakultas Ilmu Keperawatan. Ilmu Keperawatan.',
                'description' => 'Fakultas Ilmu Keperawatan. Ilmu Keperawatan.'
            ],
            [
                'name' => 'Fakultas Ilmu Komputer. Sistem Informasi.',
                'description' => 'Fakultas Ilmu Komputer. Sistem Informasi.'
            ],
            [
                'name' => 'Fakultas Kedokteran. Gizi.',
                'description' => 'Fakultas Kedokteran. Gizi.'
            ],
            [
                'name' => 'Fakultas Kedokteran Gigi. Pendidikan Dokter Gigi.',
                'description' => 'Fakultas Kedokteran Gigi. Pendidikan Dokter Gigi.'
            ],
        ];

        foreach ($countries as $country) {
            UniversityFaculties::create(array_merge($country, [
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]));
        };
    }
}
