<?php

use App\Models\District;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {      
      $districts = [
          ['state_id' => '1', 'name' => 'Simeulue Kab.'],
          ['state_id' => '1', 'name' => 'Aceh Singkil Kab.'],
          ['state_id' => '1', 'name' => 'Aceh Selatan Kab.'],
          ['state_id' => '1', 'name' => 'Aceh Tenggara Kab.'],
          ['state_id' => '1', 'name' => 'Aceh Timur Kab.'],
          ['state_id' => '1', 'name' => 'Aceh Tengah Kab.'],
          ['state_id' => '1', 'name' => 'Aceh Barat Kab.'],
          ['state_id' => '1', 'name' => 'Aceh Besar Kab.'],
          ['state_id' => '1', 'name' => 'Pidie Kab.'],
          ['state_id' => '1', 'name' => 'Bireuen Kab.'],
          ['state_id' => '1', 'name' => 'Aceh Utara Kab.'],
          ['state_id' => '1', 'name' => 'Aceh Barat Daya Kab.'],
          ['state_id' => '1', 'name' => 'Gayo Lues Kab.'],
          ['state_id' => '1', 'name' => 'Aceh Tamiang Kab.'],
          ['state_id' => '1', 'name' => 'Nagan Raya Kab.'],
          ['state_id' => '1', 'name' => 'Aceh Jaya Kab.'],
          ['state_id' => '1', 'name' => 'Bener Meriah Kab.'],
          ['state_id' => '1', 'name' => 'Pidie Jaya Kab.'],
          ['state_id' => '1', 'name' => 'Banda Aceh Kota'],
          ['state_id' => '1', 'name' => 'Sabang Kota'],
          ['state_id' => '1', 'name' => 'Langsa Kota'],
          ['state_id' => '1', 'name' => 'Lhokseumawe Kota'],
          ['state_id' => '1', 'name' => 'Subulussalam Kota'],
          ['state_id' => '2', 'name' => 'Nias Kab.'],
          ['state_id' => '2', 'name' => 'Mandailing Natal Kab.'],
          ['state_id' => '2', 'name' => 'Tapanuli Selatan Kab.'],
          ['state_id' => '2', 'name' => 'Tapanuli Tengah Kab.'],
          ['state_id' => '2', 'name' => 'Tapanuli Utara Kab.'],
          ['state_id' => '2', 'name' => 'Toba Samosir Kab.'],
          ['state_id' => '2', 'name' => 'Labuhan Batu Kab.'],
          ['state_id' => '2', 'name' => 'Asahan Kab.'],
          ['state_id' => '2', 'name' => 'Simalungun Kab.'],
          ['state_id' => '2', 'name' => 'Dairi Kab.'],
          ['state_id' => '2', 'name' => 'Karo Kab.'],
          ['state_id' => '2', 'name' => 'Deli Serdang Kab.'],
          ['state_id' => '2', 'name' => 'Langkat Kab.'],
          ['state_id' => '2', 'name' => 'Nias Selatan Kab.'],
          ['state_id' => '2', 'name' => 'Humbang Hasundutan Kab.'],
          ['state_id' => '2', 'name' => 'Pakpak Bharat Kab.'],
          ['state_id' => '2', 'name' => 'Samosir Kab.'],
          ['state_id' => '2', 'name' => 'Serdang Bedagai Kab.'],
          ['state_id' => '2', 'name' => 'Batu Bara Kab.'],
          ['state_id' => '2', 'name' => 'Padang Lawas Utara Kab.'],
          ['state_id' => '2', 'name' => 'Padang Lawas Kab.'],
          ['state_id' => '2', 'name' => 'Labuhan Batu Selatan Kab.'],
          ['state_id' => '2', 'name' => 'Labuhan Batu Utara Kab.'],
          ['state_id' => '2', 'name' => 'Nias Utara Kab.'],
          ['state_id' => '2', 'name' => 'Nias Barat Kab.'],
          ['state_id' => '2', 'name' => 'Sibolga Kota'],
          ['state_id' => '2', 'name' => 'Tanjung Balai Kota'],
          ['state_id' => '2', 'name' => 'Pematang Siantar Kota'],
          ['state_id' => '2', 'name' => 'Tebing Tinggi Kota'],
          ['state_id' => '2', 'name' => 'Medan Kota'],
          ['state_id' => '2', 'name' => 'Binjai Kota'],
          ['state_id' => '2', 'name' => 'Padangsidimpuan Kota'],
          ['state_id' => '2', 'name' => 'Gunungsitoli Kota'],
          ['state_id' => '3', 'name' => 'Kepulauan Mentawai Kab.'],
          ['state_id' => '3', 'name' => 'Pesisir Selatan Kab.'],
          ['state_id' => '3', 'name' => 'Solok Kab.'],
          ['state_id' => '3', 'name' => 'Sijunjung Kab.'],
          ['state_id' => '3', 'name' => 'Tanah Datar Kab.'],
          ['state_id' => '3', 'name' => 'Padang Pariaman Kab.'],
          ['state_id' => '3', 'name' => 'Agam Kab.'],
          ['state_id' => '3', 'name' => 'Lima Puluh Kota Kab.'],
          ['state_id' => '3', 'name' => 'Pasaman Kab.'],
          ['state_id' => '3', 'name' => 'Solok Selatan Kab.'],
          ['state_id' => '3', 'name' => 'Dharmasraya Kab.'],
          ['state_id' => '3', 'name' => 'Pasaman Barat Kab.'],
          ['state_id' => '3', 'name' => 'Padang Kota'],
          ['state_id' => '3', 'name' => 'Solok Kota'],
          ['state_id' => '3', 'name' => 'Sawah Lunto Kota'],
          ['state_id' => '3', 'name' => 'Padang Panjang Kota'],
          ['state_id' => '3', 'name' => 'Bukittinggi Kota'],
          ['state_id' => '3', 'name' => 'Payakumbuh Kota'],
          ['state_id' => '3', 'name' => 'Pariaman Kota'],
          ['state_id' => '4', 'name' => 'Kuantan Singingi Kab.'],
          ['state_id' => '4', 'name' => 'Indragiri Hulu Kab.'],
          ['state_id' => '4', 'name' => 'Indragiri Hilir Kab.'],
          ['state_id' => '4', 'name' => 'Pelalawan Kab.'],
          ['state_id' => '4', 'name' => 'Siak Kab.'],
          ['state_id' => '4', 'name' => 'Kampar Kab.'],
          ['state_id' => '4', 'name' => 'Rokan Hulu Kab.'],
          ['state_id' => '4', 'name' => 'Bengkalis Kab.'],
          ['state_id' => '4', 'name' => 'Rokan Hilir Kab.'],
          ['state_id' => '4', 'name' => 'Kepulauan Meranti Kab.'],
          ['state_id' => '4', 'name' => 'Pekanbaru Kota'],
          ['state_id' => '4', 'name' => 'Dumai Kota'],
          ['state_id' => '5', 'name' => 'Kerinci Kab.'],
          ['state_id' => '5', 'name' => 'Merangin Kab.'],
          ['state_id' => '5', 'name' => 'Sarolangun Kab.'],
          ['state_id' => '5', 'name' => 'Batang Hari Kab.'],
          ['state_id' => '5', 'name' => 'Muaro Jambi Kab.'],
          ['state_id' => '5', 'name' => 'Tanjung Jabung Timur Kab.'],
          ['state_id' => '5', 'name' => 'Tanjung Jabung Barat Kab.'],
          ['state_id' => '5', 'name' => 'Tebo Kab.'],
          ['state_id' => '5', 'name' => 'Bungo Kab.'],
          ['state_id' => '5', 'name' => 'Jambi Kota'],
          ['state_id' => '5', 'name' => 'Sungai Penuh Kota'],
          ['state_id' => '6', 'name' => 'Ogan Komering Ulu Kab.'],
          ['state_id' => '6', 'name' => 'Ogan Komering Ilir Kab.'],
          ['state_id' => '6', 'name' => 'Muara Enim Kab.'],
          ['state_id' => '6', 'name' => 'Lahat Kab.'],
          ['state_id' => '6', 'name' => 'Musi Rawas Kab.'],
          ['state_id' => '6', 'name' => 'Musi Banyuasin Kab.'],
          ['state_id' => '6', 'name' => 'Banyu Asin Kab.'],
          ['state_id' => '6', 'name' => 'Ogan Komering Ulu Selatan Kab.'],
          ['state_id' => '6', 'name' => 'Ogan Komering Ulu Timur Kab.'],
          ['state_id' => '6', 'name' => 'Ogan Ilir Kab.'],
          ['state_id' => '6', 'name' => 'Empat Lawang Kab.'],
          ['state_id' => '6', 'name' => 'Penukal Abab Lematang Ilir Kab.'],
          ['state_id' => '6', 'name' => 'Musi Rawas Utara Kab.'],
          ['state_id' => '6', 'name' => 'Palembang Kota'],
          ['state_id' => '6', 'name' => 'Prabumulih Kota'],
          ['state_id' => '6', 'name' => 'Pagar Alam Kota'],
          ['state_id' => '6', 'name' => 'Lubuklinggau Kota'],
          ['state_id' => '7', 'name' => 'Bengkulu Selatan Kab.'],
          ['state_id' => '7', 'name' => 'Rejang Lebong Kab.'],
          ['state_id' => '7', 'name' => 'Bengkulu Utara Kab.'],
          ['state_id' => '7', 'name' => 'Kaur Kab.'],
          ['state_id' => '7', 'name' => 'Seluma Kab.'],
          ['state_id' => '7', 'name' => 'Mukomuko Kab.'],
          ['state_id' => '7', 'name' => 'Lebong Kab.'],
          ['state_id' => '7', 'name' => 'Kepahiang Kab.'],
          ['state_id' => '7', 'name' => 'Bengkulu Tengah Kab.'],
          ['state_id' => '7', 'name' => 'Bengkulu Kota'],
          ['state_id' => '8', 'name' => 'Lampung Barat Kab.'],
          ['state_id' => '8', 'name' => 'Tanggamus Kab.'],
          ['state_id' => '8', 'name' => 'Lampung Selatan Kab.'],
          ['state_id' => '8', 'name' => 'Lampung Timur Kab.'],
          ['state_id' => '8', 'name' => 'Lampung Tengah Kab.'],
          ['state_id' => '8', 'name' => 'Lampung Utara Kab.'],
          ['state_id' => '8', 'name' => 'Way Kanan Kab.'],
          ['state_id' => '8', 'name' => 'Tulangbawang Kab.'],
          ['state_id' => '8', 'name' => 'Pesawaran Kab.'],
          ['state_id' => '8', 'name' => 'Pringsewu Kab.'],
          ['state_id' => '8', 'name' => 'Mesuji Kab.'],
          ['state_id' => '8', 'name' => 'Tulang Bawang Barat Kab.'],
          ['state_id' => '8', 'name' => 'Pesisir Barat Kab.'],
          ['state_id' => '8', 'name' => 'Bandar Lampung Kota'],
          ['state_id' => '8', 'name' => 'Metro Kota'],
          ['state_id' => '9', 'name' => 'Bangka Kab.'],
          ['state_id' => '9', 'name' => 'Belitung Kab.'],
          ['state_id' => '9', 'name' => 'Bangka Barat Kab.'],
          ['state_id' => '9', 'name' => 'Bangka Tengah Kab.'],
          ['state_id' => '9', 'name' => 'Bangka Selatan Kab.'],
          ['state_id' => '9', 'name' => 'Belitung Timur Kab.'],
          ['state_id' => '9', 'name' => 'Pangkal Pinang Kota'],
          ['state_id' => '10', 'name' => 'Karimun Kab.'],
          ['state_id' => '10', 'name' => 'Bintan Kab.'],
          ['state_id' => '10', 'name' => 'Natuna Kab.'],
          ['state_id' => '10', 'name' => 'Lingga Kab.'],
          ['state_id' => '10', 'name' => 'Kepulauan Anambas Kab.'],
          ['state_id' => '10', 'name' => 'Batam Kota'],
          ['state_id' => '10', 'name' => 'Tanjung Pinang Kota'],
          ['state_id' => '11', 'name' => 'Kepulauan Seribu Kab.'],
          ['state_id' => '11', 'name' => 'Jakarta Selatan Kota'],
          ['state_id' => '11', 'name' => 'Jakarta Timur Kota'],
          ['state_id' => '11', 'name' => 'Jakarta Pusat Kota'],
          ['state_id' => '11', 'name' => 'Jakarta Barat Kota'],
          ['state_id' => '11', 'name' => 'Jakarta Utara Kota'],
          ['state_id' => '12', 'name' => 'Bogor Kab.'],
          ['state_id' => '12', 'name' => 'Sukabumi Kab.'],
          ['state_id' => '12', 'name' => 'Cianjur Kab.'],
          ['state_id' => '12', 'name' => 'Bandung Kab.'],
          ['state_id' => '12', 'name' => 'Garut Kab.'],
          ['state_id' => '12', 'name' => 'Tasikmalaya Kab.'],
          ['state_id' => '12', 'name' => 'Ciamis Kab.'],
          ['state_id' => '12', 'name' => 'Kuningan Kab.'],
          ['state_id' => '12', 'name' => 'Cirebon Kab.'],
          ['state_id' => '12', 'name' => 'Majalengka Kab.'],
          ['state_id' => '12', 'name' => 'Sumedang Kab.'],
          ['state_id' => '12', 'name' => 'Indramayu Kab.'],
          ['state_id' => '12', 'name' => 'Subang Kab.'],
          ['state_id' => '12', 'name' => 'Purwakarta Kab.'],
          ['state_id' => '12', 'name' => 'Karawang Kab.'],
          ['state_id' => '12', 'name' => 'Bekasi Kab.'],
          ['state_id' => '12', 'name' => 'Bandung Barat Kab.'],
          ['state_id' => '12', 'name' => 'Pangandaran Kab.'],
          ['state_id' => '12', 'name' => 'Bogor Kota'],
          ['state_id' => '12', 'name' => 'Sukabumi Kota'],
          ['state_id' => '12', 'name' => 'Bandung Kota'],
          ['state_id' => '12', 'name' => 'Cirebon Kota'],
          ['state_id' => '12', 'name' => 'Bekasi Kota'],
          ['state_id' => '12', 'name' => 'Depok Kota'],
          ['state_id' => '12', 'name' => 'Cimahi Kota'],
          ['state_id' => '12', 'name' => 'Tasikmalaya Kota'],
          ['state_id' => '12', 'name' => 'Banjar Kota'],
          ['state_id' => '13', 'name' => 'Cilacap Kab.'],
          ['state_id' => '13', 'name' => 'Banyumas Kab.'],
          ['state_id' => '13', 'name' => 'Purbalingga Kab.'],
          ['state_id' => '13', 'name' => 'Banjarnegara Kab.'],
          ['state_id' => '13', 'name' => 'Kebumen Kab.'],
          ['state_id' => '13', 'name' => 'Purworejo Kab.'],
          ['state_id' => '13', 'name' => 'Wonosobo Kab.'],
          ['state_id' => '13', 'name' => 'Magelang Kab.'],
          ['state_id' => '13', 'name' => 'Boyolali Kab.'],
          ['state_id' => '13', 'name' => 'Klaten Kab.'],
          ['state_id' => '13', 'name' => 'Sukoharjo Kab.'],
          ['state_id' => '13', 'name' => 'Wonogiri Kab.'],
          ['state_id' => '13', 'name' => 'Karanganyar Kab.'],
          ['state_id' => '13', 'name' => 'Sragen Kab.'],
          ['state_id' => '13', 'name' => 'Grobogan Kab.'],
          ['state_id' => '13', 'name' => 'Blora Kab.'],
          ['state_id' => '13', 'name' => 'Rembang Kab.'],
          ['state_id' => '13', 'name' => 'Pati Kab.'],
          ['state_id' => '13', 'name' => 'Kudus Kab.'],
          ['state_id' => '13', 'name' => 'Jepara Kab.'],
          ['state_id' => '13', 'name' => 'Demak Kab.'],
          ['state_id' => '13', 'name' => 'Semarang Kab.'],
          ['state_id' => '13', 'name' => 'Temanggung Kab.'],
          ['state_id' => '13', 'name' => 'Kendal Kab.'],
          ['state_id' => '13', 'name' => 'Batang Kab.'],
          ['state_id' => '13', 'name' => 'Pekalongan Kab.'],
          ['state_id' => '13', 'name' => 'Pemalang Kab.'],
          ['state_id' => '13', 'name' => 'Tegal Kab.'],
          ['state_id' => '13', 'name' => 'Brebes Kab.'],
          ['state_id' => '13', 'name' => 'Magelang Kota'],
          ['state_id' => '13', 'name' => 'Surakarta Kota'],
          ['state_id' => '13', 'name' => 'Salatiga Kota'],
          ['state_id' => '13', 'name' => 'Semarang Kota'],
          ['state_id' => '13', 'name' => 'Pekalongan Kota'],
          ['state_id' => '13', 'name' => 'Tegal Kota'],
          ['state_id' => '14', 'name' => 'Kulon Progo Kab.'],
          ['state_id' => '14', 'name' => 'Bantul Kab.'],
          ['state_id' => '14', 'name' => 'Gunung Kidul Kab.'],
          ['state_id' => '14', 'name' => 'Sleman Kab.'],
          ['state_id' => '14', 'name' => 'Yogyakarta Kota'],
          ['state_id' => '15', 'name' => 'Pacitan Kab.'],
          ['state_id' => '15', 'name' => 'Ponorogo Kab.'],
          ['state_id' => '15', 'name' => 'Trenggalek Kab.'],
          ['state_id' => '15', 'name' => 'Tulungagung Kab.'],
          ['state_id' => '15', 'name' => 'Blitar Kab.'],
          ['state_id' => '15', 'name' => 'Kediri Kab.'],
          ['state_id' => '15', 'name' => 'Malang Kab.'],
          ['state_id' => '15', 'name' => 'Lumajang Kab.'],
          ['state_id' => '15', 'name' => 'Jember Kab.'],
          ['state_id' => '15', 'name' => 'Banyuwangi Kab.'],
          ['state_id' => '15', 'name' => 'Bondowoso Kab.'],
          ['state_id' => '15', 'name' => 'Situbondo Kab.'],
          ['state_id' => '15', 'name' => 'Probolinggo Kab.'],
          ['state_id' => '15', 'name' => 'Pasuruan Kab.'],
          ['state_id' => '15', 'name' => 'Sidoarjo Kab.'],
          ['state_id' => '15', 'name' => 'Mojokerto Kab.'],
          ['state_id' => '15', 'name' => 'Jombang Kab.'],
          ['state_id' => '15', 'name' => 'Nganjuk Kab.'],
          ['state_id' => '15', 'name' => 'Madiun Kab.'],
          ['state_id' => '15', 'name' => 'Magetan Kab.'],
          ['state_id' => '15', 'name' => 'Ngawi Kab.'],
          ['state_id' => '15', 'name' => 'Bojonegoro Kab.'],
          ['state_id' => '15', 'name' => 'Tuban Kab.'],
          ['state_id' => '15', 'name' => 'Lamongan Kab.'],
          ['state_id' => '15', 'name' => 'Gresik Kab.'],
          ['state_id' => '15', 'name' => 'Bangkalan Kab.'],
          ['state_id' => '15', 'name' => 'Sampang Kab.'],
          ['state_id' => '15', 'name' => 'Pamekasan Kab.'],
          ['state_id' => '15', 'name' => 'Sumenep Kab.'],
          ['state_id' => '15', 'name' => 'Kediri Kota'],
          ['state_id' => '15', 'name' => 'Blitar Kota'],
          ['state_id' => '15', 'name' => 'Malang Kota'],
          ['state_id' => '15', 'name' => 'Probolinggo Kota'],
          ['state_id' => '15', 'name' => 'Pasuruan Kota'],
          ['state_id' => '15', 'name' => 'Mojokerto Kota'],
          ['state_id' => '15', 'name' => 'Madiun Kota'],
          ['state_id' => '15', 'name' => 'Surabaya Kota'],
          ['state_id' => '15', 'name' => 'Batu Kota'],
          ['state_id' => '16', 'name' => 'Pandeglang Kab.'],
          ['state_id' => '16', 'name' => 'Lebak Kab.'],
          ['state_id' => '16', 'name' => 'Tangerang Kab.'],
          ['state_id' => '16', 'name' => 'Serang Kab.'],
          ['state_id' => '16', 'name' => 'Tangerang Kota'],
          ['state_id' => '16', 'name' => 'Cilegon Kota'],
          ['state_id' => '16', 'name' => 'Serang Kota'],
          ['state_id' => '16', 'name' => 'Tangerang Selatan Kota'],
          ['state_id' => '17', 'name' => 'Jembrana Kab.'],
          ['state_id' => '17', 'name' => 'Tabanan Kab.'],
          ['state_id' => '17', 'name' => 'Badung Kab.'],
          ['state_id' => '17', 'name' => 'Gianyar Kab.'],
          ['state_id' => '17', 'name' => 'Klungkung Kab.'],
          ['state_id' => '17', 'name' => 'Bangli Kab.'],
          ['state_id' => '17', 'name' => 'Karang Asem Kab.'],
          ['state_id' => '17', 'name' => 'Buleleng Kab.'],
          ['state_id' => '17', 'name' => 'Denpasar Kota'],
          ['state_id' => '18', 'name' => 'Lombok Barat Kab.'],
          ['state_id' => '18', 'name' => 'Lombok Tengah Kab.'],
          ['state_id' => '18', 'name' => 'Lombok Timur Kab.'],
          ['state_id' => '18', 'name' => 'Sumbawa Kab.'],
          ['state_id' => '18', 'name' => 'Dompu Kab.'],
          ['state_id' => '18', 'name' => 'Bima Kab.'],
          ['state_id' => '18', 'name' => 'Sumbawa Barat Kab.'],
          ['state_id' => '18', 'name' => 'Lombok Utara Kab.'],
          ['state_id' => '18', 'name' => 'Mataram Kota'],
          ['state_id' => '18', 'name' => 'Bima Kota'],
          ['state_id' => '19', 'name' => 'Sumba Barat Kab.'],
          ['state_id' => '19', 'name' => 'Sumba Timur Kab.'],
          ['state_id' => '19', 'name' => 'Kupang Kab.'],
          ['state_id' => '19', 'name' => 'Timor Tengah Selatan Kab.'],
          ['state_id' => '19', 'name' => 'Timor Tengah Utara Kab.'],
          ['state_id' => '19', 'name' => 'Belu Kab.'],
          ['state_id' => '19', 'name' => 'Alor Kab.'],
          ['state_id' => '19', 'name' => 'Lembata Kab.'],
          ['state_id' => '19', 'name' => 'Flores Timur Kab.'],
          ['state_id' => '19', 'name' => 'Sikka Kab.'],
          ['state_id' => '19', 'name' => 'Ende Kab.'],
          ['state_id' => '19', 'name' => 'Ngada Kab.'],
          ['state_id' => '19', 'name' => 'Manggarai Kab.'],
          ['state_id' => '19', 'name' => 'Rote Ndao Kab.'],
          ['state_id' => '19', 'name' => 'Manggarai Barat Kab.'],
          ['state_id' => '19', 'name' => 'Sumba Tengah Kab.'],
          ['state_id' => '19', 'name' => 'Sumba Barat Daya Kab.'],
          ['state_id' => '19', 'name' => 'Nagekeo Kab.'],
          ['state_id' => '19', 'name' => 'Manggarai Timur Kab.'],
          ['state_id' => '19', 'name' => 'Sabu Raijua Kab.'],
          ['state_id' => '19', 'name' => 'Malaka Kab.'],
          ['state_id' => '19', 'name' => 'Kupang Kota'],
          ['state_id' => '20', 'name' => 'Sambas Kab.'],
          ['state_id' => '20', 'name' => 'Bengkayang Kab.'],
          ['state_id' => '20', 'name' => 'Landak Kab.'],
          ['state_id' => '20', 'name' => 'Mempawah Kab.'],
          ['state_id' => '20', 'name' => 'Sanggau Kab.'],
          ['state_id' => '20', 'name' => 'Ketapang Kab.'],
          ['state_id' => '20', 'name' => 'Sintang Kab.'],
          ['state_id' => '20', 'name' => 'Kapuas Hulu Kab.'],
          ['state_id' => '20', 'name' => 'Sekadau Kab.'],
          ['state_id' => '20', 'name' => 'Melawi Kab.'],
          ['state_id' => '20', 'name' => 'Kayong Utara Kab.'],
          ['state_id' => '20', 'name' => 'Kubu Raya Kab.'],
          ['state_id' => '20', 'name' => 'Pontianak Kota'],
          ['state_id' => '20', 'name' => 'Singkawang Kota'],
          ['state_id' => '21', 'name' => 'Waringin Barat Kab. Kota'],
          ['state_id' => '21', 'name' => 'Waringin Timur Kab. Kota'],
          ['state_id' => '21', 'name' => 'Kapuas Kab.'],
          ['state_id' => '21', 'name' => 'Barito Selatan Kab.'],
          ['state_id' => '21', 'name' => 'Barito Utara Kab.'],
          ['state_id' => '21', 'name' => 'Sukamara Kab.'],
          ['state_id' => '21', 'name' => 'Lamandau Kab.'],
          ['state_id' => '21', 'name' => 'Seruyan Kab.'],
          ['state_id' => '21', 'name' => 'Katingan Kab.'],
          ['state_id' => '21', 'name' => 'Pulang Pisau Kab.'],
          ['state_id' => '21', 'name' => 'Gunung Mas Kab.'],
          ['state_id' => '21', 'name' => 'Barito Timur Kab.'],
          ['state_id' => '21', 'name' => 'Murung Raya Kab.'],
          ['state_id' => '21', 'name' => 'Palangka Raya Kota'],
          ['state_id' => '22', 'name' => 'Tanah Laut Kab.'],
          ['state_id' => '22', 'name' => 'Kota Baru Kab.'],
          ['state_id' => '22', 'name' => 'Banjar Kab.'],
          ['state_id' => '22', 'name' => 'Barito Kuala Kab.'],
          ['state_id' => '22', 'name' => 'Tapin Kab.'],
          ['state_id' => '22', 'name' => 'Hulu Sungai Selatan Kab.'],
          ['state_id' => '22', 'name' => 'Hulu Sungai Tengah Kab.'],
          ['state_id' => '22', 'name' => 'Hulu Sungai Utara Kab.'],
          ['state_id' => '22', 'name' => 'Tabalong Kab.'],
          ['state_id' => '22', 'name' => 'Tanah Bumbu Kab.'],
          ['state_id' => '22', 'name' => 'Balangan Kab.'],
          ['state_id' => '22', 'name' => 'Banjarmasin Kota'],
          ['state_id' => '22', 'name' => 'Banjar Baru Kota'],
          ['state_id' => '23', 'name' => 'Paser Kab.'],
          ['state_id' => '23', 'name' => 'Kutai Barat Kab.'],
          ['state_id' => '23', 'name' => 'Kutai Kartanegara Kab.'],
          ['state_id' => '23', 'name' => 'Kutai Timur Kab.'],
          ['state_id' => '23', 'name' => 'Berau Kab.'],
          ['state_id' => '23', 'name' => 'Penajam Paser Utara Kab.'],
          ['state_id' => '23', 'name' => 'Mahakam Hulu Kab.'],
          ['state_id' => '23', 'name' => 'Balikpapan Kota'],
          ['state_id' => '23', 'name' => 'Samarinda Kota'],
          ['state_id' => '23', 'name' => 'Bontang Kota'],
          ['state_id' => '24', 'name' => 'Malinau Kab.'],
          ['state_id' => '24', 'name' => 'Bulungan Kab.'],
          ['state_id' => '24', 'name' => 'Tana Tidung Kab.'],
          ['state_id' => '24', 'name' => 'Nunukan Kab.'],
          ['state_id' => '24', 'name' => 'Tarakan Kota'],
          ['state_id' => '25', 'name' => 'Bolaang Mongondow Kab.'],
          ['state_id' => '25', 'name' => 'Minahasa Kab.'],
          ['state_id' => '25', 'name' => 'Kepulauan Sangihe Kab.'],
          ['state_id' => '25', 'name' => 'Kepulauan Talaud Kab.'],
          ['state_id' => '25', 'name' => 'Minahasa Selatan Kab.'],
          ['state_id' => '25', 'name' => 'Minahasa Utara Kab.'],
          ['state_id' => '25', 'name' => 'Bolaang Mongondow Utara Kab.'],
          ['state_id' => '25', 'name' => 'Siau Tagulandang Biaro Kab.'],
          ['state_id' => '25', 'name' => 'Minahasa Tenggara Kab.'],
          ['state_id' => '25', 'name' => 'Bolaang Mongondow Selatan Kab.'],
          ['state_id' => '25', 'name' => 'Bolaang Mongondow Timur Kab.'],
          ['state_id' => '25', 'name' => 'Manado Kota'],
          ['state_id' => '25', 'name' => 'Bitung Kota'],
          ['state_id' => '25', 'name' => 'Tomohon Kota'],
          ['state_id' => '25', 'name' => 'Kotamobagu Kota'],
          ['state_id' => '26', 'name' => 'Banggai Kepulauan Kab.'],
          ['state_id' => '26', 'name' => 'Banggai Kab.'],
          ['state_id' => '26', 'name' => 'Morowali Kab.'],
          ['state_id' => '26', 'name' => 'Poso Kab.'],
          ['state_id' => '26', 'name' => 'Donggala Kab.'],
          ['state_id' => '26', 'name' => 'Toli-Toli Kab.'],
          ['state_id' => '26', 'name' => 'Buol Kab.'],
          ['state_id' => '26', 'name' => 'Parigi Moutong Kab.'],
          ['state_id' => '26', 'name' => 'Tojo Una-Una Kab.'],
          ['state_id' => '26', 'name' => 'Sigi Kab.'],
          ['state_id' => '26', 'name' => 'Banggai Laut Kab.'],
          ['state_id' => '26', 'name' => 'Morowali Utara Kab.'],
          ['state_id' => '26', 'name' => 'Palu Kota'],
          ['state_id' => '27', 'name' => 'Kepulauan Selayar Kab.'],
          ['state_id' => '27', 'name' => 'Bulukumba Kab.'],
          ['state_id' => '27', 'name' => 'Bantaeng Kab.'],
          ['state_id' => '27', 'name' => 'Jeneponto Kab.'],
          ['state_id' => '27', 'name' => 'Takalar Kab.'],
          ['state_id' => '27', 'name' => 'Gowa Kab.'],
          ['state_id' => '27', 'name' => 'Sinjai Kab.'],
          ['state_id' => '27', 'name' => 'Maros Kab.'],
          ['state_id' => '27', 'name' => 'Pangkajene Dan Kepulauan Kab.'],
          ['state_id' => '27', 'name' => 'Barru Kab.'],
          ['state_id' => '27', 'name' => 'Bone Kab.'],
          ['state_id' => '27', 'name' => 'Soppeng Kab.'],
          ['state_id' => '27', 'name' => 'Wajo Kab.'],
          ['state_id' => '27', 'name' => 'Sidenreng Rappang Kab.'],
          ['state_id' => '27', 'name' => 'Pinrang Kab.'],
          ['state_id' => '27', 'name' => 'Enrekang Kab.'],
          ['state_id' => '27', 'name' => 'Luwu Kab.'],
          ['state_id' => '27', 'name' => 'Tana Toraja Kab.'],
          ['state_id' => '27', 'name' => 'Luwu Utara Kab.'],
          ['state_id' => '27', 'name' => 'Luwu Timur Kab.'],
          ['state_id' => '27', 'name' => 'Toraja Utara Kab.'],
          ['state_id' => '27', 'name' => 'Makassar Kota'],
          ['state_id' => '27', 'name' => 'Parepare Kota'],
          ['state_id' => '27', 'name' => 'Palopo Kota'],
          ['state_id' => '28', 'name' => 'Buton Kab.'],
          ['state_id' => '28', 'name' => 'Muna Kab.'],
          ['state_id' => '28', 'name' => 'Konawe Kab.'],
          ['state_id' => '28', 'name' => 'Kolaka Kab.'],
          ['state_id' => '28', 'name' => 'Konawe Selatan Kab.'],
          ['state_id' => '28', 'name' => 'Bombana Kab.'],
          ['state_id' => '28', 'name' => 'Wakatobi Kab.'],
          ['state_id' => '28', 'name' => 'Kolaka Utara Kab.'],
          ['state_id' => '28', 'name' => 'Buton Utara Kab.'],
          ['state_id' => '28', 'name' => 'Konawe Utara Kab.'],
          ['state_id' => '28', 'name' => 'Kolaka Timur Kab.'],
          ['state_id' => '28', 'name' => 'Konawe Kepulauan Kab.'],
          ['state_id' => '28', 'name' => 'Muna Barat Kab.'],
          ['state_id' => '28', 'name' => 'Buton Tengah Kab.'],
          ['state_id' => '28', 'name' => 'Buton Selatan Kab.'],
          ['state_id' => '28', 'name' => 'Kendari Kota'],
          ['state_id' => '28', 'name' => 'Baubau Kota'],
          ['state_id' => '29', 'name' => 'Boalemo Kab.'],
          ['state_id' => '29', 'name' => 'Gorontalo Kab.'],
          ['state_id' => '29', 'name' => 'Pohuwato Kab.'],
          ['state_id' => '29', 'name' => 'Bone Bolango Kab.'],
          ['state_id' => '29', 'name' => 'Gorontalo Utara Kab.'],
          ['state_id' => '29', 'name' => 'Gorontalo Kota'],
          ['state_id' => '30', 'name' => 'Majene Kab.'],
          ['state_id' => '30', 'name' => 'Polewali Mandar Kab.'],
          ['state_id' => '30', 'name' => 'Mamasa Kab.'],
          ['state_id' => '30', 'name' => 'Mamuju Kab.'],
          ['state_id' => '30', 'name' => 'Mamuju Utara Kab.'],
          ['state_id' => '30', 'name' => 'Mamuju Tengah Kab.'],
          ['state_id' => '31', 'name' => 'Maluku Tenggara Barat Kab.'],
          ['state_id' => '31', 'name' => 'Maluku Tenggara Kab.'],
          ['state_id' => '31', 'name' => 'Maluku Tengah Kab.'],
          ['state_id' => '31', 'name' => 'Buru Kab.'],
          ['state_id' => '31', 'name' => 'Kepulauan Aru Kab.'],
          ['state_id' => '31', 'name' => 'Seram Bagian Barat Kab.'],
          ['state_id' => '31', 'name' => 'Seram Bagian Timur Kab.'],
          ['state_id' => '31', 'name' => 'Maluku Barat Daya Kab.'],
          ['state_id' => '31', 'name' => 'Buru Selatan Kab.'],
          ['state_id' => '31', 'name' => 'Ambon Kota'],
          ['state_id' => '31', 'name' => 'Tual Kota'],
          ['state_id' => '32', 'name' => 'Halmahera Barat Kab.'],
          ['state_id' => '32', 'name' => 'Halmahera Tengah Kab.'],
          ['state_id' => '32', 'name' => 'Kepulauan Sula Kab.'],
          ['state_id' => '32', 'name' => 'Halmahera Selatan Kab.'],
          ['state_id' => '32', 'name' => 'Halmahera Utara Kab.'],
          ['state_id' => '32', 'name' => 'Halmahera Timur Kab.'],
          ['state_id' => '32', 'name' => 'Pulau Morotai Kab.'],
          ['state_id' => '32', 'name' => 'Pulau Taliabu Kab.'],
          ['state_id' => '32', 'name' => 'Ternate Kota'],
          ['state_id' => '32', 'name' => 'Tidore Kepulauan Kota'],
          ['state_id' => '33', 'name' => 'Fakfak Kab.'],
          ['state_id' => '33', 'name' => 'Kaimana Kab.'],
          ['state_id' => '33', 'name' => 'Teluk Wondama Kab.'],
          ['state_id' => '33', 'name' => 'Teluk Bintuni Kab.'],
          ['state_id' => '33', 'name' => 'Manokwari Kab.'],
          ['state_id' => '33', 'name' => 'Sorong Selatan Kab.'],
          ['state_id' => '33', 'name' => 'Sorong Kab.'],
          ['state_id' => '33', 'name' => 'Raja Ampat Kab.'],
          ['state_id' => '33', 'name' => 'Tambrauw Kab.'],
          ['state_id' => '33', 'name' => 'Maybrat Kab.'],
          ['state_id' => '33', 'name' => 'Manokwari Selatan Kab.'],
          ['state_id' => '33', 'name' => 'Pegunungan Arfak Kab.'],
          ['state_id' => '33', 'name' => 'Sorong Kota'],
          ['state_id' => '34', 'name' => 'Merauke Kab.'],
          ['state_id' => '34', 'name' => 'Jayawijaya Kab.'],
          ['state_id' => '34', 'name' => 'Jayapura Kab.'],
          ['state_id' => '34', 'name' => 'Nabire Kab.'],
          ['state_id' => '34', 'name' => 'Kepulauan Yapen Kab.'],
          ['state_id' => '34', 'name' => 'Biak Numfor Kab.'],
          ['state_id' => '34', 'name' => 'Paniai Kab.'],
          ['state_id' => '34', 'name' => 'Puncak Jaya Kab.'],
          ['state_id' => '34', 'name' => 'Mimika Kab.'],
          ['state_id' => '34', 'name' => 'Boven Digoel Kab.'],
          ['state_id' => '34', 'name' => 'Mappi Kab.'],
          ['state_id' => '34', 'name' => 'Asmat Kab.'],
          ['state_id' => '34', 'name' => 'Yahukimo Kab.'],
          ['state_id' => '34', 'name' => 'Pegunungan Bintang Kab.'],
          ['state_id' => '34', 'name' => 'Tolikara Kab.'],
          ['state_id' => '34', 'name' => 'Sarmi Kab.'],
          ['state_id' => '34', 'name' => 'Keerom Kab.'],
          ['state_id' => '34', 'name' => 'Waropen Kab.'],
          ['state_id' => '34', 'name' => 'Supiori Kab.'],
          ['state_id' => '34', 'name' => 'Mamberamo Raya Kab.'],
          ['state_id' => '34', 'name' => 'Nduga Kab.'],
          ['state_id' => '34', 'name' => 'Lanny Jaya Kab.'],
          ['state_id' => '34', 'name' => 'Mamberamo Tengah Kab.'],
          ['state_id' => '34', 'name' => 'Yalimo Kab.'],
          ['state_id' => '34', 'name' => 'Puncak Kab.'],
          ['state_id' => '34', 'name' => 'Dogiyai Kab.'],
          ['state_id' => '34', 'name' => 'Intan Jaya Kab.'],
          ['state_id' => '34', 'name' => 'Deiyai Kab.'],
          ['state_id' => '34', 'name' => 'Jayapura Kota'],
      ];

      foreach ($districts as $district) {
          District::create(array_merge($district, [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
          ]));
      }
  }
}
