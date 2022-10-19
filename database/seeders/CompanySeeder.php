<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $company1= Company::create([
            'company_name'=>'Big Coporation',
            'company_email'=>'thiscompany@bigcooporation.com'
         ]);
    }
}
