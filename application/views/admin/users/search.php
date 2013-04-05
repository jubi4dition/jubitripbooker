<?=render('includes.header'); ?>
<?=render('includes.navbar_admin'); ?>
<div class="container">
<div class="content" id="content" style="display:none">
  <div class="page-header">
    <h2>Users Search</h2>
  </div>
  <div class="row">
  <div class="span5 offset3">
    <form id="formSearch" action="<?=URL::to('admin/users/search'); ?>" method="post" class="well" accept-charset="utf-8">
      <input type="number" name="number" class="input-block-level" placeholder="Number" required min="100000" max="999999">
      <button type="submit" class="btn btn-warning btn-large">
      <i class="icon-search icon-white"></i> Search User</button>
    </form>
  </div>
  </div>
  <div class="row">
  <div class="span9 offset2">
    <form class="form-inline">
    <input id="number" class="span2" type="text">
    <input id="firstname" class="span2" type="text">
    <input id="lastname" class="span2" type="text">
    <a id="bookings" class="btn btn-info">Bookings</a>
    <a id="delete" class="btn btn-danger">Delete</a>
    </form>
  </div>
  </div>
</div>
<?=render('includes.footer'); ?>
</div>
<?=HTML::script('js/jquery.js'); ?>
<script>
$(document).ready(function() {

  var urlBookings = "<?=Url::to('admin/users/bookings/'); ?>";
  var urlDelete = "<?=Url::to('admin/users/delete/'); ?>";

  $('#formSearch').submit(function() {

    var form = $(this);
    form.children('button').prop('disabled', true);
    
    $('#success').hide();
    $('#error').hide();

    var faction = "<?=Url::to('admin/users/search'); ?>";
    var fdata = form.serialize();

    $.post(faction, fdata, function(json) {
        
        if (json.success) {
            $('#number').val(json.number);
            $('#firstname').val(json.firstname);
            $('#lastname').val(json.lastname);
            $('#bookings').attr('href', urlBookings + json.number);
            $('#delete').attr('href', urlDelete + json.number);
        } else {
            $('#number').val('');
            $('#firstname').val('');
            $('#lastname').val('');
            $('#bookings').attr('href', '');
            $('#delete').attr('href', '');
        }

        form.children('button').prop('disabled', false);
    });
  
    return false;
  });

  $('#nav-users').addClass('active');
  
  $('#content').fadeIn(1000);
  
});
</script>
</body>
</html>
