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
            $('[name="position"]').val('');
            $('[name="role"]').val('');        
            $('[name="last_name"]').val('');                
            $('[name="first_name"]').val('');
            $('[name="middle_name"]').val('');
            $('[name="email_address"]').val('');       
            $('[name="home_address"]').val('');       
            $('[name="phone_number"]').val('');         
            $('[name="birth_date"]').val('');       
            $('[name="degree"]').val('');       
            $('[name="school"]').val('');       
            $('[name="application_date"]').val('');       
            $('[name="available_date"]').val('');       
            $('[name="expected_salary"]').val(''); 
            $('[name="comment"]').val('');       
            $('[name="resume_file"]').val('');
            $('html, body').animate({ scrollTop: 0  }, "slow");
            bs_notify("<strong>Successfully Added Record</strong>","success","top","right");                  
        }else{
            bs_notify("<strong>Unable to Add new Record</strong>","danger","top","right"); 
        }

      }
    });
    e.preventDefault();
  });
});

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
            tin: {
                validators: {
                      regexp: {
                       regexp: /^[-+]?[0-9]+$/,
                       message: 'TIN can only consist of numbers'
                    },
                }
            },
            sss: {
                validators: {
                      regexp: {
                       regexp: /^[-+]?[0-9]+$/,
                       message: 'SSS can only consist of numbers'
                    },
                }
            },
            philhealth: {
                validators: {
                      regexp: {
                       regexp: /^[-+]?[0-9]+$/,
                       message: 'PhilHealth can only consist of numbers'
                    },
                }
            },
            pagibig: {
                validators: {
                      regexp: {
                       regexp: /^[-+]?[0-9]+$/,
                       message: 'Pag-IBIG can only consist of numbers'
                    },
                }
            },
        }
    });
});
//

//add new employee
$(document).ready(function(){
  $("#add-employee-form").on('submit',function(e){
    e.preventDefault();
    e.stopImmediatePropagation();
    var form = new FormData(document.getElementById("add-employee-form"));
    var link = base_url + 'employee';
    $.ajax({
      url: base_url + 'employee/addRecord',
      method: 'POST',
      processData: false, // tell jQuery not to process the data
      contentType: false, // tell jQuery not to set contentType
      data:form,
      success: function(data){
        console.log(data);
        var result = JSON.parse(data);
        if(result==='success'){
            $('[name="position"]').val('');
            $('[name="role"]').val('');        
            $('[name="last_name"]').val('');                
            $('[name="first_name"]').val('');
            $('[name="middle_name"]').val('');
            $('[name="email_address"]').val('');       
            $('[name="home_address"]').val('');       
            $('[name="phone_number"]').val('');         
            $('[name="birth_date"]').val('');       
            $('[name="degree"]').val('');       
            $('[name="school"]').val('');       
            $('[name="application_date"]').val('');       
            $('[name="available_date"]').val('');       
            $('[name="expected_salary"]').val(''); 
            $('[name="comment"]').val('');       
            $('[name="resume_file"]').val('');
            $('html, body').animate({ scrollTop: 0  }, "slow");
            bs_notify("<strong>Successfully Added Record</strong>","success","top","right");         

        }else{
            bs_notify("<strong>Unable to Add New Employee Record</strong>","danger","top","right"); 
        }

      }
    });
    e.preventDefault();  
  });
});

$(document).ready(function() {
    $('#add-employee-form').bootstrapValidator({
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
            tin: {
                validators: {
                      regexp: {
                       regexp: /^[-+]?[0-9]+$/,
                       message: 'TIN can only consist of numbers'
                    },
                }
            },
            sss: {
                validators: {
                      regexp: {
                       regexp: /^[-+]?[0-9]+$/,
                       message: 'SSS can only consist of numbers'
                    },
                }
            },
            philhealth: {
                validators: {
                      regexp: {
                       regexp: /^[-+]?[0-9]+$/,
                       message: 'PhilHealth can only consist of numbers'
                    },
                }
            },
            pagibig: {
                validators: {
                      regexp: {
                       regexp: /^[-+]?[0-9]+$/,
                       message: 'Pag-IBIG can only consist of numbers'
                    },
                }
            },
        }
    });
});
//

