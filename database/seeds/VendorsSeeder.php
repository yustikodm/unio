<?php

use App\Models\Vendor;
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
    // $data = [
    //   [
    //     'vendor_category_id' => 2,
    //     'name' => 'IPIEMS',
    //     'description' => 'Lembaga Konsultasi terbaik di indonesia',
    //     'picture' => '1616475626.jpeg',
    //     'email' => 'ipiems@demo.com',
    //     'back_account_number' => '991292922',
    //     'website' => 'ipiems@demo.com',
    //     'address' => 'Kebonsari',
    //     'phone' => '08781223344',
    //     'created_at' => Carbon::now(),
    //     'updated_at' => Carbon::now(),
    //   ],
    //   [
    //     'vendor_category_id' => 4,
    //     'name' => 'Primagama',
    //     'description' => 'Tempat Les TOEFL Terbaik',
    //     'picture' => '/tmp/phpe2xW7g',
    //     'email' => 'primagama@demo.com',
    //     'back_account_number' => '991292922',
    //     'website' => 'primagama.demo.com',
    //     'address' => 'kebonsari',
    //     'phone' => '08781223344',
    //     'created_at' => Carbon::now(),
    //     'updated_at' => Carbon::now(),
    //   ],
    //   [
    //     'vendor_category_id' => 1,
    //     'name' => 'HaloDoc',
    //     'description' => 'lembaga healt care terbaik di indonesia',
    //     'picture' => '1616482124.jpeg',
    //     'email' => 'halodoc@demo.com',
    //     'back_account_number' => '99282828',
    //     'website' => 'halodoc.demo.com',
    //     'address' => 'kebonsari',
    //     'phone' => '08272721331',
    //     'created_at' => Carbon::now(),
    //     'updated_at' => Carbon::now(),
    //   ],
    //   [
    //     'vendor_category_id' => 1,
    //     'name' => 'Blackpink',
    //     'description' => 'Best KPOP Group in the world',
    //     'picture' => '1616483198.jpeg',
    //     'email' => 'blackpink@demo.com',
    //     'back_account_number' => '9929281823',
    //     'website' => 'blackpink.demo.com',
    //     'address' => 'kebonsari',
    //     'phone' => '08272727123',
    //     'created_at' => Carbon::now(),
    //     'updated_at' => Carbon::now(),
    //   ],
    //   [
    //     'vendor_category_id' => 1,
    //     'name' => 'Blackpink',
    //     'description' => 'the best KPOP group in the world',
    //     'picture' => '/tmp/phphAu6kj',
    //     'email' => 'blackpink@demo.com',
    //     'back_account_number' => '991292922',
    //     'website' => 'blackpink.demo.com',
    //     'address' => 'kebonsari',
    //     'phone' => '08781223344',
    //     'created_at' => Carbon::now(),
    //     'updated_at' => Carbon::now(),
    //   ],
    //   [
    //     'vendor_category_id' => 1,
    //     'name' => 'twice',
    //     'description' => 'best kpop in the world',
    //     'picture' => '/tmp/phpjK7Vyg',
    //     'email' => 'twice@demo.com',
    //     'back_account_number' => '991292922',
    //     'website' => 'twice.demo.com',
    //     'address' => 'kebonsari',
    //     'phone' => '08781223344',
    //     'created_at' => Carbon::now(),
    //     'updated_at' => Carbon::now(),
    //   ],
    //   [
    //     'vendor_category_id' => 1,
    //     'name' => 'twice',
    //     'description' => 'best kpop group in the world',
    //     'picture' => '/tmp/phpcGZeFf',
    //     'email' => 'twice@demo.com',
    //     'back_account_number' => '991292922',
    //     'website' => 'twice.demo.com',
    //     'address' => 'kebonsari',
    //     'phone' => '08781223344',
    //     'created_at' => Carbon::now(),
    //     'updated_at' => Carbon::now(),
    //   ],
    //   [
    //     'vendor_category_id' => 1,
    //     'name' => 'lala',
    //     'description' => 'lalala',
    //     'picture' => '/tmp/phpG6bdsf',
    //     'email' => 'allala@demo.com',
    //     'back_account_number' => '98272722',
    //     'website' => 'lala',
    //     'address' => 'lala',
    //     'phone' => '08728288282',
    //     'created_at' => Carbon::now(),
    //     'updated_at' => Carbon::now(),
    //   ],
    //   [
    //     'vendor_category_id' => 3,
    //     'name' => 'Twice',
    //     'description' => 'best kpop group in the world',
    //     'picture' => '/tmp/phpuLHW6h',
    //     'email' => 'twice@demo.com',
    //     'back_account_number' => '991292922',
    //     'website' => 'twice.demo.com',
    //     'address' => 'kebonsari',
    //     'phone' => '08272721331',
    //     'created_at' => Carbon::now(),
    //     'updated_at' => Carbon::now(),
    //   ],
    //   [
    //     'vendor_category_id' => 3,
    //     'name' => 'One ok Rock',
    //     'description' => 'best band in the world',
    //     'picture' => 'MZszVFFEP3Jn4olkXUiiFqvB1kdvXh7eaGgSqdce.jpg',
    //     'email' => 'oneokrock@demo.com',
    //     'back_account_number' => '992822828',
    //     'website' => 'oneokrock.demo.com',
    //     'address' => 'kebonsari',
    //     'phone' => '08781223344',
    //     'created_at' => Carbon::now(),
    //     'updated_at' => Carbon::now(),
    //   ],
    // ];

    // Vendor::insert($data);
    factory(Vendor::class, 50)->create();
  }
}
