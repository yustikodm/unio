<?php

use App\Models\PlaceToLive;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PlaceToLiveSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
      $lives = [
          [
              'country_id' => 1,
              'state_id' => 1,
              'district_id' => 1,
              'name' => 'Orchard Studio Apartmen',
              'description' => 'A comfortable place to rest, clean simple and feel at home, our unit is on the 27th floor with beautiful views, swimming pools, golf courses, and stunning condominium and hotel buildings. 
              
              Connected directly to Pakuwon Mall, without the hassle of finding the nearest entertainment or dining venue',
              'price' => '245.000',
              'address' => 'Jl. Yos Sudarso No. 532, Surabaya',
              'phone' => '(+62) 823 0412 8908',
          ],
          [
              'country_id' => 1,
              'state_id' => 1,
              'district_id' => 1,
              'name' => 'Wildflower Anderson',
              'description' => 'Welcome to The Wildflower Anderson. 
              
              Awaken to a bright and playful stylish apartment that is located in the center of West Surabaya\'s business district. 
              
              Connected directly with the biggest and most prestigious mall in Surabaya, Pakuwon Mall. Although compact, the interior has been fully re-designed to maximize on space without neglecting the aesthetic elements. Well-designed apartment inspired by Bohemian style decoration with a twist of Moroccan color theme.',
              'price' => '490.000',
              'address' => 'Pakuwon Mall Complex, Lontar 5, Sambikerep, Surabaya Barat 60216',
              'phone' => '(+62) 875 9087 9005',
          ],
          [
              'country_id' => 1,
              'state_id' => 1,
              'district_id' => 1,
              'name' => 'Benson Apartment',
              'description' => "Benson Studio Apartment above Pakuwon Mall, the Biggest Mall Located in west Surabaya. The best place you want to stay on your visit. It have connecting doors straight to the mall, Shared pool and gym among owners, also choices of place to hang out with your relatives (Mcdonald. Bakmi GM. Excelso. Tanamera. etc)

              The Room itself has been set up to fit your traveling needs. It's spacious, clean and minimalist. I set up a latex luxury Bed Mattress to help you get a better sleep during your stay.
              ",
              'price' => '160.000',
              'address' => 'Jln. Labu No. 59, Surabaya',
              'phone' => '(+62) 8165 8422 4838',
          ]
      ];

      foreach ($lives as $live) {
            PlaceToLive::create(array_merge($live, [
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]));
      };
    }
}
