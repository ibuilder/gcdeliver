<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DailyReport;
use App\Models\ManpowerEntry;
use Faker\Factory as Faker;

class ManpowerEntrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $dailyReports = DailyReport::all();
        $trades = ['Carpenter', 'Electrician', 'Plumber', 'Mason', 'Painter', 'Laborer'];

        foreach ($dailyReports as $dailyReport) {
            $entryCount = rand(1, 5);
            for ($i = 0; $i < $entryCount; $i++) {
                ManpowerEntry::create([
                    'daily_report_id' => $dailyReport->id,
                    'trade' => $faker->randomElement($trades),
                    'quantity' => $faker->numberBetween(1, 20),
                ]);
            }
        }
    }
}