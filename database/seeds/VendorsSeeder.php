<?php

use App\Models\Vendor;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class VendorsSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $vendors = [
      [
        'country_id' => 1,
        'state_id' => 12,
        'district_id' => 164,
        'vendor_category_id' => 1,
        'name' => 'Ganesha Operation',
        'description' => 'Bimbel Ganesha Operation merupakan lembaga bimbingan belajar terbaik dan terbesar di Indonesia. Berdiri sejak 2 Mei 1984 di Kota Bandung, saat ini Ganesha Operation telah tersebar di 265 kota di Indonesia, mulai dari Aceh hingga Ambon.',
        'logo' => 'https://ganeshaoperation.com/img/logo5.png',
        'email' => 'bimbel@ganesha-operation.com',
        'bank_account_number' => null,
        'website' => 'https://ganeshaoperation.com/',
        'address' => 'Jln. Purnawarman No. 36B Bandung',
        'phone' => '+62 81806667660'
      ],
      [
        'country_id' => 1,
        'state_id' => 12,
        'district_id' => 3,
        'vendor_category_id' => 1,
        'name' => 'Primagama',
        'description' => 'Primagama adalah usaha jasa pendidikan luar sekolah yang bergerak dibidang bimbingan belajar, didirikan tahun 1982, tepatnya pada tanggal 10 Maret 1982 di Yogyakarta. Program Bimbingan Belajar Primagama memiliki pasar sangat luas (siswa 3,4,5,6 SD – 7,8,9 SMP, dan 10,11,12 SMA IPA/IPS) dengan target pendidikan adalah meningkatkan prestasi akademik di sekolah, Ujian Akhir Sekolah, Ujian Nasional , dan Sukses Ujian Masuk Perguruan Tinggi Negeri/Favorit serta sekolah kedinasan (bagi SMA/SMK).',
        'logo' => 'https://www.primagama.co.id/assets/images/logo.svg',
        'email' => 'info@primagama.co.id',
        'bank_account_number' => null,
        'website' => 'https://www.primagama.co.id/',
        'address' => 'Jl. HOS Cokroaminoto, Ruko Cokro Square Blok I No.124, Yogyakarta (55244), Indonesia.',
        'phone' => '0274 - 619 853'
      ],
      [
        'country_id' => 1,
        'state_id' => 11,
        'district_id' => 3,
        'vendor_category_id' => 2,
        'name' => 'Pintaria',
        'description' => 'Pintaria merupakan portal pendidikan yang menawarkan produk kuliah S1/S2 dengan metode blended learning dan program kursus lainnya. Pintaria bekerjasama dengan kampus-kampus unggulan yang terakreditasi BAN-PT di Indonesia.',
        'logo' => 'https://storage.googleapis.com/cdn-1.pintaria.com/pintaria/homepage-settings/assets/image/logo-pintaria-white.png',
        'email' => 'info@pintaria.com',
        'bank_account_number' => null,
        'website' => 'https://pintaria.com/',
        'address' => 'Komplek Ruko Sentra Arteri Mas. Jl. Sultan Iskandar Muda No. 10L. Kebayoran Lama, Jakarta 12241 – INDONESIA',
        'phone' => '+6281382765493'
      ],
    ];

    foreach ($vendors as $vendor) {
      Vendor::create(array_merge($vendor, [
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()
        ]));
    };
  }
}
