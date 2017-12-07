@extends('admin/index')
@section('title')
    Create
@endsection
@section('content')
    <div class="container">
        <form action="../categorie" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <label for="title">Titel categorie:</label>
                <input type="text" id="title" name="title">
            </div>
            <button class="btn btn-success">Add</button>
        </form>
    </div>
@endsection