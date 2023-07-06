<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Havelock homepage</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <style>
        .container{
            background: silver;
        }

    </style>

    <body>
        <div class="container" style="padding: 60px";>

        <h4>welcome to havelock homepage .thankyou for your visit<h4>
        @include('menu')
    <!-- if else condition -->
        @if($age >= 18)
            <h4>you can vote!!</h4>
        @else
            <h4>you can't vote! becuase you are below 18</h4>
        @endif

    <!-- isset and empty -->
        @isset($record)
        <ul>
            <li>1.icc t2o international</li>
            <li>2.icc world cup</li>
            <li>3.icc champions trophy</li>
        </ul>
        @endisset

        @empty($record)
            <h4>its not empty.record still shows!!!</h4>
        @endempty

        
    <!-- switch case -->
    @switch($status)
            @case(1) 
                <h4>status is 1</h4>
                @break
            @case(2) 
                <h4>status is 2</h4>
                @break
            @case(3) 
                <h4>status is 3</h4>
                @break
            @case(4)
                <h4>status is 4</h4>
                @break
            @case(5) 
                <h4>status is 5</h4>
                @break
            @default 
                <h4>try again!!</h4>
    @endswitch

    
    <!-- forloop of an array -->
    <h3>games:</h3>
    @for($initial=0;$initial < count($games); $initial++)
        <h4>total games are : {{strtoupper($games[$initial])}}</h4>
    @endfor
      <!-- foreach of an array -->
    <h3>weeks:</h3>
    @foreach($weeks as $week)
        <h4>{{ $loop->index }} . total weeks are : {{strtoupper($week)}}</h4>
        <!-- $loop is as a variable to get each count and "iteration" is used for to iterate count starts from 1  -->
         <!-- $loop is as a variable to get each count and "index" is used for to  count starts from 0  -->
    @endforeach
    <h3> months:</h3>
    @foreach($months as $month)
       <h6> total count of months:{{$loop->count}}</h6>
       <h4 @if($loop -> first) class ="first" @elseif($loop -> last) class="last" @endif> {{ $loop->iteration}} . {{ strtoupper($month) }}</h4>
    @endforeach
        
    
 


    </div>
    </body>
</html>
    