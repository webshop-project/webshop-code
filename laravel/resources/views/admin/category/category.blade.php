@extends('admin/index')
@section('title')
    Category
@endsection
@section('content')
<div class="container">
    <table class="table table-striped">
        @php
            $categoryList = array("bla", "bla", "bla","bla", "bla","bla", "bla","bla", "bla","bla", "bla","bla", "bla","bla", "bla","bla", "bla","bla", "bla","bla", "bla" );
            $pages = 0;
            $result = count($categoryList);
        @endphp
        @for($i =0; $i < $result; $i++)
                @php($count = 0)
                    @if($count == 6)
                        @php($pages = $pages++)

                    @elseif($count < 6)
                        @php($count = $count++)
                        <tr>
                            <td>blaa</td>
                            <td><button class="btn btn-dark">Edit</button></td>
                            <td><button class="btn btn-danger">Remove</button></td>
                        </tr>
                    @endif


            @endfor
    </table>
    <ul class="pagination">
        @for($i = 0; $i < $pages; $i++)
            <li class="page-item"><a class="page-link" href="?page=$page">{{$pages}}</a></li>
        @endfor
    </ul>
    <form action="#" method="post">
        <div class="form-group">
            <label for="title">Title:</label>
            <input id="title" type="text" class="form-control">
        </div>
        <div class="form-group"><button class="btn btn-dark">Add</button></div>

    </form>
</div>


@endsection