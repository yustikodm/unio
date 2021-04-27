<?php

use App\Models\UniversityScholarship;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UniversityScholarshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $scholarships = [
            [
                'university_id' => 1,
                'year' => '2020-10-09',
                'name' => 'Beasiswa sarjana internasional untuk Harvard',
                'description' => 'Siswa internasional memenuhi syarat untuk jumlah bantuan yang sama dengan siswa AS dan proses aplikasi pada dasarnya sama.
                Melalui scholars beasiswa berbasis kebutuhan, Harvard memungkinkan Anda untuk mengajukan permohonan bantuan keuangan atau memperbarui bantuan keuangan Anda setiap tahun.
                Sebagaimana dinyatakan oleh lembaga, Anda akan diminta untuk memberikan informasi tentang pendapatan dan aset keluarga Anda, penghargaan dari luar, dan keadaan keuangan yang tidak biasa atau berubah. Setelah kami meninjau informasi Anda dan menentukan kebutuhan Anda yang ditunjukkan, Anda akan diberi tahu tentang penghargaan Anda untuk tahun yang akan datang.
                Tetapi Anda juga harus mematuhi prinsip panduan mereka, diantarannya:
                - Kurangnya sumber daya keuangan atau kebutuhan akan bantuan keuangan tidak menghalangi penerimaan Anda.
                - Bantuan sepenuhnya berdasarkan kebutuhan, dan kelayakan hibah ditentukan dengan cara yang sama untuk semua siswa yang diterima.
                - Siswa asing memiliki akses yang sama ke pendanaan bantuan keuangan seperti warga negara AS.
                - Mereka akan memenuhi kebutuhan keuangan Anda selama empat tahun, berdasarkan informasi yang mereka terima dari keluarga Anda setiap tahun.',
            ],
            [
                'university_id' => 1,
                'year' => '2020-12-29',
                'name' => 'Beasiswa Pascasarjana Internasional Harvard ',
                'description' => 'Untuk siswa internasional yang berencana untuk belajar di lulusan Harvard dan sekolah profesional, berikut daftar beasiswa yang saat ini ditawarkan:'
            ],
            [
                'university_id' => 1,
                'year' => '2021-01-15',
                'name' => 'The Harvard Arab Alumni Association Scholarship Fund',
                'description' => 'The Harvard Arab Alumni Association Scholarship Fund supports citizens of Arab countries, as defined by the Arab League, with a preference for students who have received their first academic degree from a school located in an Arab country. Candidates must have financial need as determined by the Harvard school in which they plan to enroll.'
            ],
            [
                'university_id' => 1,
                'year' => '2021-03-14',
                'name' => 'Hellenic Harvard Scholarship Fund',
                'description' => 'Each year, the Hellenic Harvard Foundation in Athens awards scholarships to graduate students with Greek citizenship who have been accepted for admission to Harvard University. Interested students must apply for consideration before entering the U.S. and prior to the start of their Harvard programs. Recipients are required to return to Greece upon completion of their Harvard programs. However, an allowance for a period of practical training of up to one year in the U.S. is possible.'
            ],
            [
                'university_id' => 1,
                'year' => '2021-04-17',
                'name' => 'Real Colegio Complutense Scholarships',
                'description' => 'Real Colegio Complutense Scholarships for graduate degree students are awarded each year to citizens of Spain who are admitted to or enrolled in any graduate degree program at Harvard University.

                The fellowships are awarded for one academic year, but recipients may apply for renewal for a subsequent year. Candidates must apply to and be accepted by Harvard University’s graduate or professional schools independently of this Fellowship application in order to be considered for the fellowship. Candidates do not need to know their admissions status in order to apply for this award. Admission to the University does not guarantee a Fellowship award.
                
                All students from Spain are encouraged to participate at the Real Colegio Complutense, a Spanish research center affiliated with Harvard University. For further information about RCC, please contact rcc@harvard.edu and visit the RCC website.'
            ],
            [
                'university_id' => 1,
                'year' => '2021-03-23',
                'name' => 'Frank Knox Memorial Fellowship',
                'description' => 'Frank Knox Fellowships are awarded to citizens of Australia, Canada, New Zealand, and the United Kingdom for graduate study or research at Harvard University. Interested students must apply for consideration before entering the U.S. and prior to the start of their Harvard programs. The fellowship pays tuition and health insurance fees plus a substantial living stipend, and is renewable for a second year for students in continuing degree programs. Approximately 15 new fellows are selected each year.

                Knox Fellows will be connected with each other across the university in an academic and professional network.'
            ],
            [
                'university_id' => 2,
                'year' => '2020-10-29',
                'name' => 'Beasiswa Peningkatan Prestasi Akademik (PPA)',
                'description' => "Beasiswa Peningkatan Prestasi Akademik atau disingkat PPA merupakan program beasiswa dari Kementrian Riset dan Perguruan Tinggi (Kemenristekdikti) yang ditujukan bagi mahasiswa D3, D4, atau S1 yang telah menempuh pendidikan minimal semester 2 dan dikhususkan bagi mahasiswa berprestasi yang orang tuanya tidak mampu untuk membiayai pendidikannya. Adapun besarnya dana yang diberikan oleh Direktorat Jenderal Pendidikan Tinggi sekurang-kurangnya Rp300.000 per mahasiswa per bulan.

                Pelamar yang berminat dapat mengajukan pendaftaran Beasiswa PPA dan BPP PPA 2019 – 2020 di kampus masing-masing. Jadwal pendaftaran bisa berbeda-beda di setiap kampus. Terkait persyaratan dan berkas yang harus diserahkan. Bagi mahasiswa ITS dapat menghubungi kepala bidang beasiswa yang berada di gedung BAPKM."
            ],
            [
                'university_id' => 2,
                'year' => '2020-11-25',
                'name' => 'Beasiswa Bakti BCA 2019',
                'description' => 'BCA menyediakan Beasiswa Bakti BCA bagi mahasiswa Strata Satu (S1) yang berprestasi namun terkendala pembiayaan pendidikannya. Dengan tersedianya beasiswa diharapkan dapat meningkatkan motivasi belajar dan membantu mereka menyelesaikan pendidikan.'
            ],
            [
                'university_id' => 2,
                'year' => '2020-12-15',
                'name' => 'Beasiswa Djarum',
                'description' => 'Karya Salemba Empat kembali membuka kesempatan kepada para mahasiswa untuk ikut serta dalam Program Beasiswa Reguler Karya Salemba Empat Tahun Akademik 2018/2019. Beasiswa berupa tunjangan pendidikan akan diberikan kepada program studi Strata 1 (S1) yang telah menempuh pendidikan minimal di semester kedua.'
            ],
            [
                'university_id' => 2,
                'year' => '2021-01-31',
                'name' => 'Bidikmisi ITS',
                'description' => 'BIDIKMISI adalah bantuan biaya pendidikan bagi calon mahasiswa tidak mampu secara ekonomi dan memiliki potensi akademik baik untuk menempuh pendidikan di perguruan tinggi pada program studi unggulan sampai lulus tepat waktu.
                Institut Teknologi Sepuluh Nopember sebagai perguruan tinggi negeri diamanahi oleh kemenristek dikti untuk memberikan beasiswa bidikmisi kepada mahasiswanya. Lebih dari 1000 mahasiswa ITS adalah penerima beasiswa bidikmisi.
                Program beasiswa bidikmisi di ITS berupa gratis pembayaran UKT dan berhak menerima uang sejumlah Rp.650.000 per bulan. Program ini diperuntukan untuk mahasiswa S1 dan Vokasi berbagai jurusan.
                Bagi mahasiswa yang tidak lolos ataupun belum mendaftar bidikmisi pada tahun pertama. Dapat mengajukan beasiswa bidikmisi pengganti pada tahun kedua. Untuk prosedur pengajuan beasiswa bidikmisi pengganti dapat menemui kepala bidang beasiswa yang terletak pada BAPKM.'
            ],
            [
                'university_id' => 2,
                'year' => '2021-03-14',
                'name' => 'Beasiswa IKA ITS',
                'description' => "Institut Teknologi Sepuluh Nopember (ITS) adalah salah satu perguruan teknologi terbaik di
                Indonesia dan telah menghasilkan 100.000 lulusan dan tersebar diberbagai bidang
                pengabdian. Ikatan Alumni ITS (IKA-ITS) sebagai wadah satu-satunya tempat berhimpun Alumni ITS yang memiliki struktur kepengurusan di tingkat pusat mendukung/memfasilitasi kebutuhan alumni maupun turut meningkatkan kualitas pendidikan di kampus ITS, salah satunya melalui
                program Beasiswa IKA ITS.
                
                SYARAT PENGAJUAN PERMOHONAN BEASISWA
                1. Mahasiswa/i aktif dan berkebangsaan Indonesia
                2. Program Sarjana (S-1) & Diploma III (D-3)
                3. Minimum Semester 1 (satu) atau tahun ajaran pertama
                4. Mempunyai rekening bank yang aktif atas nama sendiri (BNI/MANDIRI)
                5. Melakukan pendaftaran di SIM Beasiswa
                
                FASILITAS BEASISWA
                Beasiswa diberikan dalam bentuk :
                a. Biaya hidup 6 juta/tahun
                b. Beasiswa diberikan untuk tahun 2019 (semester genap & semester gasal) dan evaluasi
                akan dilakukan pada akhir semester."
            ],
            [
                'university_id' => 3,
                'year' => '2020-10-27',
                'name' => 'Hill Foundation Scholarships',
                'description' => "The Hill Foundation Scholarships fund Russian students to study for any graduate and second BA courses at Oxford. For information about the scholarships for graduate degrees, please refer to the Hill Foundation webpage for graduate applicants.

                Am I eligible?
                You must be applying to start a ‘second first degree’ at Oxford.
                
                You must be a national of and ordinarily resident in the Russian Federation. You must also have a first degree from a Russian university, and you must not subsequently have been enrolled in any other degree programme outside of Russia.
                
                The trustees favour candidates who demonstrate extremely high academic ability and personal and social qualities of a high order. They seek applicants who intend to develop their careers in their homeland and who wish to spend their lives in ways that are beneficial to their home society, whether in business, academic life, public service, the arts or the professions. The trustees will use the information that you provide in your application form to assess how you meet these criteria.
                
                If you are offered this scholarship, you will be required to confirm that you will return to Russia for at least one year, following completion of your studies in the UK.
                
                Scholarships will be awarded on the basis of academic merit.
                
                Please ensure that you meet the selection criteria for your course (see the Course Listing for more information). 
                
                What does it cover?
                The scholarship will cover 100% of course fees and a grant for living costs. Awards are made for the full duration of your fee liability for the agreed course.
                
                How do I apply?
                Applications for 2021 entry are now closed. Details on how to apply for 2022 entry will be made available on this page in January 2022.
                For 2021 entry applicants who applied by the 10 February 2021 scholarship deadline, the selection process will be undertaken in March 2021.
                Applicants will be informed of the outcome of their application in April 2021.
                Further information
                Scholars will be expected to write an annual report about their academic and social activities, and achievements at the University.
                Receipt of the award in subsequent years is subject to satisfactory academic progress.
                Applicants should be aware that competition for the scheme is very high and the University does not have additional funding for those candidates who are not offered a scholarship.
                If you hold an offer for deferred entry for an undergraduate course at Oxford, and you’d like to apply for a scholarship, please apply for the scholarship in January of the year you will start your Oxford course (eg in January 2022 if you hold an offer to start in October 2022). We can only consider applications for undergraduate scholarships once."
            ],
            [
                'university_id' => 3,
                'year' => '2020-11-20',
                'name' => 'The Bright Oceans Corporation Scholarship',
                'description' => 'The Bright Oceans Corporation Scholarships have been established by the Bright Oceans Corporation to provide funding for undergraduate students from China demonstrating exceptional academic merit who may be prevented from taking up their course of study due to financial circumstances, commencing a course of study in the Mathematical, Physical and Life Sciences Division.'
            ],
            [
                'university_id' => 3,
                'year' => '2021-01-25',
                'name' => 'Oxford Centre for Islamic Studies Scholarship',
                'description' => 'This scholarship has been established by the Oxford Centre for Islamic Studies to provide funding for UK students from Muslim communities. The Centre is a Recognised Independent Centre of the University of Oxford and was established in 1985 to encourage the scholarly study of Islam and the Islamic world. The Centre provides a meeting point for the Western and Islamic worlds of learning. At Oxford it contributes to the multi-disciplinary and cross-disciplinary study of the Islamic world. Beyond Oxford, its role is strengthened by a developing international network of academic contacts.'
            ],
            [
                'university_id' => 3,
                'year' => '2021-03-31',
                'name' => 'Reach Oxford Scholarship',
                'description' => 'Students should note they must apply for admission to the University before they can be considered for a Reach Oxford Scholarship. The University is unable to consider any scholarship applications from students who have not been offered a place at Oxford. The University is not responsible for the content of external sites advertising the scheme and would encourage applicants to read the following details to check their eligibility.

                A number of Reach Oxford scholarships (formerly Oxford Student Scholarships) are offered to students from low-income countries who, for political or financial reasons, or because suitable educational facilities do not exist, cannot study for a degree in their own countries.'
            ],
            [
                'university_id' => 3,
                'year' => '2020-04-30',
                'name' => 'Simon and June Li Undergraduate Scholarship',
                'description' => 'These scholarships have been established by Simon and June Li to provide funding for undergraduate students demonstrating exceptional academic merit who may be prevented from taking up their course of study due to financial circumstances. Up to two scholarships will be available.'
            ],
            [
                'university_id' => 3,
                'year' => '2021-02-27',
                'name' => 'The Oxford-Arlan Hamilton & Earline Butler Sims Scholarship',
                'description' => "The scholarship, is available to UK undergraduates of Black African and Caribbean heritage who come from disadvantaged backgrounds. The programme is funded by the generosity of Arlan Hamilton, an international entrepreneur assisting underrepresented business founders.

                The Oxford-Arlan Hamilton & Earline Butler Sims Scholarship, named in part as a living tribute to Arlan’s mother, will provide one award for 2021 entry covering annual fees and living costs, and an internship grant to support a placement opportunity during a scholar's course. One scholarship will also be available for 2022 entry."
            ],
        ];
        
        foreach($scholarships as $scholarship){
            UniversityScholarship::create(array_merge($scholarship, [
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]));
        }
    }
}
