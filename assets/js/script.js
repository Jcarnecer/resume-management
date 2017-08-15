/*($(function() {
    // Add function
    $('[data-name="button-add-applicant"]').click(function() {

        // console.log($('[data-name="form-add-applicant"]').serialize());
        var form = new FormData(document.getElementById("add-form"));

        $.ajax({
            url: "applicant",
            method: "POST",
            data: form,
            contentType: false,
            processData: false,
            success: function(response, status, http) {
              // console.log(form);
              // alert(form);
                if (http.status == 201){
                        location.reload();
                } else {
                    alert("some shit happened");
                }
            }
        });
    });

    $('#archived').click(function(){

    }); -->

})); */

$(document).ready(function(){
  $("#login-form").on('submit',function(e){
    $.ajax({
      url: base_url + "auth/login",
      data: $(this).serialize(),
      type: "POST",
      success: function(data){
        var result = JSON.parse(data);
        if(result === "success"){
          $(".alert").hide();
          window.location.href=base_url+"home";
        }else{
          $(".alert").html('<div class="alert alert-danger"><h5>Invalid Credentials</h5></div>');
        }
      },
      error: function(data){
        alert('may error');
      }
    })
    e.preventDefault();
  })
});
