<?=render('includes.header'); ?>
<?=render('includes.navbar_admin'); ?>
<div class="container">
<div class="content" id="content" style="display:none">
  <div class="page-header">
    <h2>Users</h2>
  </div>
  <div class="row">
  <div class="span5 offset3">
    <a href="<?=URL::to('admin/users/show'); ?>" class="btn btn-primary btn-block">Show</a>
  </div>
  </div>
  <br>
  <div class="row">
  <div class="span5 offset3">
    <a href="<?=URL::to('admin/users/search'); ?>" class="btn btn-warning btn-block">Search</a>
  </div>
  </div>
  <br>
  <div class="row">
  <div class="span5 offset3">
    <a href="<?=URL::to('admin/users/add'); ?>" class="btn btn-success btn-block">Add</a>
  </div>
  </div>
</div>
<?=render('includes.footer'); ?>
</div>
<?=HTML::script('js/jquery.js'); ?>
<script>
$(document).ready(function() {

  $('#content .btn').css('padding', '30px 0px');
  
  $('#content').fadeIn(1000);
  
});
</script>
</body>
</html>
