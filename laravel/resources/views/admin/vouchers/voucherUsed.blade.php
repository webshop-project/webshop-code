@extends('layouts/adminMaster')
@section('title')
    Used vouchers overview
@endsection

@section('content')
    <div class="container">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Voucher type:</th>
                <th scope="col">Voucher code</th>
                <th scope="col">Voucher value</th>
                <th scope="col">Used at</th>
            </tr>
            </thead>
            <tbody>
            <?php dd($vouchers); ?>
            @foreach($vouchers as $voucher)
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
