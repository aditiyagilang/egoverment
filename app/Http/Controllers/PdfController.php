<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PdfController extends Controller
{
    public function viewPdf($fileName)
    {
        $filePath = storage_path('app/pdf/' . $fileName); // Path to your PDF file
        return response()->file($filePath);
    }
}
?>
