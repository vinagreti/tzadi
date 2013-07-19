$( "#en" ).live("click", function() {
  $.ajax({
    url: base_url + "user/changeLang/en"
  })
  .done(function() {
    location.reload();
  });
});

$( "#pt" ).live("click", function() {
  $.ajax(base_url + "user/changeLang/pt", function( e ) {
    location.reload();
  })
  .done(function() {
    location.reload();
  });
});