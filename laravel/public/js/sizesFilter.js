let selected = $("#sizeAndPrice").text();

let small = document.getElementsByClassName('size-small');
let medium = document.getElementsByClassName('size-medium');
let large = document.getElementsByClassName('size-large');
let extralarge = document.getElementsByClassName('size-extra-large');

let price_small = '<?php echo json_encode($sizesmall); ?>';

$(selected).change(function() {
    if(selected.text() === "s"){
        alert('hi');
        $('.size-small').addClass("d-block").removeClass("d-none");
        $('.size-medium').addClass("d-none").removeClass("d-block");
        $('.size-large').addClass("d-none").removeClass("d-block");
        $('.size-extra-large').addClass("d-none").removeClass("d-block");
        $('input[name=size]').val('{{$product->warehouse[0]->size->size}}');
        $('input[name=price]').val();
    }
    else if(selected.value === "M"){
        $('.size-small').addClass("d-none").removeClass("d-block");
        $('.size-medium').addClass("d-block").removeClass("d-none");
        $('.size-large').addClass("d-none").removeClass("d-block");
        $('.size-extra-large').addClass("d-none").removeClass("d-block");
    }
    else if(selected.value === "L"){
        $('.size-small').addClass("d-none").removeClass("d-block");
        $('.size-medium').addClass("d-none").removeClass("d-block");
        $('.size-large').addClass("d-block").removeClass("d-none");
        $('.size-extra-large').addClass("d-none").removeClass("d-block");
    }
    else if(selected.value === "XL"){
        $('.size-small').addClass("d-none").removeClass("d-block");
        $('.size-medium').addClass("d-none").removeClass("d-block");
        $('.size-large').addClass("d-none").removeClass("d-block");
        $('.size-extra-large').addClass("d-block").removeClass("d-none");
    }
});