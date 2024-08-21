@extends('layouts.app')

@section('body')

<center><h2 style="margin-top:250px;">Transferer les Articles</h2></center>
<center>

<form method="post" action="{{ route('processTransaction') }}" onsubmit="return validateForm(); " enctype="multipart/form-data"> 
@csrf
    <table class="table table-bordered" style="margin-top:40px;">
        <thead>
            <tr>
                <th scope="col">Nom Produit</th>
                <th scope="col">Reference Article</th>
                <th scope="col">Quantite</th>
                <th scope="col">Emplacement</th>
                <th scope="col">Date</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $product->title }}</td>
                <td>{{ $product->reference_article }}</td>
                <td><input name="quantite" type="number"></td>
                <td>
    <select name="emplacement">
        <option value="Departemnt IT">Département IT</option>
        <option value="Production">Production</option>
        <option value="Magasin MP">Magasin MP</option>
        <option value="Departement Mecanique">Département Mécanique</option>
    </select>
</td>

                <td><input name="date_transaction" type="date"></td>
            </tr>
        </tbody>
    </table>
</center>
<center>
    <input type="hidden" name="id_product" value="{{ $product->id }}">
    <input type="submit" value="Valider" class="btn btn-success" style="margin-top: 40px;">
</center>
</form>

<script>
    function validateForm() {
        var quantity = document.getElementsByName("quantite")[0].value;
        var emplacement = document.getElementsByName("emplacement")[0].value;
        var transaction_date = document.getElementsByName("date_transaction")[0].value;

        if (quantity === "" || emplacement === "" || transaction_date === "") {
            alert("Please fill in all the required fields.");
            return false;
        }

        return true;
    }
</script>
@endsection
   