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
      <th>ID</th>
      <th>Title</th>
      <th>Cost</th>
      <th>Location</th>
      <th>Day</th>
    </tr>
  </thead>
  <? foreach ($trips as $trip): ?>
  <tr>
    <td><?=$trip->id; ?></td>
    <td><?=$trip->title; ?></td>
    <td><?=$trip->cost; ?>€</td>
    <td><?=$trip->name; ?></td>
    <td><?=$trip->day; ?></td>
  </tr>
  <? endforeach; ?>
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
