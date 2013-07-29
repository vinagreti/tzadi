$(document).ready(function(){

  $(".like").live("click", function(){
    var likes = $tzd.product.like( $(this).attr("id") );
  });

  $(".addToBudget").live("click", function(){
    $tzd.budget.add( $(this).attr("id") );
  });

  $(".shareProductByMail").live("click", function(){
    $tzd.product.share.open( $(this).attr("id") );
  });
  
  $(".priceConverted").html($(".currencyCode").html() + " " + $tzd.currency.convert( $(".price").html(), $(".productCurrency").html()).toFixed(2) );
});