<?php

namespace Database\Seeders;

use DB;
use Faker\Factory as Faker;
use Hash;
use Illuminate\Database\Seeder;

class EmployeesSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $faker = Faker::create('App\Models\Employees');
        for ($i = 1; $i <= 10; $i++) {
            DB::table('employees')->insert([

                'StaffName'        => $faker->unique()->name,
                'AccountName'      => $faker->unique()->name,
                'PhoneNumber'      => $faker->unique()->phoneNumber,
                'Email'            => $faker->unique()->email,
                'ContractExpiry'   => '2021-11-14',
                'Nationality'      => "Ugandan",
                'LocalAddress'     => $faker->address(),
                'PermanentAddress' => $faker->address(),
                'Designation'      => $faker->word(8) . " Specialist",
                'Department'       => "Human Resource Department",
                'DOB'              => "1989-09-21",
                'NIN'              => 'UGA' . $faker->numerify('#######'),
                'TIN'              => 'URA' . $faker->numerify('#######'),
                'AccountNumber'    => rand(0, 99) . $faker->numerify('##########'),
                'StaffCode'        => $faker->numerify('#####') . "AFC",
                'MonthlySalary'    => $faker->numerify('#######'),
                'BankCode'         => $faker->numerify('########'),
                'EmpID'            => Hash::make(\Carbon\Carbon::now()),
                'created_at'       => \Carbon\Carbon::now(),
                'JoiningDate'      => '2021-09-21',
                'BankName'         => $faker->firstName() . " Bank",
                'BankBranch'       => "Kampala Branch",
                'IDScan'           => "storage/avDNk6EPXawr7frK4qM63W3S8ZtFbXaBY7y4Kt85.png",
                'StaffPhoto'       => "storage/avDNk6EPXawr7frK4qM63W3S8ZtFbXaBY7y4Kt85.png",

            ]);

        }
    }
}
