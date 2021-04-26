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
                'university_id' => 1,
                'name' => 'Harvard Business School',
                'description' => ''
            ],
            [
                'university_id' => 1,
                'name' => 'Harvard Faculty of Arts and Sciences',
                'description' => ''
            ],
            [
                'university_id' => 1,
                'name' => 'Harvard University Graduate School of Design',
                'description' => ''
            ],
            [
                'university_id' => 1,
                'name' => 'Harvard Medical School',
                'description' => ''
            ],
            [
                'university_id' => 1,
                'name' => 'Harvard Divinity School',
                'description' => ''
            ],
            [
                'university_id' => 1,
                'name' => 'Harvard Law School',
                'description' => ''
            ],
            [
                'university_id' => 1,
                'name' => 'Harvard Graduate School of Education',
                'description' => ''
            ],
            [
                'university_id' => 1,
                'name' => 'Harvard Graduate School of Public Health',
                'description' => ''
            ],
            [
                'university_id' => 1,
                'name' => 'Kennedy School of Government',
                'description' => ''
            ],
            [
                'university_id' => 2,
                'name' => 'Faculty of Science And Data Analytics',
                'description' => 'The Faculty of Science and Data Analytics with the aim of answering the challenges of the Industry 4.0 The Faculty of Science and Data Analysis (Scientics) ITS is one of 7 faculties within the ITS environment which is a merger of two faculties namely the Faculty of Mathematics, Computing and Data Science with the Faculty of Natural Sciences (FIA).'
            ],
            [
                'university_id' => 2,
                'name' => 'Faculty of Industrial Technology And Systems Engineering',
                'description' => 'Faculty of Industrial Technology and Systems Engineering (Indsys) is ready to produce reliable engineers to fulfill the needs of the growing industry in the fields of Mechanical Engineering, Chemical Engineering, Physics Engineering, Industrial Engineering, and Materials and Metallurgical Engineering. Industrial development in Indonesia is very fast-paced. Up to the year 2019, there were around 24,500 industries registered in the Ministry of Industry’s database and the existence of more than 100 industrial estates, where each area encompasses hundreds to 2,267 hectares. With Indonesia’s current population that exceeds 250 million with a surface area nearing 1,905 million km2, it is definitely very strategic to provide the people’s needs by using abundant natural resources.'
            ],
            [
                'university_id' => 2,
                'name' => 'Faculty of Civil Planning And Geo Engineering',
                'description' => 'The Faculty of Civil, Planning, and Geo Engineering has a vision that supports ITS to become a tertiary institution with an international reputation in the fields of Civil Engineering, Architecture, Environmental Engineering, Urban and Regional Planning, and Geo Engineering with environmental insight.'
            ],
            [
                'university_id' => 2,
                'name' => 'Faculty of Marine Technology',
                'description' => 'Faculty of Marine Technology (Martech) was established under Presidential Decree Number 58 in 1982. Formerly, Martech was named Faculty of Naval Architecture which was established in 1960 together with the establishment of Institut Teknologi Sepuluh Nopember (ITS). At the present time, Faculty of Marine Technology has four majors undergraduate and post graduates programmes.Faculty of Marine Technology learn about development, utilization, and transformation of marine science to create community-based marine development and sustainable and eco-friendly maritime community empowerment in the Asia Pacific region. This faculty has Undergraduate Programme which consist of  Marine Engineering, Naval Architecture, Marine Transportation Engineering, Ocean Engineering, and also Postgraduate Programme consisting of Marine Technology and Marine Engineering.Focus on the Indonesian Maritime Field, Faculty of Marine Technology commited to contribute and support Indonesia as a global maritime axis. Faculty of Marine Technology has complete laboratory facilities in the field of scientific research and community services.'
            ],
            [
                'university_id' => 2,
                'name' => 'Faculty of Intelligent Electrical And Informatics Technology',
                'description' => 'The Faculty of Intelligent Electrical and  Informatics Technology (F-Electics) is a leading faculty in ITS which was established as a combination of the Faculty of Information and Communication Technology (FTIK) and the Faculty of Electrical Technology (FTE) consisting of six departments with more than 2500 students both at the S1, S2 level or S3.F-Electics comes with a vision to become a referral faculty in education and research in electrical, electronics and computing-related fields with an international reputation and contribution to humanit'
            ],
            [
                'university_id' => 2,
                'name' => 'Faculty of Creative Design And Digital Business',
                'description' => 'The world is changing at a rapid pace due to advances in science and technology, such as the development of Artificial Intelligence and the Internet of Things (IoT). These phenomena cause humans must be highly adaptive. Creativity and innovation are the keys to be adaptive. Creativity is a human ability that cannot be replaced by a machine. The Faculty of Creative Design and Digital Business (CREABIZ) was established in 2019 to foster creativity for prosperity considering the high values of Indonesian culture and sustainable environment. Consisting of 6 Departments: Technology Management, Industrial Design, Business Management, Interior Design, Visual Communication Design and Development Studies, the CREABIZ Faculty prepares creative, innovative and adaptive human resources through advanced design thinking and managerial capability.'
            ],
            [
                'university_id' => 2,
                'name' => 'Faculty of Vocational (Vocation)',
                'description' => 'Vocational students are well-known for their excellent skill and abilities in projects. Based on that condition, ITS develop the faculty of vocational which cover departments with diploma 4 students. Those departments are Civil Infrastructure Engineering Department, Mechanical  Industry Engineering Department, Electrical Automation Engineering Department, Chemical Industry Engineering Department, Instrument Engineering Department, Statistics Business Department'
            ],
            [
                'university_id' => 3,
                'name' => 'Faculty of Agriculture and Veterinary Medicine',
                'description' => null
            ],
            [
                'university_id' => 3,
                'name' => 'Faculty of pure and applied science',
                'description' => null
            ],
            [
                'university_id' => 3,
                'name' => 'Faculty of building architecture',
                'description' => null
            ],
            [
                'university_id' => 3,
                'name' => 'Faculty of business and management',
                'description' => null
            ],
            [
                'university_id' => 3,
                'name' => 'Faculty of computer science and information technology',
                'description' => null
            ],
            [
                'university_id' => 3,
                'name' => 'Faculty of art and Design',
                'description' => null
            ],
            [
                'university_id' => 3,
                'name' => 'Faculty of education and training',
                'description' => null
            ],
            [
                'university_id' => 3,
                'name' => 'Faculty of Engineering',
                'description' => null
            ],
            [
                'university_id' => 3,
                'name' => 'Faculty of self-care and physical fitness',
                'description' => null
            ],
            [
                'university_id' => 3,
                'name' => 'Faculty of medicine and health',
                'description' => null
            ],
            [
                'university_id' => 3,
                'name' => 'Faculty of humanities',
                'description' => null
            ],
            [
                'university_id' => 3,
                'name' => 'Faculty of Law',
                'description' => null
            ],
            [
                'university_id' => 3,
                'name' => 'Faculty of master of business administration',
                'description' => null
            ],
            [
                'university_id' => 3,
                'name' => 'Faculty of social sciences and media',
                'description' => null
            ],

        ];

        foreach ($faculties as $faculty) {
            UniversityFaculties::create(array_merge($faculty, [
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]));
        };
    }
}
