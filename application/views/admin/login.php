<?=render('includes.header'); ?>
<?=render('includes.navbar_login'); ?>
<div class="container">
<div class="content" id="content" style="display:none">
  <div class="page-header">
    <h2>Login - Admin</h2>
  </div>
  <div class="row">
  <div class="span4">
    <form class="well" action="<?=Url::to('admin/auth'); ?>" method="post" accept-charset="utf-8">
      <input type="text" class="input-block-level" name="administrator" placeholder="Administrator" required maxlength="60" autofocus>
      <input type="password" class="input-block-level" name="password" placeholder="Password" required maxlength="60">
      <button type="submit" class="btn btn-primary btn-block">
      <i class="icon-home icon-white"></i> Login</button>
    </form>
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
<?=HTML::script('js/jquery.js'); ?>
<script>

$(document).ready(function() {
  
  $('#content').fadeIn(1000);
});

</script>
<?=render('includes.footer'); ?>
