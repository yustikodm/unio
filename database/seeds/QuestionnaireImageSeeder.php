<?php

use Illuminate\Database\Seeder;
use App\Models\QuestionnaireImage;
use Carbon\Carbon;

class QuestionnaireImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $image = [
          [
              'src' => 'https://www.123test.com/content/tests/career-test/01-01.png',
              'type' => 'R',
          ],
          [
              'src' => 'https://www.123test.com/content/tests/career-test/01-02.png',
              'type' => 'I',
          ],
          [
              'src' => 'https://www.123test.com/content/tests/career-test/01-03.png',
              'type' => 'R',
          ],
          [
              'src' => 'https://www.123test.com/content/tests/career-test/01-04.png',
              'type' => 'A',
          ],
          [
              'src' => 'https://www.123test.com/content/tests/career-test/02-01.png',
              'type' => 'R',
          ],
          [
              'src' => 'https://www.123test.com/content/tests/career-test/02-02.png',
              'type' => 'S',
          ],
          [
              'src' => 'https://www.123test.com/content/tests/career-test/02-03.png',
              'type' => 'R',
          ],
          [
              'src' => 'https://www.123test.com/content/tests/career-test/02-04.png',
              'type' => 'E',
          ],
          [
              'src' => 'https://www.123test.com/content/tests/career-test/03-01.png',
              'type' => 'R',
          ],
          [
              'src' => 'https://www.123test.com/content/tests/career-test/03-02.png',
              'type' => 'C',
          ],
          [
              'src' => 'https://www.123test.com/content/tests/career-test/03-03.png',
              'type' => 'I',
          ],
          [
              'src' => 'https://www.123test.com/content/tests/career-test/03-04.png',
              'type' => 'A',
          ],
          [
              'src' => 'https://www.123test.com/content/tests/career-test/04-01.png',
              'type' => 'I',
          ],
          [
              'src' => 'https://www.123test.com/content/tests/career-test/04-02.png',
              'type' => 'S',
          ],
          [
              'src' => 'https://www.123test.com/content/tests/career-test/04-03.png',
              'type' => 'I',
          ],
          [
              'src' => 'https://www.123test.com/content/tests/career-test/04-04.png',
              'type' => 'E',
          ],
          [
              'src' => 'https://www.123test.com/content/tests/career-test/05-01.png',
              'type' => 'I',
          ],
          [
              'src' => 'https://www.123test.com/content/tests/career-test/05-02.png',
              'type' => 'C',
          ],
          [
              'src' => 'https://www.123test.com/content/tests/career-test/05-03.png',
              'type' => 'A',
          ],
          [
              'src' => 'https://www.123test.com/content/tests/career-test/05-04.png',
              'type' => 'S',
          ],
          [
              'src' => 'https://www.123test.com/content/tests/career-test/06-01.png',
              'type' => 'A',
          ],
          [
              'src' => 'https://www.123test.com/content/tests/career-test/06-02.png',
              'type' => 'E',
          ],
          [
              'src' => 'https://www.123test.com/content/tests/career-test/06-03.png',
              'type' => 'A',
          ],
          [
              'src' => 'https://www.123test.com/content/tests/career-test/06-04.png',
              'type' => 'C',
          ],
          [
              'src' => 'https://www.123test.com/content/tests/career-test/07-01.png',
              'type' => 'A',
          ],
          [
              'src' => 'https://www.123test.com/content/tests/career-test/07-02.png',
              'type' => 'S',
          ],
          [
              'src' => 'https://www.123test.com/content/tests/career-test/07-03.png',
              'type' => 'E',
          ],
          [
              'src' => 'https://www.123test.com/content/tests/career-test/07-04.png',
              'type' => 'S',
          ],
          [
              'src' => 'https://www.123test.com/content/tests/career-test/08-01.png',
              'type' => 'C',
          ],
          [
              'src' => 'https://www.123test.com/content/tests/career-test/08-02.png',
              'type' => 'S',
          ],
          [
              'src' => 'https://www.123test.com/content/tests/career-test/08-03.png',
              'type' => 'E',
          ],
          [
              'src' => 'https://www.123test.com/content/tests/career-test/08-04.png',
              'type' => 'C',
          ]                  
      ];

    foreach ($image as $row) {
      QuestionnaireImage::create(array_merge($row, [
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()
        ]));
    };
    }
}
