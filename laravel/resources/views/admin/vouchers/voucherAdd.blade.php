@extends('layouts/adminMaster')
@section('title')
    Add voucher
@endsection

@section('content')
    <div class="container">
        <form action="" class="form col-6 offset-3" id="global">

            <div class="form-group">
                <label for="userOption" class="col-form-label col-form-label-lg">Voucher type</label>
                <select name="userOption" id="userOption" class="form-control form-control-lg " onclick="users()">
                    <option value="0">Globaal</option>
                    <option value="1">Gebruiker</option>
                </select>
            </div>
            <div class="form-group" id="usersOption" style="display: none;">
                <label for="userId" class="col-form-label col-form-label-lg">Selecteer een gebruiker</label>
                <select name="userId" id="userId" class="form-control form-control-lg ">

                    @foreach($users as $user)
                        <option value="{{$user->id}}" class="form-control form-control-lg">{{$user->id}} {{$user->firstName}} {{$user->lastName}} {{"( $user->studentNummer )"}} {{$user->email}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="code" class="col-form-label col-form-label-lg">Voucher code:</label>
                <input type="text" id="code" class="form-control-lg form-control">
                <small id="codeHelp" class="form-text text-muted col-form-label-lg">Hier kunt u uw individuele code invoeren anders wordt code random gegenereerd.</small>
            </div>
            <div class="form-group">
                <label for="codeValue" class="col-form-label col-form-label-lg">Voucher waarde:</label>
                <input type="number" name="codeValue" class="form-control-lg form-control">
                <small id="codeValueHelp" class="form-text text-muted col-form-label-lg">Voucher waarde wordt in euro's opgegeven.</small>
            </div>
            <div class="form-group">
                <label for="startDate" class="col-form-label col-form-label-lg">Start datum:</label>
                <input type="date" id="startDate" name="startDate" class="form-control-lg form-control">
                <small id="startDateHelp" class="form-text text-muted col-form-label-lg">Start datum houdt in dat te begintijd is 00:00</small>
            </div>
            <div class="form-group">
                <label for="endDate" class="col-form-label col-form-label-lg">Eind datum:</label>
                <input type="date" id="endDate" name="endDate" class="form-control-lg form-control">
                <small id="endDateHelp" class="form-text text-muted col-form-label-lg">Eind datum houd in dat de eindtijd is 23:59.</small>
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-lg col-4 offset-8">Voucher toevoegen</button>
            </div>
        </form>
        <script>
            var userOption = document.getElementById("userOption");
            function users() {
                if(userOption.selectedIndex == 0){
                    document.getElementById('usersOption').style.display = 'none';
                }
                else {
                    document.getElementById('usersOption').style.display = 'block';
                }
            }

            searchBox = document.querySelector("#searchBox");
            countries = document.querySelector("#userId");
            var when = "keyup"; //You can change this to keydown, keypress or change

            searchBox.addEventListener("keyup", function (e) {
                var text = e.target.value;
                var options = countries.options;
                for (var i = 0; i < options.length; i++) {
                    var option = options[i];
                    var optionText = option.text;
                    var lowerOptionText = optionText.toLowerCase();
                    var lowerText = text.toLowerCase();
                    var regex = new RegExp("^" + text, "i");
                    var match = optionText.match(regex);
                    var contains = lowerOptionText.indexOf(lowerText) != -1;
                    if (match || contains) {
                        option.selected = true;
                        return;
                    }
                    searchBox.selectedIndex = 0;
                }
            });
        </script>
    </div>
@endsection