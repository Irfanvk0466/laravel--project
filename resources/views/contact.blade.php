<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Havelock Holidays</title>
        <link rel="stylesheet" href="styles.css">
        

    </head>
    <style>
        .container{
            background:wheat;
        }

    </style>

    <body>
        <div class="container" style="padding: 60px";>

        @include('menu')
        <h1>welcome to Havelock Holidays</h1>
        <h2>Here Havelock Contacts!!</h2>
        <h3> <?php
        echo $result;
        ?>
           
        </h3>
        <h4>{{$newName}}</h4>
        <ul>
            <li>manager:akshay</li>
            <li>phone:9567618629</li>
            <li>todays is {{date("d-M-Y")}}</li>
            <li>todays is {{ time() }}</li>

            <li><a href ="{{route('emailpage')}}">email:vkirfan6@gmail.com</a></li>
        </ul>
     
    </div>
</body>
</html>