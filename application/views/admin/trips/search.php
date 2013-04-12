<?=render('includes.header'); ?>
<?=render('includes.navbar_admin'); ?>
<div class="container">
<div class="content" id="content" style="display:none">
  <div class="page-header">
    <h2>Trips Search</h2>
  </div>
  <div class="row">
  <div class="span5 offset3">
    <form id="formSearch" action="<?=URL::to('admin/trips/search'); ?>" method="post" class="well" accept-charset="utf-8">
      <input type="number" name="number" class="input-block-level" placeholder="Number" required min="100" max="999">
      <button type="submit" class="btn btn-warning btn-large">
      <i class="icon-search icon-white"></i> Search Trip</button>
    </form>
  </div>
  </div>
  <div class="row">
  <div class="span9 offset2">
    <form class="form-inline">
    <input id="number" class="span1" type="text">
    <input id="title" class="span3" type="text">
    <input id="location" class="span2" type="text">
    <a id="status" class="btn btn-info">Status</a>
    <a id="delete" class="btn btn-danger">Delete</a>
    <a id="book" class="btn btn-success">Book</a>
    </form>
  </div>
  </div>
</div>
<?=render('includes.footer'); ?>
</div>
<?=HTML::script('js/jquery.js'); ?>
<script>
$(document).ready(function() {

  var urlStatus = "<?=Url::to('admin/trips/status/'); ?>";
  var urlDelete = "<?=Url::to('admin/trips/delete/'); ?>";
  var urlBook = "<?=Url::to('admin/trips/book/'); ?>";

  $('#formSearch').submit(function() {

    var form = $(this);
    form.children('button').prop('disabled', true);
    
    $('#success').hide();
    $('#error').hide();

    var faction = "<?=Url::to('admin/trips/search'); ?>";
    var fdata = form.serialize();

    $.post(faction, fdata, function(json) {
        
        if (json.success) {
            $('#number').val(json.number);
            $('#title').val(json.title);
            $('#location').val(json.location);
            $('#status').attr('href', urlStatus + json.number);
            $('#delete').attr('href', urlDelete + json.number);
            $('#book').attr('href', urlBook + json.number);
        } else {
            $('#number').val('');
            $('#title').val('');
            $('#location').val('');
            $('#status').attr('href', '');
            $('#delete').attr('href', '');
            $('#book').attr('href', '');
        }

        form.children('button').prop('disabled', false);
    });
  
    return false;
  });

  $('#nav-trips').addClass('active');
  
  $('#content').fadeIn(1000);
  
});
</script>
</body>
</html>
