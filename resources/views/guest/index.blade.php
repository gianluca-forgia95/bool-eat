@extends('layouts.guest')

@section('style')
<link rel="stylesheet" href="<%= BASE_URL %>css/darktheme.css"> 
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection

@section('pageTitle')
  Booleat | Home
@endsection

@section('content')

  @include('partials.header')
  <div id="app"> 
    <!-- Jumbotron -->
    <div class="mb-3 jumbotron_wrapper">
      <div class="text-center height-text-jumbotron">
        <div class="d-flex justify-content-center align-items-center "> 
          {{-- jumbotron_content --}}
          <div class="jumbotron_content text-white">
              <img src="" alt="">
              <h1 class="mb-3">Benvenuto su Booleat</h1>
              <div class="title">
                {{-- <h1>Benvenuto<br/>su Booleat</h1> --}}
              </div>
              <h2 class="mb-3">Affidati al top del top, scopri i nostri ristoranti!</h2>
          </div>
        </div>
      </div>
      <div class="text-center jumbotron_bottom">
        <div class="d-flex justify-content-center align-items-center ">
          <div class="text-white">
              <h2 class="mb-4">Cerca e ordina!</h2>
              {{-- Search names --}}
              <input  type="text" placeholder="Nome ristorante" value="" v-model="restaurantName"  v-on:keydown="searchName">
              <button type="button" class="button_card_menu " name="button" v-on:click="searchName"><i class="fas fa-search"></i></button>
              {{-- Search names --}}
          </div>
        </div>
      </div>
    </div>
    <!-- /Jumbotron -->

    {{-- generi --}}
    <div class="wrapper_genres">
      <div id="navbarNav" class="navbar_genres">
        <div class="navbar_genres-cont v-dragscroll.y">
          <div class="active genres_content text-center" v-for="genre in genres">
            <div class="genre-text">
           <img v-bind:src="genre.logo"  v-on:click="filterGenreButtons(genre.name)"  alt="">
           
            <a class="btn-genres"  v-on:click="filterGenreButtons(genre.name)" href="javascript:;">@{{ genre.name }}<span class="sr-only">(current)</span></a>
          </div>
          </div>
        </div>
      </div>
    </div>
    {{-- /generi --}}

    {{-- ristoranti --}}
    <div class="container_card">
      <div class="card_restaurant" v-for="user in users">
          <img v-bind:src="user.logo" alt="">
          <h4>@{{user.restaurant_name}}</h4>
        <div class="overlay">
          {{-- <p class="text card_address mt-2">@{{user.address}}</p> --}}
          <button class="btn_menu_overlay button_card_menu"><a :href="'http://localhost:8000/show/'+ user.id">Visualizza menù</a></button>
        </div>
      </div>
      {{-- /card Ricerca Nome --}}

      {{-- Card ricerca categorie --}}
      <div class="card_restaurant" v-for="restaurant in restaurants">
        <img v-bind:src="restaurant.logo" alt="">
        <h4>@{{restaurant.restaurant_name}}</h4>
        <div class="overlay">
          {{-- <p class="text card_address mt-2">@{{restaurant.address}}</p> --}}
          <button class="btn_menu_overlay button_card_menu"><a :href="'http://localhost:8000/show/'+ restaurant.id">Visualizza menù</a></button>
        </div>
      </div>
      {{-- /Card ricerca categorie --}}
    </div>
    {{-- /ristoranti --}}

    {{-- ristoranti --}}
    <div class="card_container_2">
      <div class="div text-center">
        <h2>I Nostri migliori Ristoranti</h2>
      </div>

      <div class="container_card">
        {{-- Tutti i ristoranti --}}
          @foreach ($users as $user)
              <div class="card_restaurant"> 
                <img src="{{$user->logo}}" alt="">
                <h4>{{$user->restaurant_name}}</h4> 
                <div class="overlay">
                  {{-- <p class="text card_address mt-2">{{$user->address}}</p> --}}
                  <a v-on:click="message({{ json_encode($user->id) }})" href="{{ route('guest.show' , ['user' => $user->id])}}"><button class="btn_menu_overlay button_card_menu">Vai al Menù</button></a>
                </div>
            </div>
          @endforeach
        {{-- /Tutti i ristoranti --}}
      </div>
    </div>
    {{-- /ristoranti --}}
  </div>   

@include('partials.footer')

@endsection

@section('script')
  <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
  <script src="{{ asset('js/guest-index.js')}}"></script>
 @endsection