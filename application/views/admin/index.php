<?=render('includes.header'); ?>
<?=render('includes.navbar_admin'); ?>
<div class="container">
<div class="content" id="content" style="display:none">
  <div class="page-header">
    <h2>Admin</h2>
  </div>
  <div class="row">
  <div class="span4">
    <p>You are on the Admin Page</p>
  </div>
  </div>
</div>
<?=HTML::script('js/jquery.js'); ?>
<script>

$(document).ready(function() {
  
  $('#content').fadeIn(1000);
});

</script>
<?=render('includes.footer'); ?>
