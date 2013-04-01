<?=render('includes.header'); ?>
<?=render('includes.navbar_admin'); ?>
<div class="container">
<div class="content" id="content" style="display:none">
  <div class="page-header">
    <h2>Trips Status</h2>
  </div>
  <div class="row">
  <div class="span7 offset2">
   <h3><?=$trip->title; ?> (<?=$trip->number; ?>)</h3>
  </div>
  </div>
  <div class="row">
  <div class="span5 offset3">
   <b>Bookings: </b>
   <span class="badge badge-info"><?=count($users); ?></span> from <span class="badge badge-info"><?=$trip->places; ?></span>
  </div>
  </div>
  <br>
  <div class="row">
  <div class="span5 offset3">
    <div class="progress">
      <div class="bar" style="width: <?=$status; ?>%;"></div>
    </div>
  </div>
  </div>
  <div class="row">
  <div class="span7 offset2">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Number</th>
          <th>Firstname</th>
          <th>Lastname</th>
        </tr>
      </thead>
      <? foreach ($users as $user): ?>
      <tr>
        <td><?=$user->number; ?></td>
        <td><?=$user->firstname; ?></td>
        <td><?=$user->lastname; ?></td>
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

  $('#nav-trips').addClass('active');

  $('#content').fadeIn(1000);

});
</script>
</body>
</html>
