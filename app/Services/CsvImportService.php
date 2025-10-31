<?php

namespace App\Services;

use App\Models\SomeModel;
use App\Models\User;
use League\Csv\Reader;
use League\Csv\Statement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CsvImportService
{
    public function process(string $filePath, int $userId): void
    {
        // Open the CSV in Read Mode
        $csv = Reader::from($filePath, 'r');
        // Define the first row as headers. (dont insert)
        $csv->setHeaderOffset(0); 

        // Adjust depending on server specs.
        $rowsPerPass = 2000;

        // Read in pieces so it doesnt clog ram or cpu
        $stmt = (new Statement())->offset(0)->limit($rowsPerPass);
        $records = $stmt->process($csv);

        $offset = 0;
        while (count($records) > 0) {
            $batch = [];

            // For each record in the current chunk, add it to the batch array to insert to the database later on.
            foreach ($records as $record) {
                $batch[] = [
                    'from_postcode' => $this->unmask($record['from_postcode']),
                    'to_postcode'   => $this->unmask($record['to_postcode']),
                    'from_weight'   => $this->unmask_weight($record['from_weight']),
                    'to_weight'     => $this->unmask_weight($record['to_weight']),
                    'cost'          => $this->unmask_money($record['cost']),
                    'branch_id'     => $record['branch_id'],

                    'user_id' => $userId,

                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            // Mass insert to the database
            DB::table('zips')->insert($batch);

            // Adjust pointer and start again
            $offset += $rowsPerPass;
            $stmt = (new Statement())->offset($offset)->limit($rowsPerPass);
            $records = $stmt->process($csv);
        }

        // Release the file
        unset($csv);
        gc_collect_cycles();

        // Wait for release
        sleep(5);

        if(!file_exists($filePath))
        {
            // Fix slashes for windows
            $filePath = str_replace('\\', "/", $filePath);
        }

        Log::debug("File to delete: " . $filePath);

        // Finally delete it.
        unlink($filePath);

        $user = User::find($userId);
        $user->notifications()->create([
            "title" => "<i class='fas fa-check'></i> Arquivo processado!",
            "body" => "O processo de importação em lote foi concluido."
        ]);
    }

    private function unmask(?string $value): ?string
    {
        return $value ? preg_replace('/[^\d]/', '', $value) : null;
    }

    private function unmask_weight(?string $value): ?float
    {
        return floatval($value ? str_replace(",", ".", str_replace(".", "", preg_replace("/[^\d\.\,]/", "", $value))) : $value);
    }

    private function unmask_money(?string $value): ?string
    {
        return $value ? str_replace(",", ".", str_replace(".", "", preg_replace("/[^\d\.\,]/", "", $value))) : $value;
    }
}