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

//add new record
$(document).ready(function(){

})

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

$(document).ready(function(){
  ("#checkBox").('checked', function(){
    $.ajax({
      type: 'POST',
      url: base_url + "applicant/add",
      data: $("#checkBox").serialize(),
      success: function(data){
        alert("Hello");
      }
  })


  });
});
