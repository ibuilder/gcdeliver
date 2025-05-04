<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;
use App\Models\Partner;
use App\Models\ItemPartner;

class ItemPartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = Item::all();
        $partners = Partner::all();

        foreach ($items as $item) {
            $partnerCount = rand(1, min(3, $partners->count()));
            $selectedPartners = $partners->random($partnerCount);
            foreach ($selectedPartners as $partner) {
                ItemPartner::create([
                    'item_id' => $item->id,
                    'partner_id' => $partner->id,
                ]);
            }
        }
    }
}