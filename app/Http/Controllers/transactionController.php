<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\transaction;
use Barryvdh\DomPDF\Facade\Pdf;

class transactionController extends Controller
{
   
    public function index()
    {
        $transactions = transaction::orderBy('created_at', 'DESC')->get();
 
        return view('product.index', compact('transactions'));
    }

public function generatePDF(string $id)
{
    try {
        
        $transaction = transaction::find($id);
        
        if (!$transaction) {
            return redirect()->back()->with('error', 'Error telecharegement fichier: ');
        }
        $data = [
            
            'transactions' => [$transaction] 
        ];

        $pdf = PDF::loadView('product.generate-product-pdf', $data);
        return $pdf->download('facture.pdf');
    } catch (Exception $e) {
        dd($e);
    }
}
}
