(function(){

var Settings =(function () {

    var Settings = function () {
        this.URI = '';
        this.API = this.URI + '/api';
        this.messages = {
        };
    };

    return Settings;

})();

/* globals Settings:true */
var App = (function () {

    var App = function ($rootElement) {
        _.bindAll(this);

        this.$rootElement = $rootElement;

        this.settings = new Settings();
    };

    return App;
})();

/* globals App:true */
var app = new App($("#container"));

})();