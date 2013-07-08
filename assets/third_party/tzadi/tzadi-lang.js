$( "#translate_en" ).live("click", function() {
  $.ajax({
    url: base_url + "user/changeLang/english"
  })
  .done(function() {
    location.reload();
  });
});

$( "#translate_pt-BR" ).live("click", function() {
  $.ajax(base_url + "user/changeLang/pt-BR", function( e ) {
    location.reload();
  })
  .done(function() {
    location.reload();
  });
});