<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <input type="text" id="search">
    <div class="box"></div>

    <script>
        $(function() {
            $('#search').on('keyup', function() {
                var v = $(this).val();
                $.ajax('feed.php', {
                    dataType: 'json',
                    type: 'post',
                    data: {

                        keyword: v,
                    },
                    success: function(data) {
                        // console.log(data);
                        // var jdecoded = JSON.parse(data);
                        $('.box').html(data.html);
                    }
                })
            });
        });
    </script>
</body>

</html>