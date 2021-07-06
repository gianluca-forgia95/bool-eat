@extends('layouts.guest')

@section('style')

<link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
@endsection

@section('pageTitle')
  Booleat | {{$user->restaurant_name}} | Menu
@endsection

@section('content')

  @include('partials.header')

  <div id="cart" >
    @if (count($user->plates) > 0)
        
    <div class="menu">
      <h1 class="">{{$user->restaurant_name}}</h1>
      <div class="wrapper_plate">

      @foreach ($user->plates as $plate)
      @if ($plate->visible == 1)
        {{-- piatto singolo e info--}}
        <div class="restaurant_plate box-padding">
          {{-- Img Plate --}}
            <div class="img-plate">
              <img src="{{ asset('storage/' . $plate->image )}}" alt="{{$plate->name}}" style="">
            </div>
          {{-- /Img Plate --}}
            {{-- Info Plate --}}
            <div class="info-plate">
              <h3>{{$plate->name}}</h3>
              <div class="price-plate">
                {{-- <h4 class="font-weight-bold">Portata</h4> --}}
                <p><span>Portata: </span>{{ $plate->scope }}</p>
                <p class="font-weight-bold"><span>Prezzo: </span>{{$plate->price}} &euro;</p>
              </div>
             
              <p><span>Ingredienti: </span>{{ $plate->ingredients }}</p>
            </div>
          {{-- /Info Plate --}}
          {{-- Button add to cart --}}
            <div class="add-to-cart">
              <div class="icon-cart" v-on:click="generalAdding({{ json_encode($plate) }},{{ json_encode($plate->id) }}, {{ json_encode($plate->name) }}, {{ json_encode($plate->price) }}, {{ json_encode($plate->user_id) }}); totalPrice({{ json_encode($plate->price) }})">
              <i class="fas fa-cart-arrow-down"></i>
              </div>
            </div>
          {{--/Button add to cart --}}
          
          
        </div>
        @endif
      @endforeach
    </div>
    </div>
    @else
    <h1>Non ci sono piatti per questo Ristorante!</h1>
    @endif

    @if (count($user->plates) > 0)
    <div class="shopping_cart">
      <div v-if="namePlatesShow.length != 0" class="cart_top">
        <h3>Totale: @{{sum}} &euro;</h3>
        {{-- <img src="{{asset('images/shopping-cart.png')}}" alt=""> --}}
        <i class="fas fa-shopping-cart"></i>
      </div>
      {{-- <h3>Carrello</h3> --}}
      <div class="elements_container" v-if="namePlatesShow.length > 0">
        {{-- Increment --}}
        <div class="plus">
          <i v-for="(namePlate, index) in namePlatesShow" v-on:click="adding(index)" class="fas fa-plus-square"></i>
        </div>
        {{-- /Increment --}}
        {{-- Decrement --}}
        <div class="plus">
          <i v-for="(namePlate, index) in namePlatesShow"  v-on:click="remove(index)" class="fas fa-minus-square"></i>
        </div>
        {{-- /Decrement --}}

        <div class="number-input">
          <p v-if="show == true" v-for="element in quantity"><i class="fas fa-times"></i> @{{element}}</p>
        </div>
        
   
        
        <div class="name">
          <p v-for="namePlate in namePlatesShow"> @{{namePlate}}</p>
        </div>
        
        {{-- <div class="price">
          <p v-for="price in pricesShow">@{{price}} &euro;</p>
        </div> --}}

        <div class="button">
          <button v-on:click="removeCartElement(index); removePrice(index, price)" v-for="(price, index) in pricesShow" v-if="namePlatesShow.length != 0" class="btn btn-danger"><i class="fas fa-trash trash"></i></button>
        </div>        
      </div>

      {{-- <div class="sum mt-4 mb-4">
        <h3 v-if="namePlatesShow.length != 0" >Totale: @{{sum}} &euro;</h3>
      </div> --}}

      <div class="checkout" v-if="namePlatesShow.length != 0" class="submit mt-3">
        <button v-on:click="addStorage()"  class="btn mt-3"><a href="{{ route('guest.checkout' , $user->id)}}">Checkout</a></button>
      </div>
    
    </div>
    @endif
    
  </div>

 @include('partials.footer')

@endsection


@section('script')
  <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
  <script src="{{ asset('js/guest_cart.js')}}"></script>

  
@endsection

