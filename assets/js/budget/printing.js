$(document).ready(function(){

  var Budget = function(){

    var itemHtml = $(".item").clone();

    itemHtml.removeClass("hide");

    $(".item").remove();

    this.totalPrice = 0;

    this.items = {};

    this.reload = function(){

      var self = this;

      var budgetProducts = $.parseJSON( $tzd.url.get("products")[0] );

      $.each( budgetProducts , function( productID, amount  ){

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

            line.find(".tzdTableRow").html( $("#bdg_TheProduct").html() + " " + productID + " " + $("#bdg_wasNotFound").html() );

          }

        };

        $tzd.ajax.post(url, data, callback);

      });

      window.print();

      window.onfocus=function(){

        window.close();

      }

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

  };

  budget = new Budget();

  budget.reload();

  $(".navbar, .footer").remove();

});