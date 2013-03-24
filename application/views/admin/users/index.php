<?=render('includes.header'); ?>
<?=render('includes.navbar_admin'); ?>
<div class="container">
<div class="content" id="content" style="display:none">
  <div class="page-header">
    <h2>Users</h2>
  </div>
  <div class="row">
  <div class="span2 offset1">
    <a href="<?=URL::to('admin/users/show'); ?>" class="btn btn-primary btn-block">Show</a>
  </div>
  <div class="span2">
    <a href="<?=URL::to('admin/users/add'); ?>" class="btn btn-success btn-block">Add</a>
  </div>
  <div class="span2">
    <a href="<?=URL::to('admin/users/search'); ?>" class="btn btn-warning btn-block">Search</a>
  </div>
  <div class="span2">
    <a href="<?=URL::to('admin/users/delete'); ?>" class="btn btn-danger btn-block">Delete</a>
  </div>
  </div>
</div>
<?=render('includes.footer'); ?>
</div>
<?=HTML::script('js/jquery.js'); ?>
<script>
$(document).ready(function() {

  $('#content .btn').css('padding', '40px 0px');
  
  $('#content').fadeIn(1000);
  
});
</script>
</body>
</html>
