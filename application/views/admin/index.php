<?=render('includes.header'); ?>
<?=render('includes.navbar_admin'); ?>
<div class="container">
<div class="content" id="content" style="display:none">
  <div class="page-header">
    <h2>Admin</h2>
  </div>
  <h3>Welcome to the Admin Dashboard!</h3>
  <div class="row">
  <div class="span3 offset1">
    <div class="box box-primary">
      <p>12</p>
      <p>Users</p>
    </div>
  </div>
  <div class="span3">
    <div class="box box-warning">
      <p>32</p>
      <p>Trips</p>
    </div>
  </div>
  <div class="span3">
    <div class="box box-success">
      <p>44</p>
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
