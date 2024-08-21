<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>user</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <link href="/css/font-face.css" rel="stylesheet" media="all">
    <link href="/vendor11/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="/vendor11/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="/vendor11/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Sofia Pro -->
    <link href="http://fonts.cdnfonts.com/css/sofia-pro" rel="stylesheet">

    <!-- Bootstrap CSS-->
    <link href="/vendor11/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

<!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Vendor CSS-->
    <link href="/vendor11/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="/vendor11/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="/vendor11/wow/animate.css" rel="stylesheet" media="all">
    <link href="/vendor11/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="/vendor11/slick/slick.css" rel="stylesheet" media="all">
    <link href="/vendor11/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="/vendor11/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    
    <link href="/css/theme.css" rel="stylesheet" media="all">
    <link href="/css/all.css" rel="stylesheet" media="all">


    <link rel="stylesheet" type="text/css" href="/css/util.css">
	<link rel="stylesheet" type="text/css" href="/css/main.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
  
</head>

<body class="animsition">

@yield('content')
    
<div class="page-container" >
<section id="hero" style=" margin-top: 50px;">

@yield('information')     

</section>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
<!-- Jquery JS-->
<script src="/vendor11/jquery-3.2.1.min.js"></script>
<!-- Bootstrap JS-->
<script src="/vendor11/bootstrap-4.1/popper.min.js"></script>
<script src="/vendor11/bootstrap-4.1/bootstrap.min.js"></script>
<!-- Vendor JS       -->
<script src="/vendor11/slick/slick.min.js">
</script>
<script src="/vendor11/wow/wow.min.js"></script>
<script src="/vendor11/animsition/animsition.min.js"></script>
<script src="/vendor11/bootstrap-progressbar/bootstrap-progressbar.min.js">
</script>
<script src="/vendor11/counter-up/jquery.waypoints.min.js"></script>
<script src="/vendor11/counter-up/jquery.counterup.min.js">
</script>
<script src="/vendor11/circle-progress/circle-progress.min.js"></script>
<script src="/vendor11/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="/vendor11/chartjs/Chart.bundle.min.js"></script>
<script src="/vendor11/select2/select2.min.js">
</script>

<!-- Main JS-->
<script src="/js/main.js"></script>

<script>
    function addQuantityPrompt(productId) {
        var quantity = prompt("Enter the quantity to add:");
        
        if (quantity !== null) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "update_quantity.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    location.reload(); // Reload the page for simplicity
                }
            };
            
            xhr.send("product_id=" + productId + "&quantity=" + quantity);
        }
    }
</script>

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
  </body>
</html>