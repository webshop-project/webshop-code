@extends('layouts/adminMaster')

@section('content')
<div class="container">
    <table class="table table-striped">
        <thead>
        <tr>
            <th class="h3" scope="col">Order number:</th>
            <th class="h3" scope="col">Name customer:</th>
            <th class="h3" scope="col">Amount of products:</th>
            <th class="h3" scope="col">Date:</th>
        </tr>
        </thead>
        <tbody>
        <tr data-href="{{action('PagesController@productAdd')}}" class="active-tr">
            <a href=""></a>
            <td class="h5"><a href="">1</a></td>
            <td class="h5">Jacob</td>
            <td class="h5">1</td>
            <td class="h5">24-09-2017</td>
        </tr>
        <tr>
            <td class="h5"><a href="">2</a></td>
            <td class="h5">Mark van Duinen</td>
            <td class="h5">2</td>
            <td class="h5">24-09-2017</td>
        </tr>
        <tr>
            <td class="h5"><a href="">3</a></td>
            <td class="h5">Gerrit Gerritsen</td>
            <td class="h5">4</td>
            <td class="h5">24-09-2017</td>
        </tr>
        <tr>
            <td class="h5"><a href="">4</a></td>
            <td class="h5">Santi Dudok</td>
            <td class="h5">1</td>
            <td class="h5">24-09-2017</td>
        </tr>
        <tr>
            <td class="h5"><a href="">5</a></td>
            <td class="h5">piet paulussen</td>
            <td class="h5">5</td>
            <td class="h5">24-09-2017</td>
        </tr>
        <tr>
            <td class="h5"><a href="">6</a></td>
            <td class="h5">piet paulussen</td>
            <td class="h5">5</td>
            <td class="h5">24-09-2017</td>
        </tr>
        <tr>
            <td class="h5"><a href="">7</a></td>
            <td class="h5">piet paulussen</td>
            <td class="h5">5</td>
            <td class="h5">24-09-2017</td>
        </tr>
        <tr>
            <td class="h5"><a href="">8</a></td>
            <td class="h5">piet paulussen</td>
            <td class="h5">5</td>
            <td class="h5">24-09-2017</td>
        </tr>
        </tbody>
    </table>
</div>

@endsection