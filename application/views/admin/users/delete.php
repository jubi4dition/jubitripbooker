<?=render('includes.header'); ?>
<?=render('includes.navbar_admin'); ?>
<div class="container">
<div class="content" id="content" style="display:none">
  <div class="page-header">
    <h2>Users Delete</h2>
  </div>
  <div class="row">
  <div class="span5 offset3">
    <form id="formDelete" class="well" action="<?=Url::to('admin/users/delete'); ?>" method="post" accept-charset="utf-8">
        <select id="formSelect" name="userID" class="input-block-level">
        <? foreach ($users as $user): ?>
          <option value="<?=$user->id; ?>"><?=$user->number; ?></option>
        <? endforeach; ?>
        </select>
        <button type="submit" class="btn btn-danger btn-large">
        <i class="icon-trash icon-white"></i> Delete User</button>
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
