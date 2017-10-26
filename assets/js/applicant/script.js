$(document).ready(function(){
    $("#add-record-form").on('submit',function(e){
      e.preventDefault();
      e.stopImmediatePropagation();
      var form = new FormData(document.getElementById("add-record-form"));
      var link = 'applicant';
      $.ajax({
         url: 'applicant/addRecord',
        type: "POST",
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



$(document).ready(function(){
    $("#edit-form").on('submit',function(e){
      e.preventDefault();
      e.stopImmediatePropagation();
      var form = new FormData(document.getElementById('edit-form'));
      var link = 'applicant';
      $.ajax({
        url:'applicant/edit',
        method: 'POST',
        processData: false, // tell jQuery not to process the data
        contentType: false, // tell jQuery not to set contentType
        data:form,
        success: function(data){
          console.log(data);
          var result = JSON.parse(data);
          if(result=='success'){     
              //bs_notify("<stro  ng>Successfully Updated Applicant Record</strong>","success","top","right");
              location.href=link;                
  
          }else{
              bs_notify("<strong>"+result+"</strong>","danger","top","right"); 
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
      var link = 'applicant';
      $.ajax({
        url: 'applicant/add_result',
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
            bs_notify("<strong>"+result+"</strong>","danger","top","right");
          }
  
        }
      });
      e.preventDefault();  
    });
  });







$(document).ready(function(){
    $("#pos-id").on('change', function(){
      var posid = $("#pos-id").val();
      $.ajax({
        url:"applicant/get_pos_role/" +posid,
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
});
  