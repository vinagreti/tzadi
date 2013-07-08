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
          line.find(".amount").val(amount);
          line.find("a").html(product.name).attr("href", base_url+"product/view/"+product._id);
          if(product.img) line.find("img").attr("src", base_url+"file/open/"+product.img);
          line.find(".price").html(product.price);
          line.find(".total").html(amount*product.price);
          totalPrice += amount*product.price;
          $(".totalPrice").html(totalPrice);
        };

        $tzd.ajax.post(url, data, callback);
      });
    };
  };

  budget = new Budget();
  budget.reload();
});

$(document).ready(function(){
  $(".empty").live("click", function(){
    $tzd.budget.empty();
    $(".list").empty();
    $(".totalPrice").html(0);
  });

  $(".reload").live("click", function(){
    $(".list").empty();
    budget.reload();
  });

  $(".amount").live("change propertychange", function(){
    var amount = $(this).val();
    if(amount < 0) {
      $(this).val("0");
    } else {
      var line = $(this).parents(".item");
      var itemID = line.attr("id");
      $tzd.budget.setAmount(itemID, parseInt(amount));
      var price = parseInt(line.find(".price").html());
      var oldTotal = parseInt(line.find(".total").html());

      var total = amount*price;
      if(total < 0) total = 0;
      line.find(".total").html(total);
      var totalPrice = parseInt($(".totalPrice").html());
      if(totalPrice < 0) totalPrice = 0;
      $(".totalPrice").html(totalPrice+total-oldTotal);
    }
  });
});