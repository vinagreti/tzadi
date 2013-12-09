$(document).ready(function(){

  var Budget = function(){

    var itemHtml = $(".item").clone();

    itemHtml.removeClass("hide");

    $(".item").remove();

    this.totalPrice = 0;

    this.items = {};

    this.reload = function(){

      var self = this;

      $.each( $tzd.budget.getCookie() , function( productID, amount  ){

        this

        var line = itemHtml.clone();

        line.attr("id", productID);

        $(".list").prepend(line);

        var url = base_url+'product/getByID';

        var data = {

          tzadiToken : tzadiToken

          , productID : productID

        };

        var callback = function( product ){

          self.items[product._id] = product;

          if( product ){

            if( ! product.priceFinal || isNaN(product.priceFinal)) product.priceFinal = 0;

            line.find(".amount").html(amount);

            line.find(".productName").html(product.name).attr("href", line.find(".productName").attr("href")+product._id);

            line.find(".price").html(product.priceFinal.toFixed(2));

            line.find(".code").html(product._id);

            self.refreshValues( productID, amount );

          } else {

            line.find(".tzdTableRow").html( $("#pdt_TheProduct").html() + " " + productID + " " + $("#pdt_wasNotFound").html() );

          }

        };

        $tzd.ajax.post(url, data, callback);

      });

    };

    this.refreshValues = function( productID, amount, oldAmount ){

      var product = this.items[productID];

      var line = $( "#"+ productID );

      var total = amount*product.priceFinal;

      line.find(".total").html( total.toFixed(2) );

      if(product.img) line.find("img").attr("src", base_url+"file/open/"+product.img[0]);

      line.find(".totalValueConverted").html( $tzd.currency.convert(total, product.currency).toFixed(2) );

      this.totalPrice += $tzd.currency.convert( total, product.currency);

      if( oldAmount ) this.totalPrice -= $tzd.currency.convert(oldAmount*product.priceFinal, product.currency);

      $(".totalPrice").html(this.totalPrice.toFixed(2));

      line.find(".productCurrency").html(product.currency);

    };

    this.changeAmount = function( amountField ){

      var amount = parseInt(amountField.html());

      if( ! amount >= 1 ) {

        amountField.html(1);

      } else {

        var line = amountField.parents(".item");

        var productID = line.attr("id");

        $tzd.budget.getCookie()

        var oldAmount = $tzd.budget.getAmount( productID );

        $tzd.budget.setAmount( productID, amount );

        budget.refreshValues( productID, amount, oldAmount );

      }

    }

  };

  budget = new Budget();
  budget.reload();

  $(".empty").live("click", function(){
    $tzd.confirm($("#pdt_wantToEmpty").html(), function(){
      $tzd.budget.empty();
      $(".list").empty();
      $(".totalPrice").html(0);
      $(".productConvertCurrency").html("");
    })
  });

  $(".reload").live("click", function(){
    $(".list").empty();
    budget.reload();
  });

  $(".openShareBudget").live("click", function(){
    $tzd.product.shareBudget.open( $(this).attr("id") );
  });

  $(".openKnowMoreBudget").live("click", function(){
    $tzd.product.knowMoreBudget.open( $(this).attr("id") );
  });

  $(".amount").live("keyup paste input", function(){

    budget.changeAmount( $(this) );

  });

  $(".amountMinus").live("click", function(){
    var amount = Number( $(this).parent().find(".amount").html() ) - 1;
    $(this).parent().find(".amount").html( amount );
    budget.changeAmount( $(this).parent().find(".amount") );
  });

  $(".amountPlus").live("click", function(){
    var amount = Number( $(this).parent().find(".amount").html() ) + 1;
    $(this).parent().find(".amount").html( amount );
    budget.changeAmount( $(this).parent().find(".amount") );
  });

  $(".removeItem").live("click", function(){

    var line = $(this).parents(".item");

    var productID = line.attr("id");

    $("#"+productID).remove();

    var amount = $tzd.budget.getAmount( productID );

    var product = budget.items[productID];

    budget.totalPrice -= $tzd.currency.convert(amount*product.priceFinal, product.currency);

    $(".totalPrice").html( Math.abs(budget.totalPrice).toFixed(2) );

  });
});