<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>AMOBEHEER - @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/admin/main.css">
    <link rel="stylesheet" href="/css/admin/santi.css">

    <script src="https://use.fontawesome.com/3571e1e4e4.js"></script>
</head>


<body>
<!-- Start navigatie-->
<header class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-faded">
        <a class="navbar-brand" href="{{action('DashboardController@index')}}"><img class="logo" src="/img/amologin.png"
                                                                                    alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="navbarNavDropdown" class="navbar-collapse collapse row justify-content-between">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/admin">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Webshop</a>
                </li>

            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="index.php" role="button"
                       aria-haspopup="true" aria-expanded="false">Products</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/products/create">Product Add</a>
                        <a class="dropdown-item" href="/categorie/create">Categorie Add</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/products">Product List</a>
                        <a class="dropdown-item" href="/categorie">Categorie List</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                       aria-haspopup="true" aria-expanded="false">Orders</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{action('OrderController@index')}}">Pending Orders</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/orders">Processed Orders</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                       aria-haspopup="true" aria-expanded="false">Voucher</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{action('VoucherController@create')}}">Add Vouchers</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{action('VoucherController@index')}}">Used Vouchers</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                       aria-haspopup="true" aria-expanded="false">Users</a>
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
</header>
<!-- End navigatie -->

@yield('content')


<footer class="container-fluid">
    <p>AMO WEBSHOP &#9400; 2017</p>
</footer>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
        integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
        integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
        crossorigin="anonymous"></script>

<script>
    $(function () {
        $('*[data-href]').click(function () {
            window.location = $(this).data('href');
            return false;
        });
    });

    const valueOption = document.getElementById('category');
    const shirtSizes = document.getElementById('shirtSizes');
    const usbSizes = document.getElementById('usbSizes');
    const standard = document.getElementById('groupStandard');
    const groupPhone = document.getElementById('groupPhone');


    valueOption.addEventListener('change', () => {

        if (valueOption.value == 5) {
            const groupS = document.getElementById('groupS');
            const sizeS = document.getElementById('sizeS');

            groupPhone.classList.add('d-none');
            groupPhone.classList.remove('d-block');
            standard.classList.add('d-none');
            standard.classList.remove('d-block');
            shirtSizes.classList.add('d-block');
            shirtSizes.classList.remove('d-none');
            usbSizes.classList.add('d-none');
            usbSizes.classList.remove('d-block');
            sizeS.addEventListener('click', () => {
                if (sizeS.checked) {
                    groupS.classList.add('d-block');
                    groupS.classList.remove('d-none');
                }
                else {

                    groupS.classList.add('d-none');
                    groupS.classList.remove('d-block');
                }
            });

            const groupM = document.getElementById('groupM');
            const sizeM = document.getElementById('sizeM');

            sizeM.addEventListener('click', () => {
                if (sizeM.checked) {
                    groupM.classList.add('d-block');
                    groupM.classList.remove('d-none');
                }
                else {

                    groupM.classList.add('d-none');
                    groupM.classList.remove('d-block');
                }
            });

            const groupL = document.getElementById('groupL');
            const sizeL = document.getElementById('sizeL');

            sizeL.addEventListener('click', () => {
                if (sizeL.checked) {
                    groupL.classList.add('d-block');
                    groupL.classList.remove('d-none');
                }
                else {

                    groupL.classList.add('d-none');
                    groupL.classList.remove('d-block');
                }
            });

            const groupXL = document.getElementById('groupXL');
            const sizeXL = document.getElementById('sizeXL');

            sizeXL.addEventListener('click', () => {
                if (sizeXL.checked) {
                    groupXL.classList.add('d-block');
                    groupXL.classList.remove('d-none');
                }
                else {

                    groupXL.classList.add('d-none');
                    groupXL.classList.remove('d-block');
                }
            });

        }
        else if(valueOption.value == 6){

            const group8 = document.getElementById('group8');
            const size8 = document.getElementById('size8');

            groupPhone.classList.add('d-none');
            groupPhone.classList.remove('d-block');
            standard.classList.add('d-none');
            standard.classList.remove('d-block');
            shirtSizes.classList.add('d-none');
            shirtSizes.classList.remove('d-block');
            usbSizes.classList.add('d-block');
            usbSizes.classList.remove('d-none');
            size8.addEventListener('click', () => {
                if (size8.checked) {
                    group8.classList.add('d-block');
                    group8.classList.remove('d-none');
                }
                else {

                    group8.classList.add('d-none');
                    group8.classList.remove('d-block');
                }
            });

            const group16 = document.getElementById('group16');
            const size16 = document.getElementById('size16');

            size16.addEventListener('click', () => {
                if (size16.checked) {
                    group16.classList.add('d-block');
                    group16.classList.remove('d-none');
                }
                else {

                    group16.classList.add('d-none');
                    group16.classList.remove('d-block');
                }
            });

            const group32 = document.getElementById('group32');
            const size32 = document.getElementById('size32');

            size32.addEventListener('click', () => {
                if (size32.checked) {
                    group32.classList.add('d-block');
                    group32.classList.remove('d-none');
                }
                else {

                    group32.classList.add('d-none');
                    group32.classList.remove('d-block');
                }
            });

            const group64 = document.getElementById('group64');
            const size64 = document.getElementById('size64');

            size64.addEventListener('click', () => {
                if (size64.checked) {
                    group64.classList.add('d-block');
                    group64.classList.remove('d-none');
                }
                else {

                    group64.classList.add('d-none');
                    group64.classList.remove('d-block');
                }
            });
        }
        else if(valueOption.value == 4){

            groupPhone.classList.add('d-block');
            groupPhone.classList.remove('d-none');
        }
        else{
            standard.classList.add('d-block');
            standard.classList.remove('d-none');
            shirtSizes.classList.add('d-none');
            shirtSizes.classList.remove('d-block');
            usbSizes.classList.add('d-none');
            usbSizes.classList.remove('d-block');
            groupPhone.classList.add('d-none');
            groupPhone.classList.remove('d-block');
        }
    });

</script>

</body>

</html>