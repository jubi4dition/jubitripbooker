<?=render('includes.header'); ?>
<?=render('includes.navbar_admin'); ?>
<div class="container">
<div class="content" id="content" style="display:none">
  <div class="page-header">
    <h2>All Users</h2>
  </div>
  <div class="row">
  <div class="span12">
  <table class="table table-striped">
  <thead>
    <tr>
      <th>Number</th>
      <th>Firstname</th>
      <th>Lastname</th>
      <th>Actions</th>
    </tr>
  </thead>
  <? foreach ($users->results as $user): ?>
  <tr>
    <td><?=$user->number; ?></td>
    <td><?=$user->firstname; ?></td>
    <td><?=$user->lastname; ?></td>
    <td>
      <a href="<?=Url::to('admin/users/bookings/'.$user->number); ?>" class="btn btn-small btn-info">Bookings</a>
      <a href="<?=Url::to('admin/users/delete/'.$user->number); ?>" class="btn btn-small btn-danger">Delete</a>
    </td>
  </tr>
  <? endforeach; ?>
  </table>
  </div>
  </div>
  <div class="row">
  <div class="span5 offset3">
    <?=$users->links(); ?>
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
