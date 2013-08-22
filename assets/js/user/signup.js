$(document).ready(function(){
  
  $("#submitLogin").live("click", function() {

    var valid = true;
   
    valid = valid && $tzd.form.checkMask.email($('#email'), $(".usr_validate_mail").html());

    valid = valid && $tzd.form.checkMask.range($('#password'), 1, 65535, $(".usr_validate_password").html());

    if ( valid ) {

      var url = base_url+'user/signup';

      url.replace("http","https");

      var data = {

        tzadiToken : tzadiToken

        , email : $("#email").val()

        , password : $("#password").val()

      };

      var callback = function( res ) {

        if( res.error ) $tzd.alert.error( res.error );

        if( res.url ) window.location = res.url;

      }

      $tzd.ajax.post(url, data, callback);

    }

  });

  $("#password").keyup(function(event){

      if(event.keyCode == 13) $("#submitLogin").click();

  });

  $("#email").keyup(function(event){

      if(event.keyCode == 13) $("#submitLogin").click();
      
  });

  $('#linkedin').click(function(){

    $('#buttonContent').html('<script type="IN/Login" data-onauth="onLinkedInAuth"></script>');

    IN.User.authorize(onLinkedInAuth);

  });

});

window.fbAsyncInit = function() {

  // init the FB JS SDK
  FB.init({
    appId      : '532888376778430' // App ID from the app dashboard
    , channelUrl : '//WWW.TZADI.COM/' // Channel file for x-domain comms
    , status     : true // Check Facebook Login status
    , xfbml      : true // Look for social plugins on the page
    , cookie : true
  });

  // Additional initialization code such as adding Event Listeners goes here
  $("#facebook").live("click", function(){

    FB.login( function(response) {

      if(response.status === "connected") {

        FB.api("/me", function( e ){

          var url = base_url+'user/facebookAuthenticate';

          url.replace("http","https");

          var data = {

            tzadiToken : tzadiToken

            , data : e

          };

          var callback = function( res ) {

            if( res.error ) $tzd.alert.error( res.error );

            if( res.url ) window.location = res.url;

          }

          $tzd.ajax.post(url, data, callback);

        });

      } else if ( response.status === "not_authorized") {

        FB.login();

      } else {

       $tzd.alert.error( response );

      }

    }, {

      scope: 'email,user_likes'

    });

  });
};

// Load the LINKEDIN OAUTH asynchronously
$.getScript("https://platform.linkedin.com/in.js?async=true", function framework_loaded_cb() {
  IN.init({
    api_key: "7562o4xdntza"
    , authorize: true
  });
});

// linkedin linkedin oauth callback
function onLinkedInAuth() {
  IN.API.Profile("me")
  .fields("id", "firstName", "lastName", "picture-url", "emailAddress")
  .result( function( e ) {

    var url = base_url+'user/linkedinAuthenticate';

    url.replace("http","https");

    var data = {

      tzadiToken : tzadiToken

      , data : e["values"][0]

    };

    var callback = function( res ) {

      if( res.error ) $tzd.alert.error( res.error );

      if( res.url ) window.location = res.url;

    }

    $tzd.ajax.post(url, data, callback);
  });
}

// Load the GOOGLE OAuth asynchronously
(function() {
  var po = document.createElement('script');
  po.type = 'text/javascript';
  po.async = true;
  po.src = 'https://apis.google.com/js/client.js?onload=handleGoogleLoad';
  var s = document.getElementsByTagName('script')[0];
  s.parentNode.insertBefore(po, s);
})();

function handleGoogleLoad(){

  gapi.client.setApiKey('AIzaSyCr6HYJyDfbPaMWsEmjtiRoOMwlfHwiDJE');

  function handleAuthResult(authResult) {
    var authorizeButton = document.getElementById('google');
    if (authResult && !authResult.error) {
      makeApiCall();
    } else {
      authorizeButton.onclick = handleAuthClick;
    }
  }

  function handleAuthClick(event) {
    // Step 3: get authorization to use private data
    gapi.auth.authorize({client_id: '1020857287858.apps.googleusercontent.com', scope: 'https://www.googleapis.com/auth/userinfo.email', immediate: false}, handleAuthResult);
    return false;
  }

  // Load the API and make an API call.  Display the results on the screen.
  function makeApiCall() {
    // Step 4: Load the Google+ API
    gapi.client.load('plus', 'v1', function() {
      // Step 5: Assemble the API request

      var request = gapi.client.plus.people.get( {'userId' : 'me'} );

      // Step 6: Execute the API request
      request.execute(function(resp) {

        gapi.client.load('oauth2', 'v2', function() {
          
          gapi.client.oauth2.userinfo.get().execute(function(e) {

            resp.email = e.email;

            var url = base_url+'user/googleAuthenticate';

            url.replace("http","https");

            var data = {

              tzadiToken : tzadiToken

              , data : resp

            };

            var callback = function( res ) {

              if( res.error ) $tzd.alert.error( res.error );

              if( res.url ) window.location = res.url;

            }

            $tzd.ajax.post(url, data, callback);

          })

        });

      });
    });
  }

  $('#google').click(function(){

    gapi.auth.authorize({client_id: '1020857287858.apps.googleusercontent.com', scope: 'https://www.googleapis.com/auth/userinfo.email', immediate: true}, handleAuthResult);

  });

}


