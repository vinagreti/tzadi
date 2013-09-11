$(document).ready(function(){
  var Budget = function(){
    var itemHtml = $(".item").clone();
    itemHtml.removeClass("hide");
    $(".item").remove();

    this.reload = function(){
      var totalPrice = 0;
      $.each($tzd.budget.getCookie(), function( productID, amount  ){
        var line = itemHtml.clone();
        line.attr("id", productID);
        $(".list").append(line);

        var url = base_url+'product/getByID';
        var data = {
          tzadiToken : tzadiToken
          , productID : productID
        };
        var callback = function( product ){

          if( product ){

            if( ! product.price || isNaN(product.price)) product.price = 0;
            line.find(".amount").val(amount);
            line.find(".productName").html(product.name).attr("href", base_url+"product/view/"+product._id);
            line.find(".productImg").attr("href", base_url+"product/view/"+product._id);
            line.find(".price").html(product.price);
            line.find(".code").html(product._id);
            var total = amount*product.price;
            line.find(".total").html( total );
            if(product.img) line.find("img").attr("src", base_url+"file/open/"+product.img[0]);
            line.find(".totalValueConverted").html( $tzd.currency.convert(total, product.currency).toFixed(2) );
            totalPrice += $tzd.currency.convert(total, product.currency);
            $(".totalPrice").html(totalPrice.toFixed(2));
            line.find(".productCurrency").html(product.currency);

          } else {

            line.find(".tzdTableRow").html( $("#pdt_TheProduct").html() + " " + productID + " " + $("#pdt_wasNotFound").html() );

          }

        };

        $tzd.ajax.post(url, data, callback);
      });
    };
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

  $(".amount").live("change propertychange", function(){
    var amount = parseInt($(this).val());

    if(amount < 0) {
      $(this).val("0");
    } else {
      var line = $(this).parents(".item");
      var itemID = line.attr("id");
      $tzd.budget.setAmount(itemID, amount);
      var oldTotalConverted = parseFloat(line.find(".totalValueConverted").html());
      var price = parseInt(line.find(".price").html());
      var total = amount*price;
      var totalConverted = $tzd.currency.convert(total, $(".productCurrency").html());
      if(total < 0) total = 0;
      line.find(".total").html(total.toFixed(2));
      line.find(".totalValueConverted").html( totalConverted.toFixed(2) );
      var totalPrice = parseFloat($(".totalPrice").html());
      totalPrice += totalConverted - oldTotalConverted;
      $(".totalPrice").html(totalPrice.toFixed(2));
    }
  });

  $(".shareBudget").live("click", function(){
    $tzd.product.shareBudget.open( $(this).attr("id") );
  });

  $(".knowMoreBudget").live("click", function(){
    $tzd.product.knowMoreBudget.open( $(this).attr("id") );
  });
  
});