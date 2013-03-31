<?=render('includes.header'); ?>
<?=render('includes.navbar_admin'); ?>
<div class="container">
<div class="content" id="content" style="display:none">
  <div class="page-header">
    <h2>Users Bookings</h2>
  </div>
  <div class="row">
  <div class="span11">
    <h4>Bookings from <?=$user->firstname." ".$user->lastname; ?></h4>
  </div>
  </div>
  <div class="row">
  <div class="span11">
    <table class="table table-striped">
    <thead>
      <tr>
        <th>Day</th>
        <th>Place</th>
        <th>Trip</th>
        <th>Cost</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <? foreach ($trips as $trip): ?>
    <tr>
      <td><?=$trip->day; ?></td>
      <td><?=$trip->name; ?></td>
      <td><?=$trip->title; ?></td>
      <td><?=$trip->cost; ?>€</td>
      <td>
        <a href="" class="btn btn-small btn-danger">Cancel</a>
      </td>
    </tr>
    <? endforeach; ?>
    </tbody>
  </table>
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