//add Intern
$(document).ready(function(){
  $("#add-intern-form").on('submit',function(e){
    e.preventDefault();
    e.stopImmediatePropagation();
    var form = new FormData(document.getElementById("add-intern-form"));
    var link = base_url + 'intern';
    $.ajax({
      url: base_url + 'intern/addRecord',
      method: 'POST',
      processData: false, // tell jQuery not to process the data
      contentType: false, // tell jQuery not to set contentType
      data:form,
      success: function(data){
        console.log(data);
        var result = JSON.parse(data);
        if(result==='success'){
            $('[name="position"]').val('');
            $('[name="role"]').val('');        
            $('[name="last_name"]').val('');                
            $('[name="first_name"]').val('');
            $('[name="middle_name"]').val('');
            $('[name="email_address"]').val('');       
            $('[name="home_address"]').val('');       
            $('[name="phone_number"]').val('');         
            $('[name="birth_date"]').val('');       
            $('[name="degree"]').val('');       
            $('[name="school"]').val('');       
            $('[name="application_date"]').val('');       
            $('[name="available_date"]').val('');       
            $('[name="expected_salary"]').val(''); 
            $('[name="comment"]').val('');       
            $('[name="resume_file"]').val('');
            $('html, body').animate({ scrollTop: 0  }, "slow");
            bs_notify("<strong>Successfully Added Record</strong>","success","top","right");         

        }else{
            bs_notify("<strong>Unable to Add New Intern Record</strong>","danger","top","right"); 
        }

      }
    });
    e.preventDefault();  
  });
});

$(document).ready(function() {
    $('#add-intern-form').bootstrapValidator({
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
            tin: {
                validators: {
                      regexp: {
                       regexp: /^[-+]?[0-9]+$/,
                       message: 'TIN can only consist of numbers'
                    },
                }
            },
            sss: {
                validators: {
                      regexp: {
                       regexp: /^[-+]?[0-9]+$/,
                       message: 'SSS can only consist of numbers'
                    },
                }
            },
            philhealth: {
                validators: {
                      regexp: {
                       regexp: /^[-+]?[0-9]+$/,
                       message: 'PhilHealth can only consist of numbers'
                    },
                }
            },
            pagibig: {
                validators: {
                      regexp: {
                       regexp: /^[-+]?[0-9]+$/,
                       message: 'Pag-IBIG can only consist of numbers'
                    },
                }
            },
        }
    });
});

//
//Add freelance

$(document).ready(function(){
    $("#add-freelance-form").on('submit',function(e){
      e.preventDefault();
      e.stopImmediatePropagation();
      var form = new FormData(document.getElementById("add-freelance-form"));
      var link = base_url + 'freelance';
      $.ajax({
         url: base_url + 'freelance/addRecord',
        type: "POST",
        processData: false, // tell jQuery not to process the data
        contentType: false, // tell jQuery not to set contentType
        data:form,
        success: function(data){
          console.log(data);
          var result = JSON.parse(data);
          if(result==='success'){
            $('[name="position"]').val('');
            $('[name="role"]').val('');        
            $('[name="last_name"]').val('');                
            $('[name="first_name"]').val('');
            $('[name="middle_name"]').val('');
            $('[name="email_address"]').val('');       
            $('[name="home_address"]').val('');       
            $('[name="phone_number"]').val('');         
            $('[name="birth_date"]').val('');       
            $('[name="degree"]').val('');       
            $('[name="school"]').val('');       
            $('[name="application_date"]').val('');       
            $('[name="available_date"]').val('');       
            $('[name="expected_salary"]').val(''); 
            $('[name="comment"]').val('');       
            $('[name="resume_file"]').val('');
            $('html, body').animate({ scrollTop: 0  }, "slow");
            bs_notify("<strong>Successfully Added Record</strong>","success","top","right");         
  
          }else{
            bs_notify("<strong>Unable to Add New Freelance Record</strong>","danger","top","right"); 
          }
  
        }
      });
      e.preventDefault();
    });
  });
  
  $(document).ready(function() {
      $('#add-freelance-form').bootstrapValidator({
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
              tin: {
                  validators: {
                        regexp: {
                         regexp: /^[-+]?[0-9]+$/,
                         message: 'TIN can only consist of numbers'
                      },
                  }
              },
              sss: {
                  validators: {
                        regexp: {
                         regexp: /^[-+]?[0-9]+$/,
                         message: 'SSS can only consist of numbers'
                      },
                  }
              },
              philhealth: {
                  validators: {
                        regexp: {
                         regexp: /^[-+]?[0-9]+$/,
                         message: 'PhilHealth can only consist of numbers'
                      },
                  }
              },
              pagibig: {
                  validators: {
                        regexp: {
                         regexp: /^[-+]?[0-9]+$/,
                         message: 'Pag-IBIG can only consist of numbers'
                      },
                  }
              },
          }
      });
  });
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

//Roles
$(document).on('click','#btn-update',function(){
  
  var role_name=$(this).closest('tr').find('td[data-role="role_name"]').html();
  var position_name=$(this).attr('data-value');
  console.log(role_name);
  console.log(position_name);
  var roleId = $(this).attr('data-id');
  $('#role_name').val(role_name);
  $("#roleModal").find("#btn-save").attr("data-id",roleId);
  $("#roleModal").find(".modal-title").html("Update Role");
  $("#roleModal").find("#btn-save").attr("data-function","update");     

  $('#position_name').val(position_name);

  
});

