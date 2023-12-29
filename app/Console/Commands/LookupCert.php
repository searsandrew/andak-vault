<?php

namespace App\Console\Commands;

use App\Models\Item;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Contracts\Console\PromptsForMissingInput;
use Illuminate\Support\Str;
use function Laravel\Prompts\confirm;
use function Laravel\Prompts\select;
use function Laravel\Prompts\error;
use function Laravel\Prompts\info;
use function Laravel\Prompts\text;

class LookupCert extends Command implements PromptsForMissingInput
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vault:lookup-cert
                            {cert : Certificate ID number}
                            {--invalidate : Remove Certificate from Web lookup}
                            {--search : Search for a specific Certificate}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    protected function promptForMissingArgumentsUsing()
    {
        return [
            'cert' => 'Which Certificate would you like to manage?',
        ];
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $certificate = Item::where('cert_id', $this->argument('cert'))->first();
        if(is_null($certificate))
        {
            error('Certificate not found');
            return;
        }

        info('Cert Selected: (' . $certificate->cert_id . ') ' . $certificate->item_name . ' :: ' . $certificate->item_rating);

        $action = select(
            label: 'What would you like to do?',
            options: ['Add Note', 'Issue Correction', 'Rerate', 'Reslab', 'Invalidate'],
        );

        switch ($action)
        {
            case 'Add Note':
                $note = text('Note:');
                $certificate->notes()->create(['note' => $note]);
                break;
            case 'Issue Correction':
                $editField = select(
                    label: 'What field would you like to correct?', options: ['Item Name', 'Item Number', 'Signed At']
                );
                $snakeCase = Str::snake($editField);
                $update = text('Update ' . $editField, $editField, $certificate->$snakeCase, true );
                $certificate->notes()->create(['note' => '[Update '. $editField .'] ' . $certificate->$snakeCase . ' => ' . $update]);
                $certificate->update([$snakeCase => $update]);
                break;
            case 'Rerate':
                $itemRating = select(
                    label: 'Change rating to:',
                    options: ['GEM-MT', 'Mint', 'NM-MT', 'NM', 'EX-MT', 'EX', 'VG-EX', 'VG', 'GOOD', 'FR', 'PR'],
                    default: $certificate->item_rating
                );
                $reason = text('Reason for rating change:');
                $certificate->notes()->create(['note' => '[Rating Change][' . $certificate->item_rating . ' => ' .$itemRating  . '] ' . $reason]);
                $certificate->update(['item_rating' => $itemRating]);
                break;
            case 'Reslab':
                $note = text('Reason:');

                $newRating = select(
                    label: 'Update Rating:',
                    options: ['GEM-MT', 'Mint', 'NM-MT', 'NM', 'EX-MT', 'EX', 'VG-EX', 'VG', 'GOOD', 'FR', 'PR'],
                    default: $certificate->item_rating
                );
                if($newRating != $certificate->item_rating)
                {
                    $note .= ' + Rating Change ' . $certificate->item_rating . ' => ' . $newRating;
                }

                if(is_null($certificate->signed_at))
                {
                    if(confirm('Did you add a signature to the item?'))
                    {
                        $signature = text('What date was it signed?', 'YYYY-MM-DD', Carbon::now()->toDateString());
                        $note .= ' + Signature Added ' . $signature;
                    }
                }


                $newCert = Item::create([
                    'type_id' => $certificate->type_id,
                    'product_id' => $certificate->product_id,
                    'property_id' => $certificate->property_id,
                   'item_name' => $certificate->item_name,
                   'item_number' => $certificate->item_number,
                    'item_rating' => $newRating,
                    'signed_at' => $signature ?? null,
                ]);
                $newCert->notes()->create(['note' => '[Reslab][' . $certificate->cert_id . ' => ' . $newCert->cert_id . '] ' . $note]);

                $certificate->notes()->create(['note' => '[Reslab][Replaced by ' . $newCert->cert_id . '] ' . $note . ' [Delisted]']);
                $certificate->delete();

                info('New Certificate ID# ' . $newCert->cert_id);
                break;
            case 'Invalidate':
                if(confirm('Are you sure you want to invalidate this Certificate?'))
                {
                    $certificate->notes()->create(['note' => '[Invalidate][Delisted]']);
                    $certificate->delete();
                }
                break;
        }
    }
}
