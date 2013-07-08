var TzadiJS = function(){
  this.creator = "Bruno da Silva João";
  this.version = "1.0";
};

var $tzd = new TzadiJS;

// abstrair as funcionalidades abaixo
// criando seus respectivos plugins e extendendo a classe TzadJS
var tzadiToken = $('input[name=tzadiToken]').val();

jQuery.fn.reset = function () {
  $(this).each (function() { this.reset(); });
}