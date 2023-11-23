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
        $url = "https://www.googleapis.com/calendar/v3/calendars/en.ke%23holiday%40group.v.calendar.google.com/events?key=" . env('GOOGLE_API_KEY');
        $holidays = json_decode(file_get_contents($url), true)['items'];
        foreach ($holidays as $holiday) {
            Holiday::create([
              'summary' => $holiday['summary'],
              'description' => $holiday['description'],
              'start_date' => Carbon::parse($holiday['start']['date']),
              'end_date' => Carbon::parse($holiday['end']['date']),
            ]);
        }
    }
}
