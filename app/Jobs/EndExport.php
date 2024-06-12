<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class EndExport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Storage::download($this->name);
        // return redirect('/kkk/'.$this->name);
        // return response()->download($this->name)
        // $url = Storage::url();
        // $start = curl_init();
        // curl_setopt($start, CURLOPT_URL, $url);
        // curl_setopt($start, CURLOPT_RETURNTRANSFER, 1);
        // curl_setopt($start, CURLOPT_SSLVERSION, 3);
        // $file_data = curl_exec($start);
        // curl_close($start);
        // $file_path = 'download/'.uniqid().'.xlsx';
        // $file = fopen($file_path, 'w+');
        // fputs($file, $file_data);
        // fclose($file);
        Session::put('export_success', 'yes');

    }
}
