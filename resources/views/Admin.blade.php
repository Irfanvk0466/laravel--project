<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Pusher</title>
    </head>
    <body>
        <h2>Welcome to Laravel Pusher</h2>

        <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
        <script>
              Pusher.logToConsole = true;
              var pusher = new Pusher('8673285f08661d234fe6', {
                cluster: 'ap2'
            });
            var channel = pusher.subscribe('orders');
                channel.bind('new-order', function(data) {
                alert("New Order Recieved");
            });
         
        </script>
    </body>