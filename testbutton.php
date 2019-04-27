<script type="text/javascript">
  (function() {
    var po = document.createElement('script');
    po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/client:plusone.js?onload=render';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(po, s);
  })();

  function render() {
    gapi.signin.render('customBtn', {
      'callback': 'signinCallback',
      'clientid': 'xxxxxxxxxx.apps.googleusercontent.com',
      'cookiepolicy': 'single_host_origin',
      'scope': 'https://www.googleapis.com/auth/plus.login'
    });
  }
  function signinCallback(authResult) {
    // Respond to signin, see https://developers.google.com/+/web/signin/
  }
</script>
<div id="customBtn" class="customGPlusSignIn">
  <span class="icon"></span>
  <span class="buttonText">Google</span>
</div>