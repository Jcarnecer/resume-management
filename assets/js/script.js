$(document).ready(toggle());

function toggle(){
	var hide = true;
    $('.custom-toggle').on('click', function (event){
    	if (hide) {
            $('#sidebar').css({'margin-left' : '-210px'});
            // $('#sidebar span').css({'margin-left' : '-210px'});
            $('.main-content').addClass('animation');
            $('.main-content').removeClass('reverse-animation');
            $('.hidden-toggle').css({'display' : 'block'});
    		hide = false;
    	} else {
            $('#sidebar').css({'margin-left' : '0px'});
            // $('#sidebar span').css({'margin-left' : '0px'});
            $('.main-content').removeClass('animation');
            $('.main-content').addClass('reverse-animation');
            $('.hidden-toggle').css({'display' : 'none'});
    		hide = true;
    	}
	});
}

$(document).ready(function(){
  $("div.tab-menu>div.list-group>a").click(function(e){
    e.preventDefault();
    $(this).siblings('a.active').removeClass("active");
    $(this).addClass("active");
    var index = $(this).index();
    $("div.tab>div.tab-content").removeClass("active");
    $("div.tab>div.tab-content").eq(index).addClass("active");
  });
});


$(document).ready(function(){
    $('#pos-id').on('change', function() {
      var status = document.getElementById("current_status")
      if(this.value == '1'){
        $("#emp_form").show();

      }
      else if( this.value == '2')
      {
        $("#emp_form").hide();
      }

    });
});




//add new record
$(document).ready(function(){
  $("#add-record-form").on('submit',function(e){
    var form = new FormData(document.getElementById("add-record-form"));
    var link = base_url + 'applicant';
    $.ajax({
			async: false,
      url: base_url + 'applicant/addRecord',
      type: "POST",
      processData: false, // tell jQuery not to process the data
      contentType: false, // tell jQuery not to set contentType
      data:form,
      success: function(data){
        console.log(data);
        var result = JSON.parse(data);
        if(result==='success'){
          location.href = link;
        }else{
          alert('Error');
        }

      }
    })
    e.preventDefault();
  })
})

$(document).ready(function() {
    $('#add-record-form').bootstrapValidator({
    //    container: '#container',
        fields: {
            last_name: {
                validators: {
                    notEmpty: {
                        message: 'The Last name is required and cannot be empty'
                      },
                      regexp: {
                       regexp: /^[a-zA-Z\s]+$/,
                       message: 'The First name can only consist of letters'
                     },
                 }
             },

            first_name: {
                validators: {
                    notEmpty: {
                        message: 'The First name is required and cannot be empty'
                      },
                      regexp: {
                       regexp: /^[a-zA-Z\s]+$/,
                       message: 'The First name can only consist of letters'
                    },
                }
            },

            middle_name: {
                validators: {
                    notEmpty: {
                        message: 'The Middle name is required and cannot be empty'
                      },
                      regexp: {
                       regexp: /^[a-zA-Z\s]+$/,
                       message: 'The Middle name can only consist of letters'
                    },
                }
            },

            email_add: {
                validators: {
                    notEmpty: {
                        message: 'The Email Address is required and cannot be empty'
                    },
                }
            },

            phone_number: {
                validators: {
                    notEmpty: {
                        message: 'The phone number is required and cannot be empty'
                      },
                      regexp: {
                       regexp: /^[-+]?[0-9]+$/,
                       message: 'Phone number can only consist of numbers'
                    },
                }
            },
        }
    });
});



$(document).ready(function(){
  $("#pos-id").on('change', function(){
    var posid = $("#pos-id").val();
    $.ajax({
      url: base_url + "applicant/get_pos_role/" +posid,
      type: "POST",
      data: $("#pos-id").serialize(),//for now
      success: function(data){
        // alert("Hello");
        var result = JSON.parse(data);
        var html = "",roles;
        for(var i = 0; i < result.length; i++) {
          roles = result[i];

          html += '<option value="'+roles.id+'"> '+roles.name+' </option> '
          // console.log(roles.id);
        }
        $("#role").html(html);
        // alert(posid);
        if(posid == 1){
          $("#emp_form").show();
        }else{
          $("#emp_form").hide();
        }
      }
    });
  });
  $("#current_status").on('change',function() {
    var c_status = $("#current_status").val();
		var posid = $("#pos-id").val();
    if(c_status == 'applicant' && posid == 1){
      $("#applicant_div").show();
      $("#emp_form").hide();
      $("#resume").show();
    }
		else if (posid == 2) {
			$("#emp_form").show();
		}
		else{
      $("#applicant_div").hide();
			$("#emp_form").show();
      $("#resume").hide();

    }
  })
});


$(function() {
  $("#add-role-form").on('submit', function(e){
    e.preventDefault();

    $.ajax({
      url: base_url + "insert_role",
      type: 'POST',
      data: $('#add-role-form').serialize(),
      success: function(data){
        location.reload();
      }
    });
  });
});


//View Record's Information
$(function(){

  $('[data-name="button-view"]').click(function() {
      var applicantId = $(this).attr('data-id');
      var url = base_url + "applicant/" +  applicantId;

      $.ajax({
          "url": url,
          "method": "GET",
          "success": function(response, status, http) {
              if (http.status == 200) {
                console.log(response);
                  $('#first-name').html(response.first_name);
                  $('#last-name').html(response.last_name);
                  $('#middle-name').html(response.middle_name);
                  $('#position').html(response.position);
                  $('#app_date').html(response.application_date);
                  $('#comment').html(response.comment);
                  $('#resume').attr("href", "<?php print base_url('assets/uploads'); ?>/" + response.file);
                  $('#resume').html(response.file);
                  $('#interviewer').html(response.interviewer);
                  $('#interview-notes').attr("href", "<?php print base_url('assets/uploads'); ?>/" + response.interview_notes);
                  $('#interview-notes').html(response.interview_notes);
                  if(response.exam_result == 1){
                    $('#exam-result').html("Passed");
                  }
                  else{
                    $('#exam-result').html("Failed");
                  }
                  if(response.interview_result == 1){
                    $('#interview-result').html("Passed");
                  }
                  else{
                    $('#interview-result').html("Failed");
                  }

                  $('#viewmodal').modal('show');
              }
          }
      });
  });

});
