@extends('layouts.guest')

@section('style')
  <link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
@endsection

@section('pageTitle')
  Booleat | Home
@endsection

@section('content')
   
  <!-- Jumbotron -->
  <div class="jumbotron_wrapper">
    <div class="text-center height-text-jumbotron">
      <div class="d-flex justify-content-center align-items-center ">
        {{-- jumbotron_content --}}
        <div class="jumbotron_content text-white mt-5">
             <img src="" alt="">
            <h1 class="mb-3">Benvenuto su Booleat</h1>
            <h2 class="mb-3">Scopri i nostri ristoranti!</h2>
            {{-- <input  type="text" class="form-control" placeholder="cerca il ristorante" value="" v-model="restaurantName">
            <button class="btn btn-outline-light btn-success btn-lg" type="button" name="button" v-on:click="searchName">Search</button> --}}
        </div>
      </div>
    </div>
  </div>

  <div id="app">
    <div class="container">
      <div class="row container_card">
        {{-- Tutti i ristoranti --}}
          @foreach ($users as $user)
            <div class="card card-nav-tabs card_restaurant" style="width: 20rem;">
              <div class="card-header color_card_header">
               <h4>{{$user->restaurant_name}}</h4> 
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item"><img src="https://qul.imgix.net/6ec903c8-c731-4bd0-aadb-f8c68f23c169/528634_sld.jpg" alt=""></li>
                <li class="list-group-item">Indirizzo: {{$user->address}}</li>
                <li class="list-group-item"><a href="{{ route('guest.show' , ['user' => $user->id])}}">Visualizza menù</a></li>
              </ul>
            </div>
          @endforeach
        {{-- /Tutti i ristoranti --}}
      </div>
    </div>

    <!-- Jumbotron -->
    <div class="text-center jumbotron_bottom">
      <div class="d-flex justify-content-center align-items-center ">
        <div class="text-white mt-5">
            <h1 class="mb-3">Benvenuto su Booleat</h1>
            <h4 class="mb-3">cerca e ordina!</h4>
            {{-- Search names --}}
            <input  type="text" placeholder="cerca il ristorante" value="" v-model="restaurantName">
            <button class="btn btn-outline-light btn-success btn-lg" type="button" name="button" v-on:click="searchName">Search</button>
            {{-- Search names --}}
        </div>
      </div>
    </div>

    <div v-if="restaurants.length == 0" class="results">
      {{-- <h2  class="text-center">Cerca per categoria di ristorante </h2> --}}
    </div>
    {{-- Nav Buttons --}}
    {{-- <nav class="navbar navbar-expand-lg"> --}}
      <div class="container">
        <div id="navbarNav navbar_genres">
          <ul class="navbar_genres">
            <li class="active" v-for="genre in genres">
              <a class="btn-genres"  v-on:click="filterGenreButtons(genre.name)" href="javascript:;">@{{ genre.name }}<span class="sr-only">(current)</span>
              <img v-bind:src="genre.logo" alt=""></a>
            </li>
          </ul>
        </div>
      </div>
    {{-- </nav> --}}
     {{-- /Nav Buttons --}}
    {{-- Container Card Ristoranti --}}
    <div class="container_card">
      <div class="row">

        {{-- card Ricerca Nome --}}
        <div class="card card-nav-tabs card_restaurant" style="width: 20rem;" v-for="user in users" >
          <div class="card-header card-header-danger">
            <h4>@{{user.restaurant_name}}</h4> 
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item"><img src="https://qul.imgix.net/6ec903c8-c731-4bd0-aadb-f8c68f23c169/528634_sld.jpg" alt=""></li>
            <li class="list-group-item">Indirizzo: @{{user.address}}</li>
            <li class="list-group-item"><a :href="'http://localhost:8000/show/'+ user.id">Visualizza menù</a></li>
          </ul>
        </div>
      {{-- /card Ricerca Nome --}}

      {{-- Card ricerca categorie --}}
        <div class="card card-nav-tabs card_restaurant" style="width: 20rem;" v-for="restaurant in restaurants" >
          <div class="card-header card-header-danger">
              <h4>@{{restaurant.restaurant_name}}</h4> 
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item"><img src="https://qul.imgix.net/6ec903c8-c731-4bd0-aadb-f8c68f23c169/528634_sld.jpg" alt=""></li>
            <li class="list-group-item">Indirizzo: @{{restaurant.address}}</li>
            <li class="list-group-item"><a :href="'http://localhost:8000/show/'+ restaurant.id">Visualizza menù</a></li>
          </ul>
        </div>
         {{-- /Card ricerca categorie --}}
    
      </div>
    </div>
  {{-- /Container Card Ristoranti --}}
    
    {{-- <nav class="nav_btn mt-5">
      <div v-for="genre in genres">
        <button class="btn_genre" v-on:click="filterGenreButtons(genre.name)">@{{ genre.name }}</button>
      </div>
    </nav> --}}

    

    <section id="vegan">
       {{-- <h2>I Consigli per i piatti vegani</h2> --}}
       <div v-for="plate in vegans">
         <h4>@{{ plate.name }}</h4>

       </div>
    </section>

</div>   

@include('partials.footer')

@endsection

@section('script')
  <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
  <script src="{{ asset('js/guest-index.js')}}"></script>

  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="assets/js/plugins/moment.min.js"></script>
  <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="assets/js/plugins/bootstrap-datetimepicker.
@endsection