$(document).on('click','#btn-add',function(){ 
        $("#roleModal").find(".modal-title").html("Add Role");
        $("#roleModal").find("#btn-save").attr("data-function","add");             
 
    });
    

$(document).on('click',"button[data-function='update']",function(){
  var roleId = $(this).attr('data-id');
  var url = base_url + "roles/edit/"+ roleId;
  var posId= $('#position_name option:selected').val();
  var form=$('#role-form').serialize();
  console.log(posId);
      $.ajax({
          "url":url,
          "method":"POST",
         data:form,
          success: function(data){
            var result = JSON.parse(data);
            if(result=='success'){
                $(document).getRoles().done(function(data){
                    $(document).displayRoles(data);
                    });
                    bs_notify("<strong>Successfully Updated a Role</strong>","success","top","center");
                    $('#roleModal').modal('toggle');   
              }
              else{
                bs_notify("<strong>Role cannot be Updated</strong>","danger","top","center"); 
                $('#roleModal').modal('toggle');    
              }

          }
      });
});

$(document).on('click',"button[data-function='add']",function(){
    var url = base_url + "roles/insert_role";
    var form=$('#role-form').serialize();
        $.ajax({
            "url":url,
            "method":"POST",
             data:form,
            success: function(data){
                var result = JSON.parse(data);
              if(result=='success'){
                $(document).getRoles().done(function(data){
                    $(document).displayRoles(data);
                    });
                    bs_notify("<strong>Successfully Added A Role</strong>","success","top","center");  
                    $('#roleModal').modal('toggle'); 
    
    
              }
              else{
                bs_notify("<strong>Role Already Exist</strong>","danger","top","center");  
              }
  
            }
        });
  });

$.fn.getRoles=function(){
  var $url = base_url + "roles/get_roles";
 return $.ajax({
    url:$url,
    type:"GET",
    dataType: 'JSON'
  });
};
$.fn.displayRoles=function(items){

    $("#tbody-role").html('');

    $.each(items,function(i,item){
        $('#tbody-role').append(`
                    
                  <tr data-role="role_id" class=${item['role_id']}>
                  <td data-role="role_name">${item['name']}</td>
                  <td data-role="position_name">${item['pos_name']}</td>
                  <td data-role="role_status">${item['status']==0?'Deactivated':'Activated'}</td>
                <td>
                    <button class="btn btn-warning" id="btn-update"data-id="${item['role_id']}"data-value="${item['pos_id']}" data-toggle="modal"data-target="#roleModal">Edit</a>
                    <button class="btn btn-danger" data-pos="${item['pos_id']}" data-id="${item['role_id']}"data-function="${item['status']=='0'?'Activate':'Deactivate'}" id="btn-status">${item['status']==1?'Deactivate':'Activate'}</a>
                  </td>
                 </tr>`);
                 $('[data-function="Activate"]').removeClass();
                 $('[data-function="Deactivate"]').removeClass();
                $('[data-function="Deactivate"]').addClass("btn btn-danger");
                $('[data-function="Activate"]').addClass("btn btn-success");
       
               
    });




};
   
$(document).on('click','#btn-status',function(){
    var url=base_url + "roles/update_status";
    var $id=$(this).attr('data-id');
    var $status =$(this).attr('data-function'); 
    var $pos=$(this).attr('data-pos');
    console.log($pos); 
    $.ajax({
      "url":url,
      "method":"POST",
        data:{'id':$id,
        'status':$status,
        'pos_id':$pos},
        success: function(data){
            console.log(data);
            var result=JSON.parse(data);      
            if(result=='success'){
                $(document).getRoles().done(function(data){
                    $(document).displayRoles(data);
                    });
                    bs_notify("<strong>Successfully Updated Role</strong>","success","top","center");  
                  
              }
            else{
                bs_notify("<strong>Role cannot be Updated</strong>","danger","top","center");  
                }
            } 
     });
    
  });

//Datatables
$(document).ready(function(){
  $('#table-role').DataTable();
  $('#applicant_table').DataTable();
  $('#intern_table').DataTable();
  $('#employee_table').DataTable();
  $('#freelance_table').DataTable();
  $(document).getRoles().done(function(data){
      $(document).displayRoles(data);
  });
});

