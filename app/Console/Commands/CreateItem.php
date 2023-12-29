<?php

namespace App\Console\Commands;

use App\Models\Item;
use App\Models\Product;
use App\Models\Property;
use App\Models\Type;
use Carbon\Carbon;
use Illuminate\Console\Command;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;
use function Laravel\Prompts\error;
use function Laravel\Prompts\info;
use function Laravel\Prompts\select;
use function Laravel\Prompts\text;

class CreateItem extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vault:create-item';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add an item to the vault';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if(Type::all()->count() < 1)
        {
            error('No types have been setup');
            $this->call('vault:create-type');
        }

        $type = select(
            label: 'What type of item are you adding to the vault?',
            options: Type::pluck('name', 'id'),
            scroll: 10
        );

        $typeName = Type::find($type)->name;

        if(Property::all()->count() < 1)
        {
            error('No properties have been setup');
            $this->call('vault:create-property');
        }

        $property = select(
            label: 'Which Andak property does this belong to?',
            options: Property::pluck('name', 'id'),
            scroll: 10
        );

        if(Product::all()->count() < 1)
        {
            error('No products have been setup');
            $this->call('vault:create-product');
        }

        $product = select(
            label: 'Which product does this come from:',
            options: Property::find($property)->products->pluck('name', 'id'),
            scroll: 10
        );

        $itemName = text(
            label: 'What is the name of this ' . $typeName . '?',
            required: true
        );

        $itemNumber = text(
            label: 'What is this ' . Str::plural($typeName) . ' component number?',
            required: true
        );

        $itemRating = select(
            label: 'What is the quality rating for this ' . $typeName . '?',
            options: ['GEM-MT', 'Mint', 'NM-MT', 'NM', 'EX-MT', 'EX', 'VG-EX', 'VG', 'GOOD', 'FR', 'PR'],
            default: 'GEM-MT'
        );

        $signedAt = text(
            label: 'If signed, what date was this item signed?',
            default: 0,
            required: true,
            hint: 'Leave a 0 for false if item is not signed'
        );

        if(Item::create([
            'type_id' => $type,
            'property_id' => $property,
            'product_id' => $product,
            'item_name' => $itemName,
            'item_number' => $itemNumber,
            'item_rating' => $itemRating,
            'signed_at' => $signedAt != 0 ? Carbon::parse($signedAt)->toDateTime() : NULL,
        ])) {
            info('New item has been added.');
            return true;
        }
    }
}
