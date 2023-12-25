<?php

namespace App\Console\Commands;

use App\Models\Type;
use Illuminate\Console\Command;
use function Laravel\Prompts\text;
use function Laravel\Prompts\info;
use function Laravel\Prompts\error;

class CreateType extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vault:create-type';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add a new type of vault object';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = text(
            label: 'What is this type\'s name?',
            required: true
        );


        if(Type::create([
            'name' => $name,
        ])) {
            info('New type has been added.');
        }

    }
}
