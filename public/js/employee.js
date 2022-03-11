
const mainDiv = $('.main_container');

let formGen=`<div class="row dynamic_container" style='margin-top:10px;'>
<div class="col-md-5">
  <input type="text" name="description" class="form-control form-control-lg"  placeholder="Document name ">
</div>
<div class="col-md-5">
   <input type="file" name="filename[]" class="form-control form-control-lg">
</div>
<div class="col-md-2">
  <input type="button" class="btn btn-success remove_field" value="Remove field">
    </div>
  </div>
</div>`;

$(function() {
      $(".add_doc").click(function(e){
          $(mainDiv).append(formGen);
      });
      $(document).on('click', '.remove_field', function(){
          $(this).parent().parent().remove();
      });

      
});

