<?=render('includes.header'); ?>
<?=render('includes.navbar_admin'); ?>
<div class="container">
<div class="content" id="content" style="display:none">
  <div class="page-header">
    <h2>Users Add</h2>
  </div>
  <div class="row">
  <div class="span5 offset3">
    <form id="formAdd" action="<?=URL::to('admin/users/add'); ?>" method="post" class="well" accept-charset="utf-8">
      <input type="number" name="number" class="input-block-level" placeholder="Number" required min="100000" max="999999" autofocus>
      <input type="text" name="firstname" class="input-block-level" placeholder="Firstname" required maxlength="60">
      <input type="text" name="lastname" class="input-block-level" placeholder="Lastname" required maxlength="60">
      <button type="submit" class="btn btn-success btn-large">
      <i class="icon-plus icon-white"></i> Add User</button>
    </form>
  </div>
  </div>
  <div id="success" class="row" style="display: none">
    <div class="span5 offset3">
      <div id="successMessage" class="alert alert-success"><b>The user has been added!</b></div>
    </div>
  </div>
  <div id="error" class="row" style="display: none">
    <div class="span5 offset3">
      <div id="errorMessage" class="alert alert-error">Error</div>
    </div>
  </div>
</div>
<?=render('includes.footer'); ?>
</div>
<?=HTML::script('js/jquery.js'); ?>
<script>
$(document).ready(function() {

  $('#formAdd').submit(function() {

    var form = $(this);
    form.children('button').prop('disabled', true);

    $('#success').hide();
    $('#error').hide();

    var faction = "<?=URL::to('admin/users/add'); ?>";
    var fdata = form.serialize();

    $.post(faction, fdata, function(json) {
        
        if (json.success) {
            //$('#successMessage').html(json.message);
            $('#success').show();
        } else {
            $('#errorMessage').html(json.message);
            $('#error').show();
        }

        form.children('button').prop('disabled', false);
        form.children('input[name="name"]').select();
    });

    return false;
  });

  $('#nav-users').addClass('active');

  $('#content').fadeIn(1000);
});
</script>
</body>
</html>
