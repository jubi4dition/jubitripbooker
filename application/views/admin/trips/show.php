<?=render('includes.header'); ?>
<?=render('includes.navbar_admin'); ?>
<div class="container">
<div class="content" id="content" style="display:none">
  <div class="page-header">
    <h2>Trips All</h2>
  </div>
  <div class="row">
  <div class="span11">
  <table class="table table-striped">
  <thead>
    <tr>
      <th>Number</th>
      <th>Title</th>
      <th>Cost</th>
      <th>Location</th>
      <th>Day</th>
      <th>Actions</th>
    </tr>
  </thead>
  <? foreach ($trips->results as $trip): ?>
  <tr>
    <td><?=$trip->number; ?></td>
    <td><?=$trip->title; ?></td>
    <td><?=$trip->cost; ?>€</td>
    <td><?=$trip->name; ?></td>
    <td><?=$trip->day; ?></td>
    <td>
      <a href="<?=Url::to('admin/trips/status/'.$trip->number); ?>" class="btn btn-small btn-info">Status</a>
      <a href="<?=Url::to('admin/trips/delete/'.$trip->number); ?>" class="btn btn-small btn-danger">Delete</a>
    </td>
  </tr>
  <? endforeach; ?>
  </table>
  </div>
  </div>
  <div class="row">
  <div class="span5 offset3">
    <?=$trips->links(); ?>
  </div>
  </div>
</div>
<?=render('includes.footer'); ?>
</div>
<?=HTML::script('js/jquery.js'); ?>
<script>
$(document).ready(function() {

  $('#nav-trips').addClass('active');
  
  $('#content').fadeIn(1000);
  
});
</script>
</body>
</html>
