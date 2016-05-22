<?php

namespace ConceptByte\TimeTraveller\Console;

use DateTime;
use Illuminate\Console\Command;
use ConceptByte\TimeTraveller\Models\Revision;

class ClearRevisionsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'timetraveller:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clears the time traveller revisions';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $date = new DateTime;
        $interval = config('timetraveller.clear');

        if ($this->confirm('Do you wish to continue clearing revisions?')) {
            $date->modify("-$interval days")->format('Y-m-d H:i:s');
            return Revision::where('created_at', '<=', $date)->delete();
        }
        $this->info('Old revision cleared');
    }
}