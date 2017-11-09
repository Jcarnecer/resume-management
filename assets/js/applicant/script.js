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
          html+=`<option disabled>──────────</option>
          <option value="'+ "Add Role" +'" data-function="add_aplrole" data-toggle="modal_aplrole" data-target="modal">Add Role </option>`
          $("#role-applicant").html(html);
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
  

$.fn.getApplicants=function(){
    var $url = "Applicant/getApplicants";
   return $.ajax({
      url:$url,
      type:"GET",
      dataType: 'JSON'
    });
  };
  $.fn.displayApplicants=function(items){
  
    $("#tbody_applicant").html('');
  
        $.each(items,function(i,item){
            $('#tbody_applicant').append(`   
                    <tr>
                    <td>${item['first_name']}${item['last_name']}</td>
                    <td>${item['pos_name']}</td>
                    <td>${item['name']}</td>
                    <td>${item['current_status']}</td>
                    <td>    
                    <button type="button" class="btn custom-button" data-name="button-view" data-id=${item['id']}>View</button>
                    <a href="applicant/edit_view/${item['id']}" class="btn custom-button" data-id=${item['id']}>Edit</a>
                    </td>
                    </tr>`    
            );
            
        });
  };

  $(document).on('click','#btn_aplcancel',function(){
    location.href=document.referrer;
 });

 $(document).on('change','#role-applicant',function(){
            $('#role_form_applicant')[0].reset();    
            var role= $('#role-applicant').find(":selected").val();
            var posId = $("#pos-id").val();
            console.log(role);
            if(role=="Add Role"){
                $("#modal_aplrole").find("#btn-save").attr("data-function","add_aplrole"); 
                $("#modal_aplrole").find("#position_name").val(posId); 
                $('#modal_aplrole').modal('show');
            }
            
    });
    $('#modal_aplrole').on('hide.bs.modal', function (e) {
        // do something...
            $('#role-applicant').prop('selectedIndex',0);
      })     



    $(document).on('click',"button[data-function='add_aplrole']",function(){
        var url = "roles/insert_role";
        var form=$('#role_form_applicant').serialize();
            $.ajax({
                "url":url,
                "method":"POST",
                 data:form,
                success: function(data){
                    var result = JSON.parse(data);
                  if(result=='success'){
                        $(document).getRoles().done(function(data){
                                $(document).displayAplRoles(data);
                        });
                        bs_notify("<strong>Successfully Added A Role</strong>","success","top","center");  
                        $('#modal_aplrole').modal('hide'); 
        
        
                  }
                  else{
                      bs_notify("<strong>"+result+"</strong>","danger","top","right");  
                      $('#modal_aplrole').modal('hide'); 
                  }
      
                }
            });
      });





      $.fn.displayAplRoles=function(items){
        
          $("#role-applicant").html('');
        
              $.each(items,function(i,item){
                  $('#role-applicant').append(`
                  <option value=${item['id']} data-id=${item['pos_id']}>${item['name']}</option> `    
                  );
              });
               $('#role-applicant').append(` <option disabled>──────────</option>
               <option value="Add Role" data-function="add_aplrole" data-toggle="modal_aplrole" data-target="modal" >Add Role</option>`);

        };

