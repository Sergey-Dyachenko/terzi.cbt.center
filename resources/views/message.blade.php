<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ajax Example</title>
    <script src=" https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        function getMessage(){
            $.ajax({
                type: 'POST',
                url: '/getmsg',
                data: '_token = <?php echo csrf_token() ?>',
                success: function (data){
                    $("#msg").html(data.msg);
                },
                error: function () {
                    console.log('error');
                }
            });
        }
    </script>
</head>
<body>
<div id="msg">This message will be replaced using Ajax. Click the button to replace the message.</div>

<form action="#">
    <input type="submit" value="Replace Message" onclick="getMessage()">
</form>

</body>
</html>