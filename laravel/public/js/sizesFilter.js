let selected = document.getElementById('sizeAndPrice');

let small = document.getElementsByClassName('size-small');
let medium = document.getElementsByClassName('size-medium');
let large = document.getElementsByClassName('size-large');
let extralarge = document.getElementsByClassName('size-extra-large');

$(selected).change(function() {
    if(selected.value === "S"){
        $('.select-size').addClass("d-none").removeClass("d-block");
        $('.size-small').addClass("d-block").removeClass("d-none");
        $('.size-medium').addClass("d-none").removeClass("d-block");
        $('.size-large').addClass("d-none").removeClass("d-block");
        $('.size-extra-large').addClass("d-none").removeClass("d-block");
    }
    else if(selected.value === "M"){
        $('.select-size').addClass("d-none").removeClass("d-block");
        $('.size-small').addClass("d-none").removeClass("d-block");
        $('.size-medium').addClass("d-block").removeClass("d-none");
        $('.size-large').addClass("d-none").removeClass("d-block");
        $('.size-extra-large').addClass("d-none").removeClass("d-block");
    }
    else if(selected.value === "L"){
        $('.select-size').addClass("d-none").removeClass("d-block");
        $('.size-small').addClass("d-none").removeClass("d-block");
        $('.size-medium').addClass("d-none").removeClass("d-block");
        $('.size-large').addClass("d-block").removeClass("d-none");
        $('.size-extra-large').addClass("d-none").removeClass("d-block");
    }
    else if(selected.value === "XL"){
        $('.select-size').addClass("d-none").removeClass("d-block");
        $('.size-small').addClass("d-none").removeClass("d-block");
        $('.size-medium').addClass("d-none").removeClass("d-block");
        $('.size-large').addClass("d-none").removeClass("d-block");
        $('.size-extra-large').addClass("d-block").removeClass("d-none");
    }
});