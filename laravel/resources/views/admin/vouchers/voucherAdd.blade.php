@extends('layouts/adminMaster')
@section('title')
    Add voucher
@endsection

@section('content')
    <div class="container">
        <form action="" class="form col-6 offset-3">
            <div class="form-group">
                <label for="code" class="col-form-label col-form-label-lg">Voucher code:</label>
                <input type="text" id="code" class="form-control-lg form-control">
            </div>
            <div class="form-group">
                <label for="codeValue" class="col-form-label col-form-label-lg">Voucher waarde:</label>
                <input type="number" id="codeValue" class="form-control-lg form-control">
                <small id="codeValueHelp" class="form-text text-muted col-form-label-lg">Voucher waarde moet in aantal % aangegeven worden.</small>
            </div>
            <div class="form-group">
                <label for="userId" class="col-form-label col-form-label-lg">Voucher type</label>
                <select name="userOption" id="userId" class="form-control form-control-lg ">
                    <option value="NULL">Globaal</option>
                    <option value="1">Gebruiker</option>
                </select>
            </div>
            <div class="form-group">
                <label for="startDate" class="col-form-label col-form-label-lg">Start datum:</label>
                <input type="date" id="startDate" class="form-control-lg form-control">
                <small id="startDateHelp" class="form-text text-muted col-form-label-lg">Start datum houdt in dat te begintijd is 00:00</small>
            </div>
            <div class="form-group">
                <label for="endDate" class="col-form-label col-form-label-lg">Eind datum:</label>
                <input type="date" id="endDate" class="form-control-lg form-control">
                <small id="endDateHelp" class="form-text text-muted col-form-label-lg">Eind datum houd in dat de eindtijd is 23:59.</small>
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-lg col-4 offset-8">Voucher toevoegen</button>
            </div>
        </form>
    </div>
@endsection