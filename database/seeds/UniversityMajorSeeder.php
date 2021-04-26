<?php

use App\Models\UniversityMajor;
use App\Models\MasterMajor;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UniversityMajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $university_majors = [
            ['university_id' => 1, 'faculty_id' => 1, 'name' => 'Business Administration', 'level' => 'Associate Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 1, 'faculty_id' => 1, 'name' => 'Business Administration', 'level' => 'Master Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 1, 'faculty_id' => 1, 'name' => 'MS/MBA', 'level' => 'Master Degrees', 'accreditation' => null, 'description' => null],
            
            ['university_id' => 1, 'faculty_id' => 2, 'name' => 'African and African American Studies', 'level' => 'Associate Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 1, 'faculty_id' => 2, 'name' => 'Anthropology', 'level' => 'Master Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 1, 'faculty_id' => 2, 'name' => 'American Studies', 'level' => 'Doctor Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 1, 'faculty_id' => 2, 'name' => 'Archaeology', 'level' => 'Doctor Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 1, 'faculty_id' => 2, 'name' => 'Architecture, Landscape Architecture, and Urban Planning', 'level' => 'Doctor Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 1, 'faculty_id' => 2, 'name' => 'Astronomy', 'level' => 'Doctor Degrees', 'accreditation' => null, 'description' => null],
            
            ['university_id' => 1, 'faculty_id' => 3, 'name' => 'Architecture', 'level' => 'Master Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 1, 'faculty_id' => 3, 'name' => 'Landscape Architecture', 'level' => 'Master Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 1, 'faculty_id' => 3, 'name' => 'Design Studies', 'level' => 'Master Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 1, 'faculty_id' => 3, 'name' => 'Master in Design Engineering', 'level' => 'Master Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 1, 'faculty_id' => 3, 'name' => 'Urban Planning and Design', 'level' => 'Master Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 1, 'faculty_id' => 3, 'name' => 'Design', 'level' => 'Doctor Degrees', 'accreditation' => null, 'description' => null],
            
            ['university_id' => 1, 'faculty_id' => 4, 'name' => 'Bioethics', 'level' => 'Master Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 1, 'faculty_id' => 4, 'name' => 'Biomedical Informatics', 'level' => 'Master Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 1, 'faculty_id' => 4, 'name' => 'Clinical Investigation', 'level' => 'Master Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 1, 'faculty_id' => 4, 'name' => 'Clinical Service Operations', 'level' => 'Master Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 1, 'faculty_id' => 4, 'name' => 'Global Health Delivery', 'level' => 'Master Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 1, 'faculty_id' => 4, 'name' => 'Healthcare Quality and Safety', 'level' => 'Master Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 1, 'faculty_id' => 4, 'name' => 'Immunology', 'level' => 'Master Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 1, 'faculty_id' => 4, 'name' => 'Immunology', 'level' => 'Doctor Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 1, 'faculty_id' => 4, 'name' => 'Medical Education', 'level' => 'Master Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 1, 'faculty_id' => 4, 'name' => 'Medicine', 'level' => 'Doctor Degrees', 'accreditation' => null, 'description' => null],
            
            ['university_id' => 1, 'faculty_id' => 5, 'name' => 'Divinity', 'level' => 'Master Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 1, 'faculty_id' => 5, 'name' => 'Religion', 'level' => 'Master Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 1, 'faculty_id' => 5, 'name' => 'Religion', 'level' => 'Doctor Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 1, 'faculty_id' => 5, 'name' => 'Theology', 'level' => 'Master Degrees', 'accreditation' => null, 'description' => null],
            
            ['university_id' => 1, 'faculty_id' => 6, 'name' => 'Law', 'level' => 'Master Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 1, 'faculty_id' => 6, 'name' => 'Law', 'level' => 'Doctor Degrees', 'accreditation' => null, 'description' => null],
            
            ['university_id' => 1, 'faculty_id' => 7, 'name' => 'Education Leadership, Organizations, and Entrepreneurship', 'level' => 'Master Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 1, 'faculty_id' => 7, 'name' => 'Education Policy and Analysis', 'level' => 'Master Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 1, 'faculty_id' => 7, 'name' => 'Human Development and Education', 'level' => 'Master Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 1, 'faculty_id' => 7, 'name' => 'Learning Design, Innovation, and Technology', 'level' => 'Master Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 1, 'faculty_id' => 7, 'name' => 'Teaching and Teacher Leadership', 'level' => 'Master Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 1, 'faculty_id' => 7, 'name' => 'Education', 'level' => 'Doctor Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 1, 'faculty_id' => 7, 'name' => 'Education Leadership', 'level' => 'Doctor Degrees', 'accreditation' => null, 'description' => null],
            
            ['university_id' => 1, 'faculty_id' => 8, 'name' => 'Dental Public Health', 'level' => 'Master Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 1, 'faculty_id' => 8, 'name' => 'Dental Public Health', 'level' => 'Doctor Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 1, 'faculty_id' => 8, 'name' => 'Health Care Management', 'level' => 'Master Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 1, 'faculty_id' => 8, 'name' => 'Public Health', 'level' => 'Master Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 1, 'faculty_id' => 8, 'name' => 'Public Health', 'level' => 'Doctor Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 1, 'faculty_id' => 8, 'name' => 'Public Health in Epidemiology', 'level' => 'Master Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 1, 'faculty_id' => 8, 'name' => 'Public Health Research', 'level' => 'Master Degrees', 'accreditation' => null, 'description' => null],
            
            ['university_id' => 1, 'faculty_id' => 9, 'name' => 'Public Administration', 'level' => 'Master Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 1, 'faculty_id' => 9, 'name' => 'Public Administration in International Development', 'level' => 'Master Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 1, 'faculty_id' => 9, 'name' => 'Public Policy', 'level' => 'Master Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 1, 'faculty_id' => 9, 'name' => 'Public Policy', 'level' => 'Doctor Degrees', 'accreditation' => null, 'description' => null],
            
            ['university_id' => 2, 'faculty_id' => 1, 'name' => 'Physics', 'level' => 'Associate Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 1, 'name' => 'Physics', 'level' => 'Master Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 1, 'name' => 'Physics', 'level' => 'Doctor Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 1, 'name' => 'Mathematics', 'level' => 'Associate Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 1, 'name' => 'Mathematics', 'level' => 'Master Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 1, 'name' => 'Mathematics', 'level' => 'Doctor Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 1, 'name' => 'Mathematics', 'level' => 'International Program', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 1, 'name' => 'Statistics', 'level' => 'Associate Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 1, 'name' => 'Statistics', 'level' => 'Master Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 1, 'name' => 'Statistics', 'level' => 'Doctor Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 1, 'name' => 'Statistics', 'level' => 'International Program', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 1, 'name' => 'Chemistry', 'level' => 'Associate Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 1, 'name' => 'Chemistry', 'level' => 'Doctor Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 1, 'name' => 'Chemistry', 'level' => 'Master Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 1, 'name' => 'Biology', 'level' => 'Associate Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 1, 'name' => 'Biology', 'level' => 'Master Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 1, 'name' => 'Actuarial', 'level' => 'Associate Degrees', 'accreditation' => null, 'description' => null],
            
            ['university_id' => 2, 'faculty_id' => 2, 'name' => 'Mechanical Engineering', 'level' => 'Doctor Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 2, 'name' => 'Mechanical Engineering', 'level' => 'International Program', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 2, 'name' => 'Chemical Engineering', 'level' => 'Associate Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 2, 'name' => 'Chemical Engineering', 'level' => 'Master Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 2, 'name' => 'Chemical Engineering', 'level' => 'International Program', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 2, 'name' => 'Physics Technic', 'level' => 'Associate Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 2, 'name' => 'Physics Technic', 'level' => 'Master Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 2, 'name' => 'Physics Technic', 'level' => 'Doctor Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 2, 'name' => 'Physics Technic', 'level' => 'International Program', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 2, 'name' => 'Systems & Industrial Engineering', 'level' => 'Associate Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 2, 'name' => 'Systems & Industrial Engineering', 'level' => 'Master Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 2, 'name' => 'Systems & Industrial Engineering', 'level' => 'Doctor Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 2, 'name' => 'Systems & Industrial Engineering', 'level' => 'International Program', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 2, 'name' => 'Material & Metallurgy Engineering', 'level' => 'Associate Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 2, 'name' => 'Material & Metallurgy Engineering', 'level' => 'Master Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 2, 'name' => 'Material & Metallurgy Engineering', 'level' => 'International Program', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 2, 'name' => 'Food Engineering', 'level' => 'Associate Degrees', 'accreditation' => null, 'description' => null],
            
            ['university_id' => 2, 'faculty_id' => 3, 'name' => 'Civil Engineering', 'level' => 'Associate Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 3, 'name' => 'Civil Engineering', 'level' => 'Master Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 3, 'name' => 'Architecture', 'level' => 'Associate Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 3, 'name' => 'Architecture', 'level' => 'Master Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 3, 'name' => 'Architecture', 'level' => 'Doctor Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 3, 'name' => 'Architecture', 'level' => 'International Program', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 3, 'name' => 'Environmental Engineering', 'level' => 'Associate Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 3, 'name' => 'Environmental Engineering', 'level' => 'Master Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 3, 'name' => 'Environmental Engineering', 'level' => 'Doctor Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 3, 'name' => 'Environmental Engineering', 'level' => 'International Program', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 3, 'name' => 'Urban And Regional Planning', 'level' => 'Associate Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 3, 'name' => 'Urban And Regional Planning', 'level' => 'International Program', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 3, 'name' => 'Geomatics Engineering', 'level' => 'Associate Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 3, 'name' => 'Geomatics Engineering', 'level' => 'Master Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 3, 'name' => 'Geomatics Engineering', 'level' => 'International Program', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 3, 'name' => 'Geophysical Engineering Department', 'level' => 'Associate Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 3, 'name' => 'Geophysical Engineering Department', 'level' => 'International Program', 'accreditation' => null, 'description' => null],
            
            ['university_id' => 2, 'faculty_id' => 4, 'name' => 'Naval Architecture', 'level' => 'Associate Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 4, 'name' => 'Naval Architecture', 'level' => 'Master Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 4, 'name' => 'Naval Architecture', 'level' => 'Doctor Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 4, 'name' => 'Naval Architecture', 'level' => 'International Program', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 4, 'name' => 'Marine Engineering', 'level' => 'Associate Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 4, 'name' => 'Marine Engineering', 'level' => 'Master Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 4, 'name' => 'Marine Engineering', 'level' => 'Doctor Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 4, 'name' => 'Marine Engineering', 'level' => 'International Program', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 4, 'name' => 'Ocean Engineering', 'level' => 'Associate Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 4, 'name' => 'Ocean Engineering', 'level' => 'Master Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 4, 'name' => 'Ocean Engineering', 'level' => 'Doctor Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 4, 'name' => 'Ocean Engineering', 'level' => 'International Program', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 4, 'name' => 'Marine Transportation Engineering', 'level' => 'Associate Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 4, 'name' => 'Marine Transportation Engineering', 'level' => 'Master Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 4, 'name' => 'Marine Transportation Engineering', 'level' => 'Doctor Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 4, 'name' => 'Offshore Engineering', 'level' => 'Associate Degrees', 'accreditation' => null, 'description' => null],
            
            ['university_id' => 2, 'faculty_id' => 5, 'name' => 'Electrical Engineering', 'level' => 'Associate Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 5, 'name' => 'Electrical Engineering', 'level' => 'Master Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 5, 'name' => 'Electrical Engineering', 'level' => 'Doctor Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 5, 'name' => 'Electrical Engineering', 'level' => 'International Program', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 5, 'name' => 'Biomedical Engineering', 'level' => 'Associate Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 5, 'name' => 'Computer Engineering', 'level' => 'Associate Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 5, 'name' => 'Informatics', 'level' => 'Associate Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 5, 'name' => 'Informatics', 'level' => 'Master Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 5, 'name' => 'Informatics', 'level' => 'Doctor Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 5, 'name' => 'Informatics', 'level' => 'International Program', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 5, 'name' => 'Information Systems', 'level' => 'Associate Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 5, 'name' => 'Information Systems', 'level' => 'Master Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 5, 'name' => 'Information Systems', 'level' => 'Doctor Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 5, 'name' => 'Information Systems', 'level' => 'International Program', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 5, 'name' => 'Information Technology', 'level' => 'Associate Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 5, 'name' => 'Information Technology', 'level' => 'Master Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 5, 'name' => 'Information Technology', 'level' => 'Doctor Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 5, 'name' => 'Information Technology', 'level' => 'International Program', 'accreditation' => null, 'description' => null],
            
            ['university_id' => 2, 'faculty_id' => 6, 'name' => 'Technology Management', 'level' => 'Master Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 6, 'name' => 'Technology Management', 'level' => 'Doctor Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 6, 'name' => 'Business Management', 'level' => 'Associate Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 6, 'name' => 'Business Management', 'level' => 'Master Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 6, 'name' => 'Business Management', 'level' => 'International Program', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 6, 'name' => 'Industrial Design', 'level' => 'Associate Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 6, 'name' => 'Interior Design', 'level' => 'Associate Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 6, 'name' => 'Visual Communication Design', 'level' => 'Associate Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 6, 'name' => 'Development', 'level' => 'Associate Degrees', 'accreditation' => null, 'description' => null],

            ['university_id' => 2, 'faculty_id' => 7, 'name' => 'Civil Infrastructure Engineering', 'level' => 'Associate Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 7, 'name' => 'Civil Infrastructure Engineering', 'level' => 'Master Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 7, 'name' => 'Civil Infrastructure Engineering', 'level' => 'Doctor Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 7, 'name' => 'Civil Infrastructure Engineering', 'level' => 'International Program', 'accreditation' => null, 'description' => null],

            ['university_id' => 2, 'faculty_id' => 7, 'name' => 'Industrial Mechanical Engineering', 'level' => 'Associate Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 7, 'name' => 'Industrial Mechanical Engineering', 'level' => 'Master Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 7, 'name' => 'Industrial Mechanical Engineering', 'level' => 'Doctor Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 7, 'name' => 'Industrial Mechanical Engineering', 'level' => 'International Program', 'accreditation' => null, 'description' => null],
            
            ['university_id' => 2, 'faculty_id' => 7, 'name' => 'Automation Electronic Engineering', 'level' => 'Associate Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 7, 'name' => 'Automation Electronic Engineering', 'level' => 'Master Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 7, 'name' => 'Automation Electronic Engineering', 'level' => 'Doctor Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 7, 'name' => 'Automation Electronic Engineering', 'level' => 'International Program', 'accreditation' => null, 'description' => null],

            ['university_id' => 2, 'faculty_id' => 7, 'name' => 'Industrial Chemical Engineering', 'level' => 'Associate Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 7, 'name' => 'Industrial Chemical Engineering', 'level' => 'Master Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 7, 'name' => 'Industrial Chemical Engineering', 'level' => 'Doctor Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 7, 'name' => 'Industrial Chemical Engineering', 'level' => 'International Program', 'accreditation' => null, 'description' => null],

            ['university_id' => 2, 'faculty_id' => 7, 'name' => 'Instrumentation Engineering', 'level' => 'Associate Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 7, 'name' => 'Instrumentation Engineering', 'level' => 'Master Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 7, 'name' => 'Instrumentation Engineering', 'level' => 'Doctor Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 7, 'name' => 'Instrumentation Engineering', 'level' => 'International Program', 'accreditation' => null, 'description' => null],

            ['university_id' => 2, 'faculty_id' => 7, 'name' => 'Business Statistics', 'level' => 'Associate Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 7, 'name' => 'Business Statistics', 'level' => 'Master Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 7, 'name' => 'Business Statistics', 'level' => 'Doctor Degrees', 'accreditation' => null, 'description' => null],
            ['university_id' => 2, 'faculty_id' => 7, 'name' => 'Business Statistics', 'level' => 'International Program', 'accreditation' => null, 'description' => null],
        ];

        foreach($university_majors as $univ_major){
          $master = MasterMajor::where('name', $univ_major['name'])->first();

          if (!$master) {
            $master = MasterMajor::create([
              'name' => $univ_major['name'],
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now(),
              ]);
          }

          UniversityMajor::create(array_merge($univ_major, [
            'master_id' => $master->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
          ]));

        }
    }
}
