<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Delivery;
use App\Models\Item;
use App\Models\DeliveryItem;

class DeliveryItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $deliveries = Delivery::all();
        $items = Item::all();

        foreach ($deliveries as $delivery) {
            $itemCount = rand(1, min(5, $items->count()));
            $selectedItems = $items->random($itemCount);
            foreach ($selectedItems as $item) {
                DeliveryItem::create([
                    'delivery_id' => $delivery->id,
                    'item_id' => $item->id,
                ]);
            }
        }
    }
}