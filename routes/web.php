<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  return redirect('dashboard');
});

Auth::routes(['verify' => true]);

Route::post('/cobaPrinter', 'HomeController@cobaPrinter')->name('cobaPrinter');

Route::get('/dashboard', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {
  Route::resource('countries', 'CountryController');
  Route::resource('users', 'UserController');
  Route::get('profile', 'UserController@editProfile');
  Route::post('update-profile', 'UserController@updateProfile');
  Route::resource('roles', 'RoleController');
  Route::resource('permissions', 'PermissionController');

  Route::get('permissions/role-has-permission', 'PermissionController@roleHasPermission');
  Route::get('permissions/refresh-permissions', 'PermissionController@refreshPermissions');
  Route::post('permissions/give-permission-to-role', 'PermissionController@givePermissionToRole');
  Route::post('permissions/revoke-permission-to-role', 'PermissionController@revokePermissionToRole');




  Route::resource('states', 'StateController');

  Route::resource('districts', 'DistrictController');

  Route::resource('currencies', 'CurrencyController');

  Route::resource('religions', 'ReligionController');

  Route::resource('questionnaires', 'QuestionnaireController');

  Route::resource('questionnaireAnswers', 'QuestionnaireAnswerController');

  Route::resource('universities', 'UniversityController');

  Route::resource('universityFees', 'UniversityFeeController');

  Route::resource('universityMajors', 'UniversityMajorController');

  Route::resource('universityRequirements', 'UniversityRequirementController');

  Route::resource('universityScholarships', 'UniversityScholarshipController');

  Route::resource('universityFaculties', 'UniversityFacultiesController');

  Route::resource('vendors', 'VendorController');

  Route::resource('vendorServices', 'VendorServiceController');

  Route::resource('vendorEmployees', 'VendorEmployeeController');

  Route::resource('vendorCategories', 'VendorCategoryController');

  Route::resource('students', 'StudentController');

  Route::resource('guardians', 'GuardianController');

  Route::resource('wishlists', 'WishlistController');

  Route::resource('carts', 'CartController');

  Route::resource('articles', 'ArticleController');

  /*Route::resource('pelanggan', 'PelangganController');

    Route::resource('barang', 'BarangController');

    Route::resource('satuanBarang', 'SatuanBarangController');

    Route::resource('kategoriBarang', 'KategoriBarangController');

    Route::resource('subkategoriBarang', 'SubkategoriBarangController');

    Route::resource('supplier', 'SupplierController');

    Route::resource('mitra', 'MitraController');

    Route::resource('purchaseOrder', 'PurchaseOrderController');

    Route::resource('kirimBarang', 'KirimBarangController');

    Route::resource('terimaBarang', 'TerimaBarangController');

    Route::resource('returBarang', 'ReturBarangController');

    Route::resource('promo', 'PromoController');

    Route::resource('harga', 'HargaController');

    Route::resource('stok', 'StokController');

    Route::resource('kartuStokPenjualan', 'KartuStokPenjualanController');

    Route::resource('kartuStokTerimaBarang', 'KartuStokTerimaBarangController');

    Route::resource('kartuStokReturBarang', 'KartuStokReturBarangController');

    Route::resource('kartuStokPenyesuaian', 'KartuStokPenyesuaianController');

    Route::resource('penjualan', 'PenjualanController');
    Route::get('penjualanExport', 'PenjualanController@export');

    Route::resource('parameter', 'ParameterController');

    Route::resource('poin', 'PoinController');

    Route::resource('bintang', 'BintangController');

    Route::resource('referral', 'ReferralController');

    Route::resource('levelMitra', 'LevelMitraController');

    Route::resource('kota', 'KotaController');

    Route::resource('pekerjaan', 'PekerjaanController');

    Route::resource('pegawai', 'PegawaiController');

    Route::resource('jabatan', 'JabatanController');

    Route::resource('penyesuaianStok', 'PenyesuaianStokController');

    Route::resource('barangPenjualan', 'BarangPenjualanController');

    Route::resource('logPoin', 'LogPoinController');

    Route::resource('logBintang', 'LogBintangController');

    Route::resource('detailPurchaseOder', 'DetailPurchaseOrderController');

    Route::post('updateDPO', 'DetailPurchaseOrderController@updateDPO');

    Route::post('updateKirimBarang/{id}', 'KirimBarangController@updateKirimBarang')->name('updateKirimBarang');

    Route::post('updateTerimaBarang/{id}', 'TerimaBarangController@updateTerimaBarang')->name('updateTerimaBarang');

    Route::post('updatePurchaseOrder/{id}', 'PurchaseOrderController@updatePurchaseOrder')->name('updatePurchaseOrder');

    Route::post('updateReturBarang/{id}', 'ReturBarangController@updateReturBarang')->name('updateReturBarang');

    Route::post('updatePenyesuaian/{id}', 'PenyesuaianStokController@updatePenyesuaian')->name('updatePenyesuaian');

    Route::post('updatePenerimaan/{id}', 'PenerimaanReturController@updatePenerimaan')->name('updatePenerimaan');

    Route::resource('barangKirim', 'BarangKirimController');

    Route::resource('barangTerima', 'BarangTerimaController');

    Route::resource('barangRetur', 'BarangReturController');

    Route::resource('barangpromo', 'BarangPromoController');

    Route::resource('penerimaanRetur', 'PenerimaanReturController');

    Route::resource('barangPenyesuaian', 'BarangPenyesuaianController');

    Route::resource('barangPenerimaan', 'BarangPenerimaanController');

    Route::get('laporanPenjualan', 'PenjualanController@laporan')->name('laporanPenjualan');

    Route::get('exportLaporanPenjualan', 'PenjualanController@exportLaporan')->name('exportLaporanPenjualan');

    Route::get('klaimHadiah', 'HadiahController@klaimHadiah')->name('klaimHadiah');

    Route::get('manajemenHadiah', 'HistoryKlaimHadiahController@manajemenHadiah')->name('manajemenHadiah');

    Route::resource('tipeParameter', 'TipeParameterController');

    Route::resource('tipeBarang', 'TipeBarangController');

    Route::resource('hadiah', 'HadiahController');

    Route::resource('voucher', 'VoucherController');

    Route::resource('diskon', 'DiskonController');

    Route::resource('metodePembayaran', 'MetodePembayaranController');

    Route::resource('bank', 'BankController');

    Route::resource('historyKlaimHadiah', 'HistoryKlaimHadiahController');

    Route::resource('rekapStok', 'RekapStokController');

    Route::get('exportRekapStok', 'RekapStokController@exportRekapStok')->name('exportRekapStok');

    Route::get('laporanOmset', 'PenjualanController@laporanOmset')->name('laporanOmset');

    Route::get('exportLaporanOmset', 'PenjualanController@exportLaporanOmset')->name('exportLaporanOmset');

    Route::resource('bonus', 'BonusController');

    Route::resource('logBonus', 'LogBonusController');

    Route::get('mitraProfile', 'MitraController@mitraProfile')->name('mitraProfile');

    Route::resource('logKlaimBonus', 'LogKlaimBonusController');

    Route::get('klaimBonus', 'BonusController@klaimBonus')->name('klaimBonus');

    Route::resource('mutasiKas', 'MutasiKasController');

    Route::get('arusKas', 'MutasiKasController@arusKas')->name('arusKas');

    Route::get('exportLaporanArusKas', 'MutasiKasController@exportKas')->name('exportLaporanArusKas');

    Route::get('pembayaran', 'PenjualanController@pembayaran')->name('pembayaran');

    Route::get('lanjutTransaksi/{id}', 'PenjualanController@lanjutTransaksi')->name('lanjutTransaksi');

    Route::get('batalTransaksi', 'PenjualanController@batalTransaksi')->name('batalTransaksi');

    Route::get('printStruk/{id}', 'PenjualanController@printStruk')->name('printStruk');

    Route::post('updatePenjualan/{id}', 'PenjualanController@updatePenjualan')->name('updatePenjualan');

    Route::resource('printer', 'PrinterController');

    Route::post('klaimReward', 'HadiahController@klaimReward')->name('klaimReward');

    Route::get('printPopUp/{id}', 'PenjualanController@printPopUp')->name('printPopUp');

    Route::get('transaksiDibatalkan', 'PenjualanController@transaksiDibatalkan')->name('transaksiDibatalkan');*/
});


Route::resource('boardingHouses', 'BoardingHouseController');
