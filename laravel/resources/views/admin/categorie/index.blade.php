@extends('layouts/adminMaster')
@section('title')
    Categorie
@endsection

@section('content')
<div class="container">

    <table class="table table-striped">
        <tr>
            <th>Title</th>
        </tr>
        @php($categories = \App\categorie::all())
        @foreach($categories as $categorie )
                        <tr>
                            <td>{{$categorie->name}}</td>
                            <td><button class="btn btn-dark">Edit</button></td>
                            <td><button class="btn btn-danger">Remove</button></td>
                        </tr>
        @endforeach
    </table>
    <ul class="pagination">
        {{--@for($i = 0; $i < $pages; $i++)--}}
            {{--<li class="page-item"><a class="page-link" href="?page=$page">{{$pages}}</a></li>--}}
        {{--@endfor--}}
    </ul>
<a href="categorie/create">Voeg categorie toe</a>
</div>


@endsection