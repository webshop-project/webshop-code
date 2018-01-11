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
                <th scope="col">Voucher used by:</th>
                <th scope="col">Voucher code:</th>
                <th scope="col">Voucher value:</th>
                <th scope="col">Used at</th>
            </tr>
            </thead>
            <tbody>
            @foreach($vouchers as $voucher)
                @foreach($voucher->voucher_used as $used)
                    <tr>
                        <th scope="row">
                            @if($voucher->user_id == NULL)
                                {{ 'Global' }}
                            @else
                                {{ 'User' }}
                            @endif
                        </th>
                        <td>{{\App\User::find($used->user_id)->firstName . ' ' . \App\User::find($used->user_id)->lastName}}</td>
                        <td>{{$voucher->code}}</td>
                        <td>{{$voucher->codeValue}}</td>
                        <td>{{$used->used_at}}</td>
                    </tr>
                @endforeach
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
