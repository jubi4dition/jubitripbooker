<?=render('includes.header'); ?>
<?=render('includes.navbar_admin'); ?>
<div class="container">
<div class="content" id="content" style="display:none">
  <div class="page-header">
    <h2>Events</h2>
  </div>
  <div class="row">
  <div class="span10 offset1">
    <? foreach ($events as $event): ?>
      <? if ($event->type == 0 || $event->type == 2): ?>
        <div class="alert event">
      <? elseif ($event->type == 1 || $event->type == 3): ?>
        <div class="alert event event-alt">
      <? endif; ?>
        <span class="badge badge-warning"><?=$event->type; ?></span>
        <span class="label label-info"><?=$event->date; ?></span> 
        <span><?=$event->message; ?><span>
        <span class="badge badge-inverse pull-right"><?=$event->id; ?></span>
      </div>
    <? endforeach; ?>
  </div>
  </div>
</div>
<?=render('includes.footer'); ?>
</div>
<?=HTML::script('js/jquery.js'); ?>
<script>
$(document).ready(function() {

  $('#nav-events').addClass('active');
  
  $('#content').fadeIn(1000);
  
});
</script>
</body>
</html>
