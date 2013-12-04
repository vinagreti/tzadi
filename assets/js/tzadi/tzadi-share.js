if( ! shareButtons ){

  var shareButtons = function(){

    // Load the FACEBOOK SDK asynchronously
    (function(d, s, id) {
        var js;
        var fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=532888376778430";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
        
    // Load the GOOGLE SDK asynchronously
    (function() {
      var po = document.createElement('script');
      po.type = 'text/javascript';
      po.async = true;
      po.src = 'https://apis.google.com/js/plusone.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
    })();

    // Load the TWITTER SDK asynchronously
    (function(d,s,id){
      var js;
      var fjs=d.getElementsByTagName(s)[0];
      var p=/^http:/.test(d.location)?'http':'https';
      if(d.getElementById(id)) return;
      js=d.createElement(s);
      js.id=id;
      js.src=p+'://platform.twitter.com/widgets.js';
      fjs.parentNode.insertBefore(js,fjs);
    }(document, 'script', 'twitter-wjs'));

    // Load the LINKEDIN SDK asynchronously
    (function(d, s, id) {
        var js;
        var fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//platform.linkedin.com/in.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'linkedin-injs'));

  }

  shareButtons();

}