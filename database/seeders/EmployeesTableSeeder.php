<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departements = ['Human Resources', 'Finance', 'Marketing', 'IT', 'Operations'];
        $sections = ['HRD', 'Production', 'Sales', 'PPIC', 'IT', 'Purchasing', 'Design', 'Quality Control', 'Quality Assurance', 'General Affairs', 'General Maintenance', 'Engineering'];
        $religions = ['Islam', 'Christianity', 'Hinduism', 'Buddhism', 'Other'];
        $educations = ['High School', 'Bachelor\'s Degree', 'Master\'s Degree', 'PhD'];
        $status = ['PKWT', 'Permanent', 'Intern'];
        $blood = ['A','AB','O','B'];
        $golongan = ['Gol 1','Gol 2','Gol 3','Gol 4'];

        $generatedNiks = [];

        for ($i = 1; $i <= 500000; $i++) {
            do {
                $nik = sprintf('%06d', rand(1, 999999));
            } while (in_array($nik, $generatedNiks));

            $generatedNiks[] = $nik;
            Employee::create([
                'nik' => $nik,
                'name' => $this->generateRandomName(),
                'departement' => $departements[array_rand($departements)],
                'section' => $sections[array_rand($sections)],
                'hire_date' => now()->subDays(rand(1, 365)),
                'birth_date' => now()->subYears(rand(20, 60)),
                'golongan' => $golongan[array_rand($golongan)],
                'religion' => $religions[array_rand($religions)],
                'education' => $educations[array_rand($educations)],
                'blood_type' => $blood[array_rand($blood)],
                'email' => $this->generateRandomName().'@bumn.com',
                'emp_status' => $status[array_rand($status)],
                'salary' => rand(3000, 10000) * 1000, // Gaji antara 3000 hingga 7000
            ]);
        }
    }
    private function generateRandomName()
    {
        $firstNames = ['John', 'Jane', 'Michael', 'Emily', 'David', 'Emma', 'Chris', 'Olivia'];
        $lastNames = ['Smith', 'Johnson', 'Williams', 'Jones', 'Brown', 'Davis', 'Miller', 'Wilson'];

        $firstName = $firstNames[array_rand($firstNames)];
        $lastName = $lastNames[array_rand($lastNames)];

        return $firstName . ' ' . $lastName;
    }
}
