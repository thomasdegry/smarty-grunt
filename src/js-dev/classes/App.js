/* globals Settings:true */
var App = (function () {

    var App = function ($rootElement) {
        _.bindAll(this);

        this.$rootElement = $rootElement;

        this.settings = new Settings();
    };

    return App;
})();