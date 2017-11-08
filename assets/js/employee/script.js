$(document).ready(function(){
    $("#add-employee-form").on('submit',function(e){
      e.preventDefault();
      e.stopImmediatePropagation();
      var form = new FormData(document.getElementById("add-employee-form"));
      var link = 'employee';
      $.ajax({
        url: 'employee/addRecord',
        method: 'POST',
        processData: false, // tell jQuery not to process the data
        contentType: false, // tell jQuery not to set contentType
        data:form,
        success: function(data){
          console.log(data);
          var result = JSON.parse(data);
          if(result==='success'){
            //   $('[name="position"]').val('');
            //   $('[name="role"]').val('');        
            //   $('[name="last_name"]').val('');                
            //   $('[name="first_name"]').val('');
            //   $('[name="middle_name"]').val('');
            //   $('[name="email_address"]').val('');       
            //   $('[name="home_address"]').val('');       
            //   $('[name="phone_number"]').val('');         
            //   $('[name="birth_date"]').val('');       
            //   $('[name="degree"]').val('');       
            //   $('[name="school"]').val('');       
            //   $('[name="application_date"]').val('');       
            //   $('[name="available_date"]').val('');       
            //   $('[name="expected_salary"]').val(''); 
            //   $('[name="comment"]').val('');       
            //   $('[name="resume_file"]').val('');
            //   $('html, body').animate({ scrollTop: 0  }, "slow");
            //   bs_notify("<strong>Successfully Added Record</strong>","success","top","right");         
                location.href=link;
          }else{
            bs_notify("<strong>"+result+"</strong>","danger","top","right");
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



  $(document).ready(function(){
    $("#employee-edit-form").on('submit',function(e){
      e.preventDefault();
      e.stopImmediatePropagation();
      var form = new FormData(document.getElementById('employee-edit-form'));
      var link = 'employee';
      $.ajax({
        url:'employee/edit_data',
        method: 'POST',
        processData: false, // tell jQuery not to process the data
        contentType: false, // tell jQuery not to set contentType
        data:form,
        success: function(data){
          console.log(data);
          var result = JSON.parse(data);
          if(result=='success'){     
              //bs_notify("<strong>Successfully Updated Employee Record</strong>","success","top","right");
              location.href=link;                
  
          }else{
            bs_notify("<strong>"+result+"</strong>","danger","top","right");
          }
  
        }
      });
     
    });
  });


  $(function(){
    
      $('[data-name="button-view"]').click(function() {
          var applicantId = $(this).attr('data-id');
          var url =  "employee/" +  applicantId;
            console.log(applicantId);
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


    $(document).on('change','#role-employee',function(){

        var role= $('#role-employee').find(":selected").val();
        console.log(role);
        if(role=="Add Role"){
            $("#modal_emprole").find("#btn-save").attr("data-function","add_emprole"); 
            $('#modal_emprole').modal('show');
        }

    });



    $(document).on('click',"button[data-function='add_emprole']",function(){
        var url = "roles/insert_role";
        var form=$('#role_form_employee').serialize();
            $.ajax({
                "url":url,
                "method":"POST",
                 data:form,
                success: function(data){
                    var result = JSON.parse(data);
                  if(result=='success'){
                        $(document).getEmpRoles().done(function(data){
                                $(document).displayEmpRoles(data);
                        });
                        bs_notify("<strong>Successfully Added A Role</strong>","success","top","center");  
                        $('#modal_emprole').modal('toggle'); 
        
        
                  }
                  else{
                      bs_notify("<strong>"+result+"</strong>","danger","top","right");  
                      $('#modal_emprole').modal('toggle'); 
                  }
      
                }
            });
      });



      $.fn.getEmpRoles=function(){
        var $url = "roles/get_pos_role/"+1;
       return $.ajax({
          url:$url,
          type:"GET",
          dataType: 'JSON'
        });
      };


      $.fn.displayEmpRoles=function(items){
        
          $("#role-employee").html('');
        
              $.each(items,function(i,item){
                  $('#role-employee').append(`
                  <option value=${item['id']} data-id=${item['pos_id']}>${item['name']}</option> `    
                  );
              });

         $('#role-employee').append('<option value="Add Role" data-function="add_emprole" data-toggle="modal_emprole" data-target="modal" >Add Role</option>');

         };


        $(document).on('click','#btn_empcancel',function(){
            location.href=document.referrer;
         });



















