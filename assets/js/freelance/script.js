$(document).ready(function(){
    $("#add-freelance-form").on('submit',function(e){
      e.preventDefault();
      e.stopImmediatePropagation();
      var form = new FormData(document.getElementById("add-freelance-form"));
      var link = 'freelance';
      $.ajax({
         url: 'freelance/addRecord',
        type: "POST",
        processData: false, // tell jQuery not to process the data
        contentType: false, // tell jQuery not to set contentType
        data:form,
        success: function(data){
          console.log(data);
          var result = JSON.parse(data);
          if(result==='success'){
            // $('[name="position"]').val('');
            // $('[name="role"]').val('');        
            // $('[name="last_name"]').val('');                
            // $('[name="first_name"]').val('');
            // $('[name="middle_name"]').val('');
            // $('[name="email_address"]').val('');       
            // $('[name="home_address"]').val('');       
            // $('[name="phone_number"]').val('');         
            // $('[name="birth_date"]').val('');       
            // $('[name="degree"]').val('');       
            // $('[name="school"]').val('');       
            // $('[name="application_date"]').val('');       
            // $('[name="available_date"]').val('');       
            // $('[name="expected_salary"]').val(''); 
            // $('[name="comment"]').val('');       
            // $('[name="resume_file"]').val('');
            // $('html, body').animate({ scrollTop: 0  }, "slow");
            // bs_notify("<strong>Successfully Added Record</strong>","success","top","right");         
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
    $("#freelance-edit-form").on('submit',function(e){
      e.preventDefault();
      e.stopImmediatePropagation();
      var form = new FormData(document.getElementById('freelance-edit-form'));
      var link ='freelance';
      $.ajax({
        url: 'freelance/edit_data',
        method: 'POST',
        processData: false, // tell jQuery not to process the data
        contentType: false, // tell jQuery not to set contentType
        data:form,
        success: function(data){
          console.log(data);
          var result = JSON.parse(data);
          if(result=='success'){     
              //bs_notify("<strong>Successfully Updated Applicant Record</strong>","success","top","right");
              location.href=link;                
  
          }else{
            bs_notify("<strong>"+result+"</strong>","danger","top","right"); 
          }
  
        }
      });
     
    });
  });


    $(document).on('change','#role-freelance',function(){
        $('#form_role_freelance')[0].reset();    
            var role= $('#role-freelance').find(":selected").val();
            if(role=="Add Role"){
                $("#modal_freelance_role").find("#btn-save").attr("data-function","add_emprole"); 
                $('#modal_freelance_role').modal('show');
            }
    
        });
    
    
    
        $(document).on('click',"button[data-function='add_freelance_role']",function(){
            var url = "roles/insert_role";
            var form=$('#form_role_freelance').serialize();
                $.ajax({
                    "url":url,
                    "method":"POST",
                     data:form,
                    success: function(data){
                        var result = JSON.parse(data);
                      if(result=='success'){
                            $(document).getFreelanceRoles().done(function(data){
                                    $(document).displayFreelanceRoles(data);
                            });
                            bs_notify("<strong>Successfully Added A Role</strong>","success","top","center");  
                            $('#modal_freelance_role').modal('toggle'); 
            
            
                      }
                      else{
                          bs_notify("<strong>"+result+"</strong>","danger","top","right");  
                          $('#modal_freelance_role').modal('toggle'); 
                      }
          
                    }
                });
          });
    
    
    
          $.fn.getFreelanceRoles=function(){
            var $url = "roles/get_pos_role/"+3;
           return $.ajax({
              url:$url,
              type:"GET",
              dataType: 'JSON'
            });
          };
    
    
          $.fn.displayFreelanceRoles=function(items){
            
              $("#role-freelance").html('');
            
                  $.each(items,function(i,item){
                      $('#role-freelance').append(`
                      <option value=${item['id']} data-id=${item['pos_id']}>${item['name']}</option> `    
                      );
                  });
                  $('#role-freelance').append('<option value="Add Role" data-function="add_freelance_role" data-toggle="modal_freelance_role" data-target="modal" >Add Role</option>');      
                  
            };
    
            
    $(document).on('click','#btn_freelancecancel',function(){
        location.href=document.referrer;
     });