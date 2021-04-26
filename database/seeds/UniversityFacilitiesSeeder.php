<?php

use App\Models\UniversityFacility;
use Illuminate\Database\Seeder;

class UniversityFacilitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $facitlities = [
            [
                'university_id' => 1,
                'name' => 'Public Computers',
                'description' => 'Over 100 public PC workstations, located in Gutman Library and elsewhere on campus, are available to the HGSE community. Additionally, students may use PCs and Macs in the General Computing Area (GCA), located on the third floor of Gutman Library, and wireless connectivity is available throughout most of the HGSE campus.',
                'amount' => 2,
            ],
            [
                'university_id' => 1,
                'name' => 'Multimedia Development Lab',
                'description' => 'The multimedia development lab provides students and faculty with computers set up for a wide variety of media production, including audio and video editing, DVD production, web development, and other applications that might be needed for media-enhanced projects.',
                'amount' => 1,
            ],
            [
                'university_id' => 1,
                'name' => 'Videoconference Facilities',
                'description' => 'HGSE features several spaces to conduct high-end videoconferences. Faculty host “virtual guest speakers” in which professionals from various fields visit a class session remotely via a videoconference.',
                'amount' => 1,
            ],
            [
                'university_id' => 1,
                'name' => 'The Commons at Gutman Library',
                'description' => "Enjoy breakfast, lunch, dinner, or a snack at The Commons at Gutman Library. The Commons' culinary team is proud to offer menu selections such as fresh baked goods, breakfast sandwiches, grilled items and pizza from the stone hearth oven.  Recharge with a fresh made salad or home cooked entree in a relaxed cafe setting.",
                'amount' => 1,
            ],
            [
                'university_id' => 1,
                'name' => 'Building a Sustainable Community',
                'description' => "From solar panels on the roof of Gutman and filtered water stations across campus to our four LEED certified building projects, the HGSE Operations Office and Green Team are focused on building and operating a sustainable, energy efficient campus. These efforts are part of Harvard’s University-wide commitment to sustainability, including a goal to reduce greenhouse gas emissions 30% by 2016.",
                'amount' => 1,
            ],
            [
                'university_id' => 2,
                'name' => 'ITS Training Center',
                'description' => 'ITS Training Center, salah satu fasilitas kampus ITS, adalah salah satu unit pelayanan di bawah UPT Pusat Pelatihan dan Sertifikasi Profesi, BPPU ITS. ITS Training Center bertujuan memberikan layanan pelatihan dan sertifikasi profesi bagi mahasiswa maupun kalangan profesional dalam rangka meningkatkan kompetensi pada bidang profesi tertentu. Diajar oleh kalangan akademisi/praktisi ITS yang berkompeten serta didukung dengan sarana dan fasilitas penunjang training yang lengkap menjadikan ITS Training Center sebagai pilihan tepat dalam upaya peningkatan kompetensi.',
                'amount' => 1,
            ],
            [
                'university_id' => 2,
                'name' => 'Pusat Pengembangan Karir dan Kewirausahaan',
                'description' => 'Berbagai informasi dunia kerja sesuai dengan kompetensi yang dipelajari sangat membantu menjembatani mahasiswa untuk berkarir dengan penuh perencanaan sejak awal. Oleh karena itu, ITS menyediakan PPK-SAC yang merupakan fasilitas kampus ITS dalam bidang pengembangan karir dan kewirausahaan mahasiswa. PPK-SAC ITS juga memetakan jumlah mahasiswa ITS yang terbantu dengan keberadaan PPK-SAC dari aspek memperoleh kesempatan melakukan konsultasi psikologi dan bimbingan karir, memperoleh informasi peluang karir baik online maupun offline malalui bursa karir ITS.',
                'amount' => 1,
            ],
            [
                'university_id' => 2,
                'name' => 'UPT Bahasa dan Budaya',
                'description' => 'UPT Bahasa dan Budaya – Institut Teknologi Sepuluh Nopember (ITS) berfungsi mendukung tujuan utama dari Institut dalam konteks studi ekstra kurikuler yang diharapkan dapat memenuhi celah kekurangan kompetensi bahasa Inggris di jalur kurikuler. Hal ini diberikan tugas untuk mengembangkan program pengajaran bahasa yang paling efisien dan efektif sesuai dengan kebutuhan dan kemampuan peserta, untuk melakukan penelitian bahasa kedua di murni dan terapan bidang linguistik, dan membangun jaringan komunikasi dan kerjasama di bidang pengajaran bahasa dengan perguruan tinggi baik di dalam negeri dan luar negeri.',
                'amount' => 1,
            ],
            [
                'university_id' => 2,
                'name' => 'Perpustakaan',
                'description' => 'Pusat sumber belajar atau Learning Resource Center dengan fasilitas dan jasa berbasis teknologi informasi. Bertujuan untuk menunjang kurikulum dengan menyediakan informasi dan bahan pustaka yang memadai untuk mahasiswa dan dosen sehingga program akademik dapat dilaksanakan secara efektif serta membantu melestarikan karya ilmiah civitas academika seperti, tugas akhir, skripsi, tesis, disertasi, prosiding dan lain-lain.',
                'amount' => 1,
            ],
            [
                'university_id' => 2,
                'name' => 'Medical Center',
                'amount' => 1,
                'description' => 'Jangan khawatir jika Anda ingin melakukan pemeriksaan kesehatan karena Medical Center ITS hadir sebagai salah satu fasilitas kampus ITS untuk memberikan pelayanan kesehatan kepada Anda. Pusat pelayanan kesehatan diperuntukkan bagi civitas akademika ITS dan masyarakat umum. Fasilitas yang disediakan berupa unit rawat jalan yang melaksanakan pelayanan pemeriksaan, tindakan medis, penunjang medis, dan rujukan.',
            ],
            [
                'university_id' => 3,
                'name' => 'Rewley House',
                'amount' => 1,
                'description' => "Rewley House in Wellington Square is the main base for the Department's activities. Located in a quiet enclave of central Oxford, Rewley House is a short walk from Oxford's historic sites, colleges, museums, shops and restaurants, thus making it the ideal base for students and visitors alike",
            ],
            [
                'university_id' => 3,
                'name' => 'Ewert House',
                'amount' => 1,
                'description' => "Ewert House in Summertown is conveniently located just outside central Oxford, offering easy access by car or bus. The full range of Summertown's excellent shops and restaurants are all within walking distance, and central Oxford is just 5 minutes by public transport.",
            ]
        ];

        foreach($fees as $fee){
            UniversityFacility::create(array_merge($fee, [
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]));
        }
    }
}
