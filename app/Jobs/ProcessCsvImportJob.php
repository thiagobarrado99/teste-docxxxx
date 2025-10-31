<?php

namespace App\Jobs;

use App\Services\CsvImportService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class ProcessCsvImportJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public string $filePath;
    public int $userId;

    public $timeout = 3600;
    public $tries = 3;

    public function __construct(string $filePath, int $userId)
    {
        $this->filePath = $filePath;
        $this->userId = $userId;
    }

    public function handle(CsvImportService $csvService)
    {
        $csvService->process(Storage::path($this->filePath), $this->userId);
    }
}