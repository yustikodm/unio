<?php

use App\Models\VendorService;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class VendorServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            [
                'vendor_id' => 1,
                'name' => 'Super Intensif',
                'description' => 'Maksimal 25 siswa/kelas, program dilaksanakan untuk persiapan UTBK-SBMPTN. Belajar fokus materi UTBK-SBMPTN, sehingga keberhasilan siswa lebih terjamin.',
                'level' => 'SMA/SMK',
                'price' => 14700000
            ],
            [
                'vendor_id' => 1,
                'name' => 'Excutive Silver',
                'description' => 'Maksimal 20 siswa/kelas, jaminan masuk PTN Favorit, kelas eksklusif, jumlah pertemuan lebih banyak. Mengikuti Kurikulum di Sekolah & Kurikulum GO untuk penguasaan Materi UTBK/Ujian Mandiri.',
                'level' => 'SMA/SMK',
                'price' => 9500000
            ],
            [
                'vendor_id' => 1,
                'name' => 'Reguler',
                'description' => 'Maksimal 25 siswa/kelas. Mengikuti Kurikulum di Sekolah & Kurikulum GO untuk penguasaan Materi UTBK/Ujian Mandiri.',
                'level' => 'SMA/SMK',
                'price' => 7000000
            ],
            [
                'vendor_id' => 2,
                'name' => 'Peningkatan prestasi akademik di sekolah',
                'description' => null,
                'level' => 'SMA/SMK',
                'price' => 1000000
            ],
            [
                'vendor_id' => 2,
                'name' => 'Sukses Ujian Nasional',
                'description' => null,
                'level' => 'SMA/SMK',
                'price' => 2500000
            ],
            [
                'vendor_id' => 2,
                'name' => 'Sukses Masuk PTN / PTS / Sekolah kedinasan favorit',
                'description' => null,
                'level' => 'SMA/SMK',
                'price' => 5000000
            ],
            [
                'vendor_id' => 3,
                'name' => 'Kursus Android Programming',
                'description' => 'Belajar Android Programming dengan menguasai XML, JAVA dan API Native.',
                'level' => 'Umum',
                'price' => 7000000
            ],
            [
                'vendor_id' => 3,
                'name' => 'Sales Communications Skills',
                'description' => 'Pelatihan ini para peserta akan memahami strategi berkomunikasi secara efektif',
                'level' => 'Umum',
                'price' => 1925000
            ],
            [
                'vendor_id' => 3,
                'name' => 'Advanced Warehouse Management',
                'description' => 'Keterampilan mengelola gudang diperlukan supaya fungsi gudang bisa lebih ditingkatkan',
                'level' => 'Umum',
                'price' => 2000000
            ],
        ];

        foreach($services as $service){
            VendorService::create(array_merge($service, [
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]));
        }
    }
}
