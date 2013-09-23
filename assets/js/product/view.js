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

  $(".knowMore").live("click", function(){
    $tzd.product.knowMore.open( $(this).attr("id") );
  });
  
  // Load the FACEBOOK SDK asynchronously - like
  (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=532888376778430";
      fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
      
  // Load the GOOGLE plusone asynchronously
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
  
});