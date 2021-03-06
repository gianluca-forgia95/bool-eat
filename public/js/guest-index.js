/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*************************************!*\
  !*** ./resources/js/guest-index.js ***!
  \*************************************/
new Vue({
  el: '#app',
  data: {
    search: '',
    restaurants: [],
    restaurantName: '',
    users: [],
    genres: [],
    vegans: [],
    usersId: [],
    theme: ''
  },
  //Mounted
  mounted: function mounted() {
    var _this = this;

    axios.get('http://localhost:8000/api/genres').then(function (resp) {
      _this.genres = resp.data; //console.log(this.genres);
    });
    axios.get('http://localhost:8000/api/vegan').then(function (resp) {
      _this.vegans = resp.data; //console.log(this.vegans);
    });
    var localTheme = localStorage.getItem('theme');
    document.documentElement.setAttribute('data-theme', localTheme);
  },
  //\Mounted
  //Methods
  methods: {
    scrollToTop: function scrollToTop() {
      window.scrollTo({
        top: 0,
        behavior: "smooth"
      });
    },
    //Filtro per genres!!!!!
    filterGenre: function filterGenre() {
      var _this2 = this;

      axios.get('http://localhost:8000/api/filterapi/' + this.search, {}).then(function (result) {
        //console.log(result.data);
        _this2.restaurants = result.data; //console.log(this.restaurants);
      });
    },
    //Fine Funzione Filtro per genres!!!!!!!!!!!!
    //Filtro per categorie con bottoni
    filterGenreButtons: function filterGenreButtons(value) {
      var _this3 = this;

      axios.get('http://localhost:8000/api/filterapi/' + value, {}).then(function (result) {
        _this3.users = []; //console.log(result.data);

        _this3.restaurants = result.data; //console.log(this.restaurants);
      });
    },
    // Fine Filtro per categorie con bottoni
    searchName: function searchName() {
      var _this4 = this;

      var link = 'http://localhost:8000/api/names';
      axios.get(link, {
        params: {
          restaurant_name: this.restaurantName
        }
      }).then(function (result) {
        _this4.restaurants = [];
        _this4.users = result.data;
      });
    }
  } //\Methods

});
/******/ })()
;