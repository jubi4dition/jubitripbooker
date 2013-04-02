<?=render('includes.header'); ?>
<?=render('includes.navbar_admin'); ?>
<div class="container">
<div class="content" id="content" style="display:none">
  <div class="page-header">
    <h2>Admin</h2>
  </div>
  <h3>Welcome to the Admin Dashboard!</h3>
  <div class="row">
  <div class="span4">
    <div class="box box-primary">
      <p><?=Users::count(); ?></p>
      <p>Users</p>
    </div>
  </div>
  <div class="span4">
    <div class="box box-warning">
      <p><?=Trips::count(); ?></p>
      <p>Trips</p>
    </div>
  </div>
  <div class="span4">
    <div class="box box-success">
      <p><?=Bookings::count(); ?></p>
      <p>Bookings</p>
    </div>
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
