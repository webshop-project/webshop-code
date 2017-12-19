<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<?php $session_value = [5,5,5]; ?>
<?php $session_amount = 4; ?>
<body>

</body>
    <script type="text/javascript">
        let r = confirm("Would you like a update on products that are on supply?");
        if (r == true) {
            let amount = <?php echo $session_amount; ?>;
            let myvar = '<?php echo json_encode($session_value);?>';

            for(let i = 0 ; i < amount ; i++)
            {
                document.write('hi');

            }
        } else {

        }

    </script>
</html>
