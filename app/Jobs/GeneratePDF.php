<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use PDF;

class GeneratePDF implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function handle()
    {
        $pdf = PDF::loadView('siswa.cetak_kelulusan', $this->data);

        // Atur ukuran kertas dan orientasi
        $pdf->setPaper('A4', 'portrait');

        // Generate nama file
        $fileName = 'Kelulusan-' . $this->data['nama'] . '.pdf';

        // Simpan PDF ke lokasi penyimpanan
        $pdf->save(storage_path('pdf/' . $fileName));
    }
}
