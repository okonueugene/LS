<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Holiday;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HolidaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $year=date("Y");

        $holiday= Holiday::create([
            'name'=>'New Years Day',
            'date'=>Carbon::parse($year.'-01-01')
         ]);
        $holiday1= Holiday::create([
           'name'=>'Good Friday',
           'date'=>Carbon::parse($year.'-04-07')
        ]);
        $holiday2= Holiday::create([
           'name'=>'Easter Monday',
           'date'=>Carbon::parse($year.'-04-10')
        ]);
        $holiday3= Holiday::create([
           'name'=>'Labour Day',
           'date'=>Carbon::parse($year.'-05-01')
        ]);
        $holiday4= Holiday::create([
           'name'=>'Madaraka Day',
           'date'=>Carbon::parse($year.'-06-01')
        ]);
        $holiday5= Holiday::create([
           'name'=>'Huduma Day',
           'date'=>Carbon::parse($year.'-10-10')
        ]);
        $holiday6= Holiday::create([
           'name'=>'Mashujaa Day',
           'date'=>Carbon::parse($year.'-10-20')
        ]);
        $holiday7= Holiday::create([
           'name'=>'Jamhuri Day',
           'date'=>Carbon::parse($year.'-12-12')
        ]);
        $holiday8= Holiday::create([
           'name'=>'Christmas Day',
           'date'=>Carbon::parse($year.'-12-25')
        ]);
        $holiday9= Holiday::create([
           'name'=>'Utamaduni Day',
           'date'=>Carbon::parse($year.'-12-26')
        ]);
    }
}
