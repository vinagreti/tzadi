$(document).ready(function(){

  var productID = $(".productID").html();

  $(".like").live("click", function(){
    var likes = $tzd.product.like( productID );
    $(".like").find(".likes").html( 3 );
  });

  $(".addToBudget").live("click", function(){
    $tzd.budget.add( productID );
  });

  $(".shareProductByMail").live("click", function(){
    $tzd.mail.shareProduct.open( productID );
  });
  
});