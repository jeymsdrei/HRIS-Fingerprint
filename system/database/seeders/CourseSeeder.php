<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * All unique academic programs extracted from the Teaching Load Appointment
     * documents (2nddata.md and entiredata.md).
     *
     * Format: [code, name]
     */
    protected array $courses = [
        // Bachelor of Science in Business Administration
        ['BSBA-HRM', 'Bachelor of Science in Business Administration major in Human Resource Management'],
        ['BSBA-FM', 'Bachelor of Science in Business Administration major in Financial Management'],
        ['BSBA-MM', 'Bachelor of Science in Business Administration major in Marketing Management'],

        // Bachelor of Science in Hospitality Management
        ['BSHM', 'Bachelor of Science in Hospitality Management'],

        // Bachelor of Science in Computer Science
        ['BSCS', 'Bachelor of Science in Computer Science'],

        // Education programs
        ['BEED', 'Bachelor of Elementary Education'],
        ['BSNED', 'Bachelor of Special Needs Education'],
        ['BSED-ENG', 'Bachelor of Secondary Education major in English'],
        ['BSED-FIL', 'Bachelor of Secondary Education major in Filipino'],
        ['BSED-MATH', 'Bachelor of Secondary Education major in Mathematics'],
        ['BSED-SS', 'Bachelor of Secondary Education major in Social Studies'],

        // Technical-Vocational Teacher Education
        ['BTVTED', 'Bachelor of Technical-Vocational Teacher Education'],
        ['BTVTED-ELT', 'Bachelor of Technical-Vocational Teacher Education major in Electronics Technology'],
        ['BTVTED-AT', 'Bachelor of Technical-Vocational Teacher Education major in Automotive Technology'],
        ['BTVTED-FSM', 'Bachelor of Technical-Vocational Teacher Education major in Food Service Management'],

        // Senior High School
        ['SHS', 'Senior High School'],
    ];

    public function run(): void
    {
        foreach ($this->courses as [$code, $name]) {
            Course::updateOrCreate(
                ['code' => $code],
                ['name' => $name]
            );
        }

        $this->command?->info('Courses seeded: ' . count($this->courses) . ' programs.');
    }
}
