<?php

namespace App\Console\Commands;

use App\Models\Property;
use Illuminate\Console\Command;
use function Laravel\Prompts\info;
use function Laravel\Prompts\text;

class CreateProperty extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vault:create-property';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add a new property to the vault';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = text(
            label: 'What is the name of this property?',
            required: true
        );

        if(Property::create([
            'name' => $name,
        ])) {
            info('New property has been added.');
        }
    }
}
