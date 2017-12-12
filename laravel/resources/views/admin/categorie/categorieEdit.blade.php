@extends('')
@section('title')

@endsection
@section('content')

    <form action="">
        {{csrf_field()}}
        {{method_field('PUT')}}

    </form>

@endsection