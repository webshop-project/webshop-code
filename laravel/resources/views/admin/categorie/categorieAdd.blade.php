@extends('layouts/adminMaster')
@section('title')
    Categorie Add
@endsection

@section('content')
    <div class="container">
        <form action="../categorie" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <label for="title">Titel categorie:</label>
                <input type="text" id="title" name="title">
            </div>
            <button class="btn btn-info">Add</button>
        </form>
    </div>
@endsection