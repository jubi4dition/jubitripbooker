<?=render('includes.header'); ?>
<?=render('includes.navbar_admin'); ?>
<div class="container">
<div class="content" id="content" style="display:none">
  <div class="page-header">
    <h2>Users</h2>
  </div>
  <h3>Manage the Users!</h3>
  <div class="row">
  <div class="span4">
    <a href="<?=URL::to('admin/users/show'); ?>" class="btn btn-primary btn-box">Show</a>
  </div>
  <div class="span4">
    <a href="<?=URL::to('admin/users/search'); ?>" class="btn btn-warning btn-box">Search</a>
  </div>
  <div class="span4">
    <a href="<?=URL::to('admin/users/add'); ?>" class="btn btn-success btn-box">Add</a>
  </div>
  </div>
</div>
<?=render('includes.footer'); ?>
</div>
<?=HTML::script('js/jquery.js'); ?>
<script>
$(document).ready(function() {

  $('#nav-users').addClass('active');
  
  $('#content').fadeIn(1000);
  
});
</script>
</body>
</html>
