
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>AMOBEHEER - @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/admin/main.css">
    <link rel="stylesheet" href="/css/admin/santi.css">

    <script src="https://use.fontawesome.com/3571e1e4e4.js"></script>
</head>


<body>
<!-- Start navigatie-->
<nav class="navbar navbar-expand-lg navbar-light bg-faded">
    <a class="navbar-brand" href="#"><img class="logo" src="/img/amologin.png" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div id="navbarNavDropdown" class="navbar-collapse collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/admin">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Webshop</a>
            </li>

        </ul>
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="index.php" role="button" aria-haspopup="true" aria-expanded="false">Products</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="/products/create">Product Add</a>
                    <a class="dropdown-item" href="/categorie/create">Categorie Add</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/products">Product List</a>
                    <a class="dropdown-item" href="/categorie">Categorie List</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Orders</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="/orders">Pending Orders</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/orders">Processed Orders</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Voucher</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="/voucher/create">Add Vouchers</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/voucher">Used Vouchers</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Users</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="/user">Adjust User</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/user">Manage User</a>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ url('/login') }}">Logout</a>
            </li>
        </ul>
    </div>
</nav>
<!-- End navigatie -->

@yield('content')


<footer>
    <p>AMO WEBSHOP &#9400; 2017</p>
</footer>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

<script>
    $(function(){
        $('*[data-href]').click(function(){
            window.location = $(this).data('href');
            return false;
        });
    });
</script>

</body>

</html>