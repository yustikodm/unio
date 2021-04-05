<?php

namespace App\Providers;

use App\Models\Currency;
use App\Models\District;
use App\Models\Guardian;
use App\Models\Questionnaire;
use App\Models\State;
use App\Models\Country;

use App\Models\Barang;
use App\Models\Pelanggan;
use App\Models\Mitra;
use App\Models\Pekerjaan;
use App\Models\Kota;
use App\Models\SatuanBarang;
use App\Models\KategoriBarang;
use App\Models\Student;
use App\Models\SubkategoriBarang;
use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\Supplier;
use App\Models\PurchaseOrder;
use App\Models\DetailPurchaseOrder;
use App\Models\KirimBarang;
use App\Models\TerimaBarang;
use App\Models\ReturBarang;
use App\Models\PenyesuaianStok;
use App\Models\Penjualan;
use App\Models\PenerimaanRetur;
use App\Models\TipeParameter;
use App\Models\TipeBarang;
use App\Models\MetodePembayaran;
use App\Models\Bank;
use App\Models\University;
use App\Models\UniversityFaculties;
use App\Models\UniversityMajor;
use App\Models\Vendor;
use App\Models\VendorCategory;
use App\Models\Voucher;
use App\User;
use App\Models\LevelMitra;
use Spatie\Permission\Models\Role;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

use View;

class ViewServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   *
   * @return void
   */
  public function register()
  {
    //
  }

  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot()
  {
    // Students
    View::composer(['students.fields'], function ($view) {
      $guardianItems = Guardian::pluck('name', 'id')->toArray();
      $view->with('vendorItems', $guardianItems);
    });
    View::composer(['students.fields'], function ($view) {
      $guardianItems = Guardian::pluck('name', 'id')->toArray();
      $view->with('vendorItems', $guardianItems);
    });

    // Vendor Service
    View::composer(['vendor_services.fields'], function ($view) {
      $vendorItems = Vendor::pluck('name', 'id')->toArray();
      $view->with('vendorItems', $vendorItems);
    });

    // Vendor Employee
    View::composer(['vendor_employees.fields'], function ($view) {
      $vendorItems = Vendor::pluck('name', 'id')->toArray();
      $view->with('vendorItems', $vendorItems);
    });



    // Vendor
    View::composer(['vendors.fields'], function ($view) {
      $categoryItems = VendorCategory::pluck('name', 'id')->toArray();
      $view->with('categoryItems', $categoryItems);
    });

    // University Scholarship
    View::composer(['university_scholarships.fields'], function ($view) {
      $universityItems = University::pluck('name', 'id')->toArray();
      $view->with('universityItems', $universityItems);
    });

    // University Scholarship
    View::composer(['university_scholarships.fields'], function ($view) {
      $universityItems = University::pluck('name', 'id')->toArray();
      $view->with('universityItems', $universityItems);
    });

    // University Requirement
    View::composer(['university_requirements.fields'], function ($view) {
      $universityItems = University::pluck('name', 'id')->toArray();
      $view->with('universityItems', $universityItems);
    });
    View::composer(['university_requirements.fields'], function ($view) {
      $majorItems = UniversityMajor::pluck('name', 'id')->toArray();
      $view->with('majorItems', $majorItems);
    });

    // University Majors
    View::composer(['university_majors.fields'], function ($view) {
      $universityItems = University::pluck('name', 'id')->toArray();
      $view->with('universityItems', $universityItems);
    });

    View::composer(['university_majors.fields'], function ($view) {
      $facultyItems = UniversityFaculties::pluck('name', 'id')->toArray();
      $view->with('facultyItems', $facultyItems);
    });

    // University Faculty
    View::composer(['university_faculties.fields'], function ($view) {
      $universityItems = University::pluck('name', 'id')->toArray();
      $view->with('universityItems', $universityItems);
    });

    // University
    View::composer(['universities.fields'], function ($view) {
      $districtItems = District::pluck('name', 'id')->toArray();
      $view->with('districtItems', $districtItems);
    });
    View::composer(['universities.fields'], function ($view) {
      $stateItems = State::pluck('name', 'id')->toArray();
      $view->with('stateItems', $stateItems);
    });
    View::composer(['universities.fields'], function ($view) {
      $countryItems = Country::pluck('name', 'id')->toArray();
      $view->with('countryItems', $countryItems);
    });

    // Currency
    View::composer(['currency.fields'], function ($view) {
      $countryItems = Country::pluck('name', 'id')->toArray();
      $view->with('countryItems', $countryItems);
    });

    // questionnaireAnswer
    View::composer(['questionnaire_answers.fields'], function ($view) {
      $questionnaireItems = Questionnaire::pluck('question', 'id')->toArray();
      $view->with('questionnaireItems', $questionnaireItems);
    });
    View::composer(['questionnaire_answers.fields'], function ($view) {
      $userItems = User::pluck('username', 'id')->toArray();
      $view->with('userItems', $userItems);
    });

    // State
    View::composer(['districts.fields'], function ($view) {
      $districtItems = State::pluck('name', 'id')->toArray();
      $view->with('districtItems', $districtItems);
    });

    // State
    View::composer(['states.fields'], function ($view) {
      $countryItems = Country::pluck('name', 'id')->toArray();
      $view->with('countryItems', $countryItems);
    });

    // Boarding house
    View::composer(['boarding_houses.fields'], function ($view) {
      $currencyItems = Currency::pluck('name', 'id')->toArray();
      $view->with('currencyItems', $currencyItems);
    });
    View::composer(['boarding_houses.fields'], function ($view) {
      $districtItems = District::pluck('name', 'id')->toArray();
      $view->with('districtItems', $districtItems);
    });
    View::composer(['boarding_houses.fields'], function ($view) {
      $stateItems = State::pluck('name', 'id')->toArray();
      $view->with('stateItems', $stateItems);
    });
    View::composer(['boarding_houses.fields'], function ($view) {
      $countryItems = Country::pluck('name', 'id')->toArray();
      $view->with('countryItems', $countryItems);
    });

    // Voucher
    View::composer(['voucher.fields'], function ($view) {
      $jabatan = Jabatan::pluck('nama', 'id')->toArray();
      $view->with('jabatan', $jabatan);
    });

    // Diskon
    View::composer(['diskon.fields'], function ($view) {
      $barangItems = Barang::pluck('nama', 'id')->toArray();
      $view->with('barangItems', $barangItems);
    });

    // Hadiah
    View::composer(['hadiah.fields'], function ($view) {
      $barangItems = Barang::where('tipe', 'Hadiah')->pluck('nama', 'id')->toArray();
      $view->with('barangItems', $barangItems);
    });

    // Penerimaan Retur
    View::composer(['penerimaan_retur.fields'], function ($view) {
      $supplierItems = Supplier::pluck('nama', 'id')->toArray();
      $view->with('supplierItems', $supplierItems);
    });
    View::composer(['penerimaan_retur.fields'], function ($view) {
      $pegawaiItems = Pegawai::pluck('nama', 'id')->toArray();
      $view->with('pegawaiItems', $pegawaiItems);
    });
    View::composer(['penerimaan_retur.fields'], function ($view) {
      $dataExist = PenerimaanRetur::pluck('retur_barang_id')->toArray();
      $retur_barangItems = ReturBarang::where("status", "Diretur")->whereNotIn('retur_barang.id', $dataExist)->pluck('kode', 'id')->toArray();
      $view->with('retur_barangItems', $retur_barangItems);
    });

    // Penjualan
    View::composer(['penjualan.create'], function ($view) {
      $dataExist = Mitra::pluck('pelanggan_id')->toArray();
      $data = Pelanggan::select('pelanggan.*')
        ->whereNotIn('pelanggan.id', $dataExist)
        ->pluck('nama', 'id')->toArray();
      $view->with('pelangganItems', $data);
    });

    View::composer(['penjualan.create'], function ($view) {
      $barangItems = Barang::leftJoin('stok', 'barang.id', '=', 'stok.barang_id')
        ->join('harga', 'barang.id', '=', 'harga.barang_id')
        ->join('diskon', 'barang.id', '=', 'diskon.barang_id')
        // ->where('harga.harga', '!=', '0')
        ->where('barang.tipe', '!=', 'Hadiah')
        ->select(DB::raw("CONCAT(barang.nama,' - (' , barang.tipe, ')' ) AS nama"), 'barang.id')->pluck('nama', 'id')->toArray();

      $view->with('barangItems', $barangItems);
    });

    View::composer(['penjualan.create'], function ($view) {
      $pegawaiItems = Pegawai::pluck('nama', 'id')->toArray();
      $view->with('pegawaiItems', $pegawaiItems);
    });

    View::composer(['penjualan.create'], function ($view) {
      $mitraItems = Mitra::leftJoin('pelanggan', 'mitra.pelanggan_id', '=', 'pelanggan.id')
        ->select('mitra.*', 'pelanggan.nama')->pluck('nama', 'id')->toArray();

      $view->with('mitraItems', $mitraItems);
    });

    View::composer(['penjualan.pembayaran'], function ($view) {
      $metodePembayaranItems = MetodePembayaran::pluck('nama', 'id')->toArray();
      $view->with('metodePembayaranItems', $metodePembayaranItems);
    });

    View::composer(['penjualan.pembayaran'], function ($view) {
      $bankItems = Bank::pluck('nama', 'id')->toArray();
      $view->with('bankItems', $bankItems);
    });

    View::composer(['penjualan.create'], function ($view) {
      $date = date('Y-m-d') . " 00:00:00";
      $voucherItems = Voucher::where('kadaluarsa', '>=', $date)->pluck('kode', 'id')->toArray();
      $view->with('voucherItems', $voucherItems);
    });

    // Pelanggan
    View::composer(['pelanggan.fields'], function ($view) {
      $pekerjaanItems = Pekerjaan::pluck('nama', 'id')->toArray();
      $view->with('pekerjaanItems', $pekerjaanItems);
    });

    View::composer(['pelanggan.fields'], function ($view) {
      $kotaItems = Kota::pluck('nama', 'id')->toArray();
      $view->with('kotaItems', $kotaItems);
    });

    // Stok
    View::composer(['stok.fields'], function ($view) {
      $barangItems = Barang::pluck('nama', 'id')->toArray();
      $view->with('barangItems', $barangItems);
    });

    // Harga
    View::composer(['harga.fields'], function ($view) {
      // $dataExist = Barang::pluck('id')->toArray();
      $barangItems = Barang::pluck('nama', 'id')->toArray();
      $view->with('barangItems', $barangItems);
    });

    // Mitra
    View::composer(['mitra.fields'], function ($view) {
      $dataExist = Mitra::pluck('pelanggan_id')->toArray();
      $pelangganItems = Pelanggan::whereNotIn('id', $dataExist)->pluck('nama', 'id')->toArray();
      $view->with('pelangganItems', $pelangganItems);
    });

    View::composer(['mitra.fields'], function ($view) {
      $mitraItems = Mitra::join('pelanggan', 'pelanggan.id', '=', 'mitra.pelanggan_id')
        ->select('pelanggan.nama', 'mitra.id')
        ->pluck('nama', 'id')->toArray();
      $view->with('mitraItems', $mitraItems);
    });


    View::composer(['mitra.fields'], function ($view) {
      $levelMitraItems = LevelMitra::pluck('nama', 'id')->toArray();
      $view->with('levelMitraItems', $levelMitraItems);
    });

    View::composer(['mitra.fields'], function ($view) {
      $roleItems = Role::pluck('name', 'name')->toArray();
      $view->with('roleItems', $roleItems);
    });

    // Users
    View::composer(['users.fields'], function ($view) {
      $roleItems = Role::pluck('name', 'name')->toArray();
      $view->with('roleItems', $roleItems);
    });

    View::composer(['users.edit_fields'], function ($view) {
      $roleItems = Role::pluck('name', 'name')->toArray();
      $view->with('roleItems', $roleItems);
    });

    // Barang
    View::composer(['barang.fields'], function ($view) {
      $satuanBarangItems = SatuanBarang::pluck('nama', 'id')->toArray();
      $view->with('satuanBarangItems', $satuanBarangItems);
    });

    View::composer(['barang.fields'], function ($view) {
      $kategoriBarangItems = KategoriBarang::pluck('nama', 'id')->toArray();
      $view->with('kategoriBarangItems', $kategoriBarangItems);
    });

    View::composer(['barang.fields'], function ($view) {
      $subkategoriBarangItems = SubkategoriBarang::pluck('nama', 'id')->toArray();
      $view->with('subkategoriBarangItems', $subkategoriBarangItems);
    });

    View::composer(['barang.fields'], function ($view) {
      $tipeBarang = TipeBarang::pluck('nama', 'nama')->toArray();
      $view->with('tipeBarang', $tipeBarang);
    });

    // Referral
    View::composer(['referral.fields'], function ($view) {
      $userItems = User::pluck('username', 'id')->toArray();
      $view->with('userItems', $userItems);
    });

    // Poin
    View::composer(['poin.fields'], function ($view) {
      $mitraItems = Mitra::leftJoin('pelanggan', 'mitra.pelanggan_id', '=', 'pelanggan.id')
        ->select('mitra.*', 'pelanggan.nama')->pluck('nama', 'id')->toArray();
      $view->with('mitraItems', $mitraItems);
    });

    // Bintang
    View::composer(['bintang.fields'], function ($view) {
      $mitraItems = Mitra::leftJoin('pelanggan', 'mitra.pelanggan_id', '=', 'pelanggan.id')
        ->select('mitra.*', 'pelanggan.nama')->pluck('nama', 'id')->toArray();
      $view->with('mitraItems', $mitraItems);
    });

    // Pegawai
    View::composer(['pegawai.fields'], function ($view) {
      $jabatanItems = Jabatan::pluck('nama', 'id')->toArray();
      $view->with('jabatanItems', $jabatanItems);
    });

    View::composer(['pegawai.create'], function ($view) {
      $role = Role::pluck('name', 'name')->toArray();
      $view->with('roleItems', $role);
    });

    // Purchase Order
    View::composer(['purchase_order.fields'], function ($view) {
      $pegawaiItems = Pegawai::pluck('nama', 'id')->toArray();
      $view->with('pegawaiItems', $pegawaiItems);
    });
    View::composer(['purchase_order.fields'], function ($view) {
      $supplierItems = Supplier::pluck('nama', 'id')->toArray();
      $view->with('supplierItems', $supplierItems);
    });

    View::composer(['purchase_order.blistedit'], function ($view) {
      $barangItems = Barang::select("barang.nama", "barang.id")
        ->join('harga', 'harga.barang_id', '=', 'barang.id')
        //  ->where('harga.harga','!=','0')
        ->where('barang.tipe', 'Reguler')
        ->pluck('nama', 'id')->toArray();
      $view->with('barangItems', $barangItems);
    });

    View::composer(['purchase_order.blist'], function ($view) {
      // $barangItems = Barang::select(DB::raw("CONCAT(barang.nama,' - ( Stok : ',stok.stok,' ) - ( Harga : ',harga.harga, ' )') AS nama"), "barang.id AS id")
      $barangItems = Barang::select("barang.nama", "barang.id")
        ->join('harga', 'harga.barang_id', '=', 'barang.id')
        //  ->where('harga.harga','!=','0')
        ->where('barang.tipe', 'Reguler')
        ->pluck('nama', 'id')->toArray();
      $view->with('barangItems', $barangItems);
    });

    // // Kirim Barang
    // View::composer(['kirim_barang.fields'], function ($view) {
    //     $purchaseOrderItems = PurchaseOrder::pluck('kode','id')->toArray();
    //     $view->with('purchaseOrderItems', $purchaseOrderItems);
    // });

    View::composer(['kirim_barang.fields'], function ($view) {
      $pegawaiItems = Pegawai::pluck('nama', 'id')->toArray();
      $view->with('pegawaiItems', $pegawaiItems);
    });

    View::composer(['kirim_barang.fields'], function ($view) {
      $supplierItems = Supplier::pluck('nama', 'id')->toArray();
      $view->with('supplierItems', $supplierItems);
    });

    // Terima Barang
    // View::composer(['terima_barang.fields'], function ($view) {
    //     $purchaseOrderItems = PurchaseOrder::pluck('kode','id')->toArray();
    //     $view->with('purchaseOrderItems', $purchaseOrderItems);
    // });

    // View::composer(['terima_barang.fields'], function ($view) {
    //     $kirimBarangItems = KirimBarang::pluck('kode','id')->toArray();
    //     $view->with('kirimBarangItems', $kirimBarangItems);
    // });

    View::composer(['terima_barang.fields'], function ($view) {
      $pegawaiItems = Pegawai::pluck('nama', 'id')->toArray();
      $view->with('pegawaiItems', $pegawaiItems);
    });

    View::composer(['terima_barang.fields'], function ($view) {
      $supplierItems = Supplier::pluck('nama', 'id')->toArray();
      $view->with('supplierItems', $supplierItems);
    });

    // Retur Barang
    View::composer(['retur_barang.fields'], function ($view) {
      $pegawaiItems = Pegawai::pluck('nama', 'id')->toArray();
      $view->with('pegawaiItems', $pegawaiItems);
    });

    View::composer(['retur_barang.fields'], function ($view) {
      $supplierItems = Supplier::pluck('nama', 'id')->toArray();
      $view->with('supplierItems', $supplierItems);
    });

    // Penyesuaian Stok
    View::composer(['penyesuaian_stok.create'], function ($view) {
      $barangItems = Barang::select("barang.nama", "barang.id")
        ->join('harga', 'harga.barang_id', '=', 'barang.id')
        // ->join('stok', 'stok.barang_id', '=', 'barang.id')
        //  ->where('harga.harga','!=','0')
        // ->where('stok.stok','!=','0')
        ->where('barang.tipe', 'Reguler')
        ->pluck('nama', 'id')->toArray();

      $view->with('barangItems', $barangItems);
    });

    // Kartu Stok Penjualan
    View::composer(['kartu_stok_penjualan.fields'], function ($view) {
      $barangItems = Barang::where('tipe', "Reguler")->pluck('nama', 'id')->toArray();
      $view->with('barangItems', $barangItems);
    });

    View::composer(['kartu_stok_penjualan.fields'], function ($view) {
      $penjualanItems = Penjualan::pluck('kode', 'id')->toArray();
      $view->with('penjualanItems', $penjualanItems);
    });

    // Kartu Stok Terima Barang
    View::composer(['kartu_stok_terima_barang.fields'], function ($view) {
      $barangItems = Barang::where('tipe', "Reguler")->pluck('nama', 'id')->toArray();
      $view->with('barangItems', $barangItems);
    });

    View::composer(['kartu_stok_terima_barang.fields'], function ($view) {
      $terimaBarangItems = TerimaBarang::pluck('kode', 'id')->toArray();
      $view->with('terimaBarangItems', $terimaBarangItems);
    });

    // Kartu Stok Retur Barang
    View::composer(['kartu_stok_retur_barang.fields'], function ($view) {
      $barangItems = Barang::pluck('nama', 'id')->toArray();
      $view->with('barangItems', $barangItems);
    });

    View::composer(['kartu_stok_retur_barang.fields'], function ($view) {
      $returBarangItems = ReturBarang::pluck('kode', 'id')->toArray();
      $view->with('returBarangItems', $returBarangItems);
    });

    // Kartu Stok Penyesuaian
    View::composer(['kartu_stok_penyesuaian.fields'], function ($view) {
      $barangItems = Barang::where('tipe', "Reguler")->pluck('nama', 'id')->toArray();
      $view->with('barangItems', $barangItems);
    });

    View::composer(['kartu_stok_penyesuaian.fields'], function ($view) {
      $penyesuaianStokItems = PenyesuaianStok::pluck('kode', 'id')->toArray();
      $view->with('penyesuaianStokItems', $penyesuaianStokItems);
    });

    //kirim barang views
    View::composer(['kirim_barang.fields'], function ($view) {
      $data = PurchaseOrder::where('status', 'Diprosess')->pluck('kode', 'id')->toArray();
      $view->with('purchase_order', $data);
    });

    // View::composer(['kirim_barang.fields'], function ($view) {
    //     $data = Supplier::pluck('nama','id')->toArray();
    //     $view->with('suppliers', $data);
    // });

    //terima barang views

    View::composer(['terima_barang.fields'], function ($view) {
      $dataExist = TerimaBarang::pluck('kirim_barang_id')->toArray();
      $data = KirimBarang::select('kirim_barang.*')
        ->join('purchase_order', 'purchase_order.id', '=', 'kirim_barang.purchase_order_id')
        ->where('kirim_barang.status', 'Dikirim')
        ->whereNotIn('kirim_barang.id', $dataExist)
        ->pluck('kode', 'id')->toArray();
      $view->with('kirim_barang', $data);
    });

    View::composer(['retur_barang.blist'], function ($view) {
      $barangItems = Barang::select("barang.nama", "barang.id")
        ->join('harga', 'harga.barang_id', '=', 'barang.id')
        ->join('stok', 'stok.barang_id', '=', 'barang.id')
        ->where('harga.harga', '!=', '0')
        ->where('stok.stok', '!=', '0')
        ->where('barang.tipe', 'Reguler')
        ->pluck('nama', 'id')->toArray();
      $view->with('barangItems', $barangItems);
    });

    View::composer(['retur_barang.blistedit'], function ($view) {
      $barangItems = Barang::select("barang.nama", "barang.id")
        ->join('harga', 'harga.barang_id', '=', 'barang.id')
        ->join('stok', 'stok.barang_id', '=', 'barang.id')
        ->where('stok.stok', '!=', '0')
        ->where('harga.harga', '!=', '0')
        ->where('barang.tipe', 'Reguler')
        ->pluck('nama', 'id')->toArray();
      $view->with('barangItems', $barangItems);
    });

    //promo
    View::composer(['promo.fields'], function ($view) {
      $barangItems = Barang::where('barang.tipe', 'Paket')->pluck('nama', 'id')->toArray();
      $view->with('barangItems', $barangItems);
    });

    View::composer(['promo.create'], function ($view) {
      $barangItems = Barang::leftJoin('stok', 'barang.id', '=', 'stok.barang_id')
        ->join('harga', 'barang.id', '=', 'harga.barang_id')
        ->where('barang.tipe', 'Reguler')
        ->select('barang.*', 'stok.stok', 'harga.harga')->pluck('nama', 'id')->toArray();

      $view->with('barangItems', $barangItems);
    });

    View::composer(['promo.edit'], function ($view) {
      $barangItems = Barang::leftJoin('stok', 'barang.id', '=', 'stok.barang_id')
        ->join('harga', 'barang.id', '=', 'harga.barang_id')
        ->where('barang.tipe', 'Reguler')
        ->select('barang.*', 'stok.stok', 'harga.harga')->pluck('nama', 'id')->toArray();

      $view->with('barangItems', $barangItems);
    });


    //parameter
    View::composer(['parameter.fields'], function ($view) {
      $tipeParameter = TipeParameter::pluck('kode', 'nama')->toArray();
      $view->with('tipeParameter', $tipeParameter);
    });
  }
}
