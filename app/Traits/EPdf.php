<?php
namespace App\Traits;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;

trait EPdf {
    public function exportPDF($view, $data){
        $html = view($view, ['data' => $data])->render();
        $pdf = Pdf::loadHtml($html);
        return $pdf->stream();
    }
}