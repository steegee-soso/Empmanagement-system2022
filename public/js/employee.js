
const mainDiv = $('.main_container');
const match = ['application/pdf',
'image/jpeg', 'image/png', 'image/jpg'];

let formGen=`<div class="row dynamic_container" style='margin-top:10px;'>
<div class="col-md-5">
  <input type="text" name="description" class="form-control form-control-lg"  placeholder="Document name ">
</div>
<div class="col-md-5">
   <input type="file" name="filename[]" class="form-control form-control-lg filenameobj">
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

      $(document).on('change','.filenameobj', function(){
        alert("yes, file changed event");
      });


      /**
       * process form submission
       */

      $(".frm_employee").submit(function(e){

        e.preventDefault();
        alert("Yes page is working")

        $.ajaxSetup({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
          $.ajax({
            type: 'POST',
            url: "../employee/add",
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                //$('.submitBtn').attr("disabled","disabled");
                //$('#fupForm').css("opacity",".5");
            },
            success: function(response){
              console.log(response);
              console.log(response);
                $('.statusMsg').html('');
                if(response.status == 1){
                    $('#fupForm')[0].reset();
                    $('.statusMsg').html('<p class="alert alert-success">'+response.message+'</p>');
                }else{
                    $('.statusMsg').html('<p class="alert alert-danger">'+response.message+'</p>');
                }
                $('#fupForm').css("opacity","");
                $(".submitBtn").removeAttr("disabled");
            }
        });

   });

});


/**
 * file upload validation
 * with a function
 */


function validateFile(fileExt){

}