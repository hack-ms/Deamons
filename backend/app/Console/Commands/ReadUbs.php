<?php

namespace App\Console\Commands;

use App\Services\UbsService;
use Illuminate\Console\Command;

class ReadUbs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'deamon:read_ubs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $ubsService = new UbsService();
        $ubsService->importCsvFile();
    }
}
