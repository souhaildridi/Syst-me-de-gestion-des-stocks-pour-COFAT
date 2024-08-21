<!DOCTYPE html>
<html>
<head>
    <title>Facture de Transaction</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-size: 16px;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <h2 class="mb-3">FACTURE</h2>
                <p>Entreprise de Câblage COFAT<br>
                Adresse: Z.I Mateur – 7030 Tunisia<br>
                Téléphone: 72112054/72468056<br>
                Email: cofat@gmail.com<br>
                Site Web: www.cofat.com</p>
                <hr>
                <p>Date: <?php echo date('d F Y'); ?><br>
                No. de Facture: FCT-<?php echo date('Y'); ?>-001</p>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                <th>Nom Produit</th>
                <th>Quantite</th>
                <th>Emplacement</th>
                
              
                <th>Date Transaction</th>
                
                
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($transactions as $transaction): ?>
                   <tr>
                    <td><?php echo optional($transaction->product)->title; ?></td>
                    <td><?php echo $transaction['quantite']; ?></td>
                    <td><?php echo $transaction['emplacement']; ?></td>
                    
                    
                    <td><?php echo $transaction['date_transaction']; ?></td>
                    
                    </tr>
                     <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <p class="text-right">id utilisateur: <?php echo $transaction['id_user']; ?></p>
             
                <h4 class="text-right">Référence: <?php echo $transaction['reference_article']; ?></h4>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <p>Merci pour votre confiance. Veuillez régler le montant dû dans les 30 jours suivant la réception de cette facture.</p>
            </div>
        </div>
    </div>
</body>
</html>
