@extends('')
@section('title')

@endsection
@section('content')
    <form action="/categorie/{{$categorie->id}}">
        {{csrf_field()}}
        {{method_field('PUT')}}

    </form>

@endsection