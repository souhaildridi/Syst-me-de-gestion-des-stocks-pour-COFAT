<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\transaction;
use Illuminate\Support\Facades\Auth;




class ProductController extends Controller
{

    public function index()
{
    $product = Product::orderBy('created_at', 'DESC')->get();
    $transactions = transaction::all();
    return view('product.index', compact('product', 'transactions'));
}

    public function showTransferForm($id)
    {
        $product = Product::findOrFail($id);
        return view('transfer-form', ['product' => $product]);
    }

















   

    public function processTransactionn(Request $request)
    {
        $quantity = $request->input('quantite');
        $emplacement = $request->input('emplacement');
        $transactionDate = $request->input('date_transaction');
        $productId = $request->input('id_product');
        $userId = Auth::id();
        $product = Product::find($productId);
        if (!$product || $quantity <= 0) {
            return redirect()->route('product.index')->with('error', 'Invalid product or quantity');
        }
        $updatedStock = $product->Quantite_En_Stock - $quantity;
        if ($updatedStock < 0) {
            return redirect()->route('product.index')->with('error', 'Insufficient stock');
        }
        $product->Quantite_En_Stock = $updatedStock;
        $product->save();
        transaction::create([
            'id_product' => $productId,
            'id_user' => $userId,
            'emplacement' => $emplacement,
            'quantite' => $quantity,
            'date_transaction' => $transactionDate,
            'reference_article' => $product->reference_article           
        ]);

        return redirect()->route('product.index')->with('success', 'Transaction processed successfully');
    }
   
    public function updateQuantity(Request $request)
    {
        $productId = $request->input('id');
        $quantity = $request->input('Quantite_En_Stock');
        Product::where('id', $productId)->increment('Quantite_En_Stock', $quantity);

    }
    public function create(array $data)
    {
        return Product::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'product_code' => $data['product_code'],
            'Quantite_En_Stock' => $data['Quantite_En_Stock'],
            'reference_article' => $data['reference_article'],
            
        ]);
    }
    public function appl()
    {
        return view('layouts.app');
    }
    public function store(Request $request)
    {
        Product::create($request->all());
 
        return redirect()->route('listeProduit')->with('success', 'Product added successfully');
    }
 
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
 
        return view('product.show', compact('product'));
    }

    public function transfereproduct(string $id = null)
{
    if ($id) {
        $product = Product::findOrFail($id);
        return view('product.transfereproduct', compact('product'));
    } else {
     
    }
}
   
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
 
        return view('editProduit', compact('product'));
    }
 
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);
 
        $product->update($request->all());
 
        return redirect()->route('listeProduit')->with('success', 'product updated successfully');
    }
 
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('listeProduit')->with('success', 'product deleted successfully');
    }

    public function listeProduit()
{
    if(Auth::guard('admin')->check()){
        $products = Product::all();
        return view('listeProduit', compact('products'));
    }
    return redirect('/loginadmin');

}
public function ajouterProduit()
{
    if(Auth::guard('admin')->check()){
        
        $product = Product::orderBy('created_at', 'DESC')->get();
        
        return view('ajouterProduit', compact('product'));
    }
    return redirect('/loginadmin');

}

public function signupsave(Request $request)
{
    $request->validate([
    'title' => 'required',
    'Quantite_En_Stock' => 'required|numeric',
    'reference_article' => 'required',
    'product_code' => 'required',
     'description' => 'required'
]);
$product = new Product();
$product->title = $request->title;
$product->Quantite_En_Stock = $request->Quantite_En_Stock;
$product->reference_article = $request->reference_article;
$product->product_code = $request->product_code;
$product->description = $request->description;
$product->save();

return redirect()->route('listeProduit')->with('success', 'Product created successfully!');
}

}
