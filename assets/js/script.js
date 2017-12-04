// $(document).ready(toggle());

//   function toggle(){
//     $(window).on('resize', function(e){
//       var hide = true;
//       var windowSize = $(window).width();
//       $('.custom-toggle').on('click', function (event){
//         if (windowSize < 768) {
//           if (hide) {
//             $('#sidebar').css({'margin-left' : '-210px'});
//             hide = false;
//           } else {
//             $('#sidebar').css({'margin-left' : '0px'});
//             hide = true;
//           }
//         } else if (windowSize > 768) {  
//           if (hide) {
//             $('#sidebar').css({'margin-left' : '-210px'});
//             $('.main-content').css({'margin-left' : '0px'});
//             $('.hidden-toggle').css({'display' : 'block'});
//             hide = false;
//           } else {
//             $('#sidebar').css({'margin-left' : '0px'});
//             $('.main-content').css({'margin-left' : '210px'});
//             $('.hidden-toggle').css({'display' : 'none'});
//             hide = true;
//           }
//         }
//       });
//     });
//   }

// Erin's code
function browserWidth(){
  var width = $(window).width();
  var height = $(window).height();

  return width;
};

function toggle(){
  var hide = true;
  $(".custom-toggle").click(function() {
    if(browserWidth() < 768) {
      if (hide) {
        $('#sidebar').css({'margin-left' : '0px'});
        hide = false;
      } else {
        $('#sidebar').css({'margin-left' : '-210px'});
        hide = true;
      }
    } else {
      if (hide) {
        $('#sidebar').css({'margin-left' : '-210px'});
        $('.main-content').css({'margin-left' : '0px'});
        $('.hidden-toggle').css({'display' : 'block'});
        hide = false;
      } else {
        $('#sidebar').css({'margin-left' : '0px'});
        $('.main-content').css({'margin-left' : '210px'});
        $('.hidden-toggle').css({'display' : 'none'});
        hide = true;
      }
    }
  });
}

$(document).ready(toggle());

$(window).resize(function() {
  
  if(browserWidth() < 768) {
    $('#sidebar').css({'margin-left' : ''});
    $('.main-content').css({'margin-left' : ''});
    $('.hidden-toggle').css({'display' : ''});
  } else {
    // $('#sidebar').css({'margin-left' : ''});
    // $('.main-content').css({'margin-left' : ''});
  }
  
  toggle();
  
});

// document.getElementsByClassName('custom-toggle')[0].click();

//$(document).ready(function(){


  //$("div.tab-menu>div.list-group>a").click(function(e){
   // e.preventDefault();
   // $(this).siblings('a.active').removeClass("active");
   // $(this).addClass("active");
   // var index = $(this).index();
    //$("div.tab>div.tab-content").removeClass("active");
    //$("div.tab>div.tab-content").eq(index).addClass("active");
 // });
//});


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

//

//add new employee

//

//add Intern

//
//Add freelance

//
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

//View Record's Information
$(function(){

  $('[data-name="button-view"]').click(function() {
      var applicantId = $(this).attr('data-id');
      var url =  "applicant/" +  applicantId;
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
                  $('#interview_date').html(response.interview_date);
                  $('#comment').html(response.comment);
                  $('#resume').attr("href", 'assets/uploads/' + response.file);
                  $('#resume').html(response.file);
                  $('#interviewer').html(response.interviewer);
                  $('#interview-notes').attr("href",'assets/uploads/' + response.interview_notes);
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

//Roles


//Datatables
$(document).ready(function(){
  $('#table-role').DataTable();
  $('#applicant_table').DataTable();
  $('#intern_table').DataTable();
  $('#employee_table').DataTable();
  $('#freelance_table').DataTable();
  $('#interview_table').DataTable();
});








//Edit Employee
 
  //Edit Freelance
 