//Edit Applicant
$(document).ready(function(){
    $("#edit-form").on('submit',function(e){
      e.preventDefault();
      e.stopImmediatePropagation();
      var form = new FormData(document.getElementById('edit-form'));
      var link = base_url + 'applicant';
      $.ajax({
        url: base_url + 'applicant/edit',
        method: 'POST',
        processData: false, // tell jQuery not to process the data
        contentType: false, // tell jQuery not to set contentType
        data:form,
        success: function(data){
          console.log(data);
          var result = JSON.parse(data);
          if(result=='success'){     
              bs_notify("<strong>Successfully Updated Applicant Record</strong>","success","top","right");
              location.href=link;                
  
          }else{
              bs_notify("<strong>Unable to Update Applicant</strong>","danger","top","right"); 
          }
  
        }
      });
     
    });
  });
  $(document).ready(function(){
    $("#add_result").on('submit',function(e){
      e.preventDefault();
      e.stopImmediatePropagation();
      var form = new FormData(document.getElementById('add_result'));
      var link = base_url + 'applicant';
      $.ajax({
        url: base_url + 'applicant/add_result',
        method: 'POST',
        processData: false, // tell jQuery not to process the data
        contentType: false, // tell jQuery not to set contentType
        data:form,
        success: function(data){
          console.log(data);
          var result = JSON.parse(data);
          if(result==='success'){     
              //bs_notify("<strong>Successfully Updated Applicant Record</strong>","success","top","right");
              location.href=link;                
  
          }else{
              bs_notify("<strong>Unable to Update Applicant</strong>","danger","top","right"); 
          }
  
        }
      });
      e.preventDefault();  
    });
  });
$(document).ready(function() {
    $('#edit-form').bootstrapValidator({
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
            tin: {
                validators: {
                      regexp: {
                       regexp: /^[-+]?[0-9]+$/,
                       message: 'TIN can only consist of numbers'
                    },
                }
            },
            sss: {
                validators: {
                      regexp: {
                       regexp: /^[-+]?[0-9]+$/,
                       message: 'SSS can only consist of numbers'
                    },
                }
            },
            philhealth: {
                validators: {
                      regexp: {
                       regexp: /^[-+]?[0-9]+$/,
                       message: 'PhilHealth can only consist of numbers'
                    },
                }
            },
            pagibig: {
                validators: {
                      regexp: {
                       regexp: /^[-+]?[0-9]+$/,
                       message: 'Pag-IBIG can only consist of numbers'
                    },
                }
            },
        }
    });
});


//Edit Intern 
$(document).ready(function(){
    $("#intern-edit-form").on('submit',function(e){
      e.preventDefault();
      e.stopImmediatePropagation();
      var form = new FormData(document.getElementById('intern-edit-form'));
      var link = base_url + 'intern';
      $.ajax({
        url: base_url + 'intern/edit',
        method: 'POST',
        processData: false, // tell jQuery not to process the data
        contentType: false, // tell jQuery not to set contentType
        data:form,
        success: function(data){
          console.log(data);
          var result = JSON.parse(data);
          if(result=='success'){     
              bs_notify("<strong>Successfully Updated Intern Record</strong>","success","top","right");
              location.href=link;                
  
          }else{
              bs_notify("<strong>Unable to Update Intern</strong>","danger","top","right"); 
          }
  
        }
      });
     
    });
  });





//Edit Employee
  $(document).ready(function(){
    $("#employee-edit-form").on('submit',function(e){
      e.preventDefault();
      e.stopImmediatePropagation();
      var form = new FormData(document.getElementById('employee-edit-form'));
      var link = base_url + 'employee';
      $.ajax({
        url: base_url + 'employee/edit',
        method: 'POST',
        processData: false, // tell jQuery not to process the data
        contentType: false, // tell jQuery not to set contentType
        data:form,
        success: function(data){
          console.log(data);
          var result = JSON.parse(data);
          if(result=='success'){     
              bs_notify("<strong>Successfully Updated Employee Record</strong>","success","top","right");
              location.href=link;                
  
          }else{
              bs_notify("<strong>Unable to Employee Applicant</strong>","danger","top","right"); 
          }
  
        }
      });
     
    });
  });

  //Edit Freelance
  $(document).ready(function(){
    $("#freelance-edit-form").on('submit',function(e){
      e.preventDefault();
      e.stopImmediatePropagation();
      var form = new FormData(document.getElementById('freelance-edit-form'));
      var link = base_url + 'freelance';
      $.ajax({
        url: base_url + 'freelance/edit',
        method: 'POST',
        processData: false, // tell jQuery not to process the data
        contentType: false, // tell jQuery not to set contentType
        data:form,
        success: function(data){
          console.log(data);
          var result = JSON.parse(data);
          if(result=='success'){     
              bs_notify("<strong>Successfully Updated Applicant Record</strong>","success","top","right");
              location.href=link;                
  
          }else{
              bs_notify("<strong>Unable to Update Applicant</strong>","danger","top","right"); 
          }
  
        }
      });
     
    });
  });







