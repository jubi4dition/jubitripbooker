<?=render('includes.header'); ?>
<?=render('includes.navbar_admin'); ?>
<div class="container">
<div class="content" id="content" style="display:none">
  <div class="page-header">
    <h2>Users Add</h2>
  </div>
  <div class="row">
  <div class="span5 offset3">
    <form id="formAdd" action="<?=URL::to('admin/users/add'); ?>" method="post" class="well" accept-charset="utf-8">
      <input type="text" name="firstname" class="input-block-level" placeholder="Firstname" required maxlength="60" autofocus>
      <input type="text" name="lastname" class="input-block-level" placeholder="Lastname" required maxlength="60">
       <input type="text" name="number" class="input-block-level" placeholder="Number" required maxlength="6">
      <button type="submit" class="btn btn-success btn-large">
      <i class="icon-plus icon-white"></i> Add User</button>
    </form>
  </div>
  </div>
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
