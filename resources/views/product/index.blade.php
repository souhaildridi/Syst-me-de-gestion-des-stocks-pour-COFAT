


@extends('layouts.app')
 
@section('body')

    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    

    <br><br><center><h2 style="font-weight: bold;margin-top:50px;"> Liste des Articles </h2></center><br>
<center>
<table class="table" style="background-color: #7a7a7a63;font-family:'Sofia Pro', sans-serif; border: 1px solid black;">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Product Name</th>
                <th scope="col">Description</th>
                <th scope="col">Code Barre</th>
                <th scope="col">Quantite En Stock</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($product as $pro)
                <tr>
                    <th scope="row">{{ $pro->id }}</th>
                    <td>{{ $pro->title }}</td>
                    <td>{{ $pro->description }}</td>
                    <td>{{ $pro->product_code }}</td>
                    <td @if ($pro->Quantite_En_Stock == 0) style="color: red;" @endif>
                        {{ $pro->Quantite_En_Stock }}
                    </td>
                    <td>

                        <a href="{{ route('updateQuantity') }}" onclick="addQuantityPrompt({{ $pro->id }})" class="btn" style="background-color:#4cbb17; color:white;"><i class="fas fa-plus"></i></a>
                        <a href="{{ route('product.show', $pro->id) }}" class="btn" style="background-color:#0090FF; color:white;"><i class="fas fa-exchange-alt"></i></a>
        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>













    




<center><h2 style="margin-top:60px;">Historique de Mouvements</h2></center>
<div class="p-5">
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Nom Produit</th>
                <th>Quantite</th>
                <th>Emplacement</th>
                
                <th>Id Utilisateur</th>
                <th>Date Transaction</th>
                <th>Reference</th>
                <th>Imprimer </th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $transaction)
                <tr>
                    <td>{{optional($transaction->product)->title }}</td>
                    <td>{{ $transaction['quantite'] }}</td>
                    <td>{{ $transaction['emplacement'] }}</td>
                    
                    <td>{{ $transaction['id_user'] }}</td>
                    <td>{{ $transaction['date_transaction'] }}</td>
                    <td>{{ $transaction['reference_article'] }}</td>
                    <td><a href="{{route('generate-pdf',$transaction->id)}}" class="btn" style="background-color:#f94a00; color:white;"><i
                    class="fa fa-download"></i></a> </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Nom Produit</th>
                <th>Quantite</th>
                <th>Emplacement</th>
                
                <th>Id Utilisateur</th>
                <th>Date Transaction</th>
                <th>Reference</th>
                <th>Imprimer</th>
            </tr>
        </tfoot>
    </table>
</div>


<script>
    function addQuantityPrompt(productId) {
    var quantity = prompt("Enter the quantity to add:");

    if (quantity !== null) {
        $.ajax({
            url: '{{ route("updateQuantity") }}', // Use the correct route name here
            type: 'POST',
            data: {
                '_token': '{{ csrf_token() }}',
                'id': productId,
                'Quantite_En_Stock': quantity
            },
            success: function(response) {
                location.reload();
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }
}
</script>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
@endsection
   