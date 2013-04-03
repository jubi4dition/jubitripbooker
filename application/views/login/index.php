<?=render('includes.header_admin'); ?>
<?=render('includes.navbar_login'); ?>
<div class="container">
<div class="content" id="content" style="display:none">
  <div class="page-header">
    <h1>Login</h1>
  </div>
  <div class="row">
  <div class="span5 offset1">
    <form class="well" action="<?=Url::to('login/check'); ?>" method="post" accept-charset="utf-8">
      <input type="text" class="input-block-level" name="firstname" placeholder="Your Firstname" required maxlength="40" autofocus>
      <input type="text" class="input-block-level" name="lastname" placeholder="Your Lastname" required maxlength="40">
      <input type="text" class="input-block-level" name="number" placeholder="Your Number" required maxlength="6">
      <button type="submit" class="btn btn-primary btn-block">
      <i class="icon-home icon-white"></i> Login</button>
    </form>
  </div>
  <div class="span5">
      <div class="alert alert-info">
        Welcome to the <strong>JubiTripBooker</strong>! <br>Login in and book your trips or watch your booked trips!
      </div>
  </div>
  </div>
  <? if (isset($error)): ?>
  <div class="row">
  <div class="span4">
    <div class="alert alert-error">
      <strong>Login</strong> failed!.
    </div>
  </div>
  </div>
  <? endif; ?>
</div>
<?=render('includes.footer'); ?>
</div>
<?=HTML::script('js/jquery.js'); ?>
<script>
$(document).ready(function() {
  
  $('#content').fadeIn(1000);

});
</script>
</body>
</html>
