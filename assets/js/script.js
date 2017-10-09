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

document.getElementsByClassName('custom-toggle')[0].click();

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
    e.preventDefault();
    e.stopImmediatePropagation();
    var form = new FormData(document.getElementById("add-record-form"));
    var link = base_url + 'applicant';
    $.ajax({
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
    else if (posid == 2 && c_status == 'applicant' ) {
      $("#emp_form").hide();
      $("#resume").show();
    }
    else if(posid == 2){
      $("#emp_form").hide();
      $("#resume").hide();
    }
    else{
      $("#applicant_div").hide();
      $("#emp_form").show();
      $("#resume").hide();

    }
  })
});

// const baseUrl = "http://localhost/resume-management/";

$(function() {
  $("#add-role-form").on('submit', function(e){
    e.preventDefault();
    e.stopImmediatePropagation();
    $.ajax({
      url: base_url + "insert_role",
      type: 'POST',
      data: $('#add-role-form').serialize(),
      dataType: 'json',
      success: function(data){
      var $tab = null;
         if(data['pos_id']=='1'){
          $tab = $('#employee_tab');
         }
         else if(data['pos_id']=='2'){
          $tab = $('#intern_tab');
         }
         console.log(data);

         $tab.append(`<div class="panel">
             <form method="get" action="${baseUrl}delete_role">
               <input type="hidden" name="id" value="${data['id']}">
               <input type="submit" Value="Delete" class="btn btn-danger pull-right">
             </form>
             <div class="panel-heading">${data['name']}<hr></div>
             <div class="panel-body">
               <div class="row grid-divider">

                 <div class="col-sm-2">
                   <div class="col-padding">
                     <a href="${baseUrl}applicants?role=' . $role->role_id .'&current_status=applicant">
                       <div>${data['applicants']}<br>Applicants</div>
                     </a>
                   </div>
                 </div>

                 <div class="col-sm-2">
                   <div class="col-padding">
                     <a href="${baseUrl}applicants?role=' . $role->role_id .'&current_status=interview">
                       <div>${data['for_interview']}<br>For Interview</div>
                     </a>
                   </div>
                 </div>

                 <div class="col-sm-2">
                   <div class="col-padding">
                       <a href="${baseUrl}applicants?role=' . $role->role_id .'&current_status=shortlist">
                       <div>${data['shortlist']}<br>Shortlist</div>
                     </a>
                   </div>
                 </div>

                 <div class="col-sm-2">
                   <div class="col-padding">
                     <a href="${baseUrl}applicants?role=' . $role->role_id .'&current_status=archived">
                       <div>${data['archived']}<br>Rejected</div>
                     </a>
                   </div>
                 </div>

                 <div class="col-sm-2">
                   <div class="col-padding">
                       <a href="${baseUrl}employee?current_status=current&role=' . $role->role_id .'&position=2'">
                       <div>${data['current']}<br>Current</div>
                     </a>
                   </div>
                 </div>

                 <div class="col-sm-2">
                   <div class="col-padding">
                     <a href="${baseUrl}employee?current_status=former&role=' . $role->role_id .'&position=2'">
                       <div>${data['former']}<br>Former</div>
                     </a>
                   </div>
                 </div>

               </div>
             </div>
           </div>`);

      }
    });
  });
});


//View Record's Information
$(function(){

  $('[data-name="button-view"]').click(function() {
      var applicantId = $(this).attr('data-id');
      var url = base_url + "applicant/" +  applicantId;
      // console.log('click');
      $.ajax({
          "url": url,
          "method": "GET",
          "success": function(response, status, http) {
            // console.log('click');
              if (http.status == 200) {
                  $('#first-name').html(response.first_name);
                  $('#last-name').html(response.last_name);
                  $('#middle-name').html(response.middle_name);
                  $('#home-address').html(response.home_address);
                  $('#phone_number').html(response.phone_number);
                  $('#birthday').html(response.birthday);
                  $('#degree').html(response.degree);
                  $('#school').html(response.school);
                  $('#role').html(response.name);
                  $('#date_hired').html(response.date_hired);
                  $('#app_date').html(response.application_date);
                  $('#sss').html(response.sss);
                  $('#tin').html(response.tin);
                  $('#philhealth').html(response.philhealth);
                  $('#pagibig').html(response.pagibig);
                  $('#comment').html(response.comment);
                  $('#resume').attr("href", base_url + 'assets/uploads/' + response.file);
                  $('#resume').html(response.file);
                  $('#interviewer').html(response.interviewer);
                  $('#interview-notes').attr("href", base_url + 'assets/uploads/' + response.interview_notes);
                  $('#interview-notes').html(response.interview_notes);
                  if(response.exam_result == 1){
                    $('#exam-result').html("Passed");
                  }
                  else if (response.exam_result == 0){
                    $('#exam-result').html("Failed");
                  }else{
                    $('#interview-result').html("");
                  }
                  if(response.interview_result == 1){
                    $('#interview-result').html("Passed");
                  }
                  else if (response.interview_result == 0){
                    $('#interview-result').html("Failed");
                  }
                  else {
                    $('#interview-result').html("");
                  }

                  $('#viewmodal').modal('show');
              }
          }
      });
  });

});
