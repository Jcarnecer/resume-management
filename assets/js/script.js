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
                     regexp: /^[a-zA-Z]+$/,
                     message: 'The Last name can only consist of letters'
                   },
                }
            },

            first_name: {
                validators: {
                    notEmpty: {
                        message: 'The First name is required and cannot be empty'
                      },
                      regexp: {
                       regexp: /^[a-zA-Z]+$/,
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
                       regexp: /^[a-zA-Z]+$/,
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
    $('#staff').on('change', function() {
      if(this.value == '1'){
        $("#status").hide();
      }
      else if( this.value == '2')
      {
        $("#emp_form").show();
        $("#status").show();
        $("#expected_salary").hide();
        $("#application_date").hide();
        $("#resume").hide();
      }
      else
      {
        $("#emp_form").hide();
        $("#status").show();
        $("#expected_salary").hide();
        $("#application_date").hide();
        $("#resume").hide();
      }
    });
});



/*
//add new record
$(document).ready(function(){
  $("#add-record-form").on('submit',function(e){
    var form = new FormData(document.getElementById("add-record-form"));
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
          alert('pasok');
        }else{
          alert('hindi pasok');
        }
      }
    })
    e.preventDefault();
  })
})
*/
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

        // $("#role").val(result.name); //nosure
        // var id = data[]['id'];
        // var name = data[]['name'];
        // console.log(id);
        // console.log(data['','name']);
        // $("#role").html("<option value="+'id'+">asdadsad</option>"); //not best way (try)
        // "<option value='1'>NAME</option>"
      }
    });
  });
});

$(function() {
  $("#add-role-form").on('submit', function(e){
    e.preventDefault();

    $.ajax({
      url: base_url + "insert_role",
      type: 'POST',
      data: $('#add-role-form').serialize(),
      success: function(data){
        
      }
    });
  });
});
