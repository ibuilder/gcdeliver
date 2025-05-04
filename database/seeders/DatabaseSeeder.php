<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            PartnerSeeder::class,
            ProjectSeeder::class,
            ItemSeeder::class,
            DeliverySeeder::class,
            ScheduleSeeder::class,
            DailyReportSeeder::class,
            ItemPartnerSeeder::class,
            DeliveryItemSeeder::class,
            ActivityDependencySeeder::class,
            ManpowerEntrySeeder::class
        ]);
    }
}