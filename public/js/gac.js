        $(document).ready(function(){
       // alert("hh");
       
       alert("ff");

    
     $.ajax({
  type: "get",
  url: "{{url('new_sem')}}/" ,
  success: function(data){
   alert(data.test);
    if(data.test){
    $("#new").prop("disabled",true);
    }
    else{
 $("#new").prop("disabled",false);
    }
  }
});

 });