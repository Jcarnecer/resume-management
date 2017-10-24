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
                      <button class="btn custom-button" id="btn-update"data-id="${item['role_id']}"data-value="${item['pos_id']}" data-toggle="modal"data-target="#roleModal">Edit</a>
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

  
    $(document).getRoles().done(function(data){
        $(document).displayRoles(data);
    });
