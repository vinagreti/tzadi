$(document).ready(function(){
  var vitrine = new function() {
    var body = $(".itensList");
    var productHtml = body.find(".product").clone();
    productHtml.removeClass("hide");
    body.find(".product").remove();
    var lineHtml = body.find(".line").clone();
    body.find(".line").remove();

    this.products = [];
    this.kind = "all";

    this.product = function( objProduct ) {
      var product = productHtml.clone();
      var productPrice = $tzd.currency.convert(objProduct.price, objProduct.currency).toFixed(2)
      productPrice -= $tzd.currency.convert( objProduct.discount, objProduct.discountCurrency );
      product.attr("id", objProduct._id);
      if(objProduct.img) product.find(".img").attr("src", base_url+"file/open/"+objProduct.img[0]);
      product.find(".name").html(objProduct.name);
      product.find(".price").html($(".currencyCode").html() + " " + productPrice.toFixed(2) );
      product.find(".likes").html(objProduct.like);
      product.find(".open").attr("href", base_url+objProduct._id+"/"+$tzd.string.makeURL( objProduct.name ));
      if(objProduct.detail) product.find(".detail").html(objProduct.detail.split('', 64));
      return product;
    };
    this.reload = function(){
      var self = this;
      var url = base_url+'product/getPublic';
      var data = {
        tzadiToken : tzadiToken
      };
      var callback = function( e ){
        self.products = e;
        self.search($(".seacrh").val());
      };
      $tzd.ajax.post(url, data, callback);
    };
    this.addProduct = function( objProduct ){
      var product = new this.product( objProduct );
      var line = body.find(".line").last();
      if( line.length == 0 || line.find(".product").length == 4) {
        line = lineHtml.clone();
        body.append(line);
      }
      line.append(product);
    };
    this.clear = function(){
      $(".itensList").empty();
    };
    this.search = function( searchString ){
      var self = this;
      if( searchString == "") {
        $('.search').val("");
        self.clear();
        $.each(self.products, function( id, objProduct ){
          if( self.kind == "all" || self.kind == objProduct.kind ) self.addProduct( objProduct );
        });
        self.reCalc( self.products );
      } else {
        var foundProducts = self.products.filter(function ( product ) {
          var contain = contain || product.name.search(new RegExp(searchString, "i")) >= 0;
          return contain;
        });
        self.clear();
        $.each(foundProducts, function( id, objProduct ){
          if( self.kind == "all" || self.kind == objProduct.kind ) self.addProduct( objProduct );
        });
        self.reCalc( foundProducts );
      }
    };
    this.reCalc = function( productList ){
      $(".filterKind").find(".found").html("0");
      $(".filterKind").hide();
       $("#all").show();

      $.each(productList, function( id, objProduct ){
        var total = parseInt($("#"+objProduct.kind).find(".found").html()) + 1;
        $("#"+objProduct.kind).find(".found").html(total);
        var all = parseInt($("#all").find(".found").html()) + 1;
        $("#all").find(".found").html(all);
      });

      if( $("#accommodation").find(".found").html() > 0 ) $("#accommodation").show();
      if( $("#course").find(".found").html() > 0 ) $("#course").show();
      if( $("#pass").find(".found").html() > 0 ) $("#pass").show();
      if( $("#ensurance").find(".found").html() > 0 ) $("#ensurance").show();
      if( $("#tourism").find(".found").html() > 0 ) $("#tourism").show();
      if( $("#transfer").find(".found").html() > 0 ) $("#transfer").show();
      if( $("#work").find(".found").html() > 0 ) $("#work").show();
      if( $("#regularProduct").find(".found").html() > 0 ) $("#regularProduct").show();
      if( $("#package").find(".found").html() > 0 ) $("#package").show();
      if( $("#service").find(".found").html() > 0 ) $("#service").show();

    };
  };

  vitrine.reload();

  $(".like").live("click", function(){
    var productID = $(this).parents(".product").attr("id");
    vitrine.like( productID );
  });

  $(".addToBudget").live("click", function(){
    var productID = $(this).parents(".product").attr("id");
    $tzd.budget.add(productID);
  });

  $(".shareProductByMail").live("click", function(){
    var productID = $(this).parents(".product").attr("id");
    $tzd.mail.shareProduct.open( productID );
  });

  $('.search').live('keyup propertychange', function(){
    vitrine.search( $(this).val() );
  });

  $(".clearSearch").live("click", function(){
    vitrine.search( "" );
  });

  $(".filterKind").live("click", function(){
    $(".filterKind").removeClass("active");
    $(this).addClass("active");
    vitrine.kind = $(this).attr("id");
    vitrine.search( $('.search').val() );
  });
});