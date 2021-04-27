<?php

use App\Models\UniversityRequirement;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UniversityRequirementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $requirements = [
            [
              'university_id' => 2,
              'major_id' => 1,
              'name' => 'Seleksi Nasional Masuk Perguruan Tinggi (SNMPTN)',
              'value' => '',
              'description' => 'Pada tahun akademik 2021/2022, siswa yang akan mendapatkan ijazah Pendidikan Menengah (SMA/MA/SMK) pada tahun 2021 (tahun ijazah 2021) dan mempunyai prestasi akademik tinggi dapat mengikuti seleksi untuk melanjutkan studi di Institut Teknologi Sepuluh Nopember (ITS) melalui Seleksi Nasional Masuk Perguruan Tinggi (SNMPTN) 2021. SNMPTN merupakan sistem ujian saringan masuk perguruan tinggi negeri yang dilaksanakan secara nasional, oleh Lembaga Tes Masuk Perguruan Tinggi (LTMPT). Ketentuan umum keikutsertaan pada SNMPTN 2021 dapat diperoleh di laman resmi panitia SNMPTN 2021 (http://ltmpt.ac.id).',
            ]
        ];

        foreach($requirements as $req){
            UniversityRequirement::create(array_merge($req, [
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]));
        }
    }
}
