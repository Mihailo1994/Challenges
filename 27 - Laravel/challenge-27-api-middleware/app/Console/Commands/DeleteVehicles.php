<?php

namespace App\Console\Commands;

use App\Models\Vehicle;
use Illuminate\Console\Command;

class DeleteVehicles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-vehicles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete vehicles which are soft deleted and whose insurance date is expired';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $vehicles = Vehicle::withTrashed()->get();
        $n = 0;
        foreach($vehicles as $vehicle){
            if($vehicle->deleted_at !== NULL){
                $vehicle->forceDelete();
                $n++;
            }

            if($vehicle->insurance_date < now()){
                $vehicle->forceDelete();
                $n++;
            }
        }

        $this->info($n . ' vehicles have been deleted');
    }
}
