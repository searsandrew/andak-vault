<?php

namespace App\Console\Commands;

use App\Models\Product;
use App\Models\Property;
use App\Models\Type;
use Illuminate\Console\Command;
use function Laravel\Prompts\error;
use function Laravel\Prompts\info;
use function Laravel\Prompts\select;
use function Laravel\Prompts\text;

class CreateProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vault:create-product';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add a new product to a property.';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $name = text(
            label: 'What is the name of this product?',
            required: true
        );

        if(Property::all()->count() < 1)
        {
            error('No properties have been setup');
            $this->call('vault:create-property');
        }

        $property = select(
            label: 'Which property does this product belong to?',
            options: Property::pluck('name', 'id'),
            scroll: 10
        );

        if(Type::all()->count() < 1)
        {
            error('No types have been setup');
            $this->call('vault:create-type');
        }

        $type = select(
            label: 'What type of product is this?',
            options: Type::pluck('name', 'id'),
            scroll: 10
        );

        if(Product::create([
            'name' => $name,
            'property_id' => $property,
            'type_id' => $type,
        ])) {
            info('New product has been added.');
        }
    }
}
