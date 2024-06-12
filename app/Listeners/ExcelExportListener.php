<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Exports\PetitionsExport;
use Excel;
use App\Editing;


class ExcelExportListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     //
    // }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        // (new PetitionsExport)->store('invoices.xlsx' , storage_path('excel/exports'));
        (new PetitionsExport)->store('invoices.xlsx');
         // return Excel::download(new PetitionsExport(), 'invoices.xlsx');
    }
}
