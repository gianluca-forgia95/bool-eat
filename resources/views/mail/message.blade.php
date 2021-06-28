<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="mail-container">
     <h1> Ciao {{ $order->name }} , Abbiamo ricevuto il tuo ordine!!</h1>

     <h4>Riepilogo ordine: </h4>

    <p>un fattorino sta arrivando da te all' indirizzo: {{ $order->address}}.</p>

     <h5>Totale Speso: {{ $order->total}} &euro;</h5>


      <a class="" href="{{ url('/') }}"> 
       <img src="{{asset('images/bool_eat.png')}}" style="width: 100px" alt="logo">
      </a>
    </div>
    
</body>
</html>





