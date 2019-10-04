




var a;
//window.addEventListener('load', init, false);







$(function(){

     a = new AudioContext();
    document.getElementById("search_form_user_id").focus();

   $('.btn-report').click(function(){

       $('#myModal').modal();
   });


});


function init() {
 

  v=a.createOscillator()
  u=a.createGain()
  v.connect(u)
  v.frequency.value=800
  v.type="square"
  u.connect(a.destination)
  u.gain.value=100*0.01
  v.start(a.currentTime)
  v.stop(a.currentTime+200*0.001)

  


     a.resume().then(() => {
    console.log('Playback resumed successfully');
  });
 
}


 
  $("#search_form_search").click(function(){
//alert('erterte');
var id=$('#search_form_user_id').val();
 
  $.get("{{ path('fetch_user')}}?id="+id,
 
  function(data, status){
if(data=='1'){
    alert("No Such IDNo")
}
else{
var response=data.split(',');
   $('.employee_id').html(response[0]),
   $('.full_name').html(response[1]+" "+response[2]),
   $('.phone').html(response[4]),
   $('.occupation').html(response[5]),
   $('.last_seen').html(response[6]),
   $('.gender').html(response[7]);

   if(response[8]!='0'){

   $('.issue_text').html(response[8])
 



   }

   $('.user_image').attr('src',"{{ asset('images/')}}"+response[3]+"")
   

   // call the audio contenxt
init();
}
 $('#search_form_user_id').val(""),
  document.getElementById("search_form_user_id").focus();
 
  });


  });
     



// to report issues
  $(".btn-send-report").click(function(){
//alert('erterte');

var employee_id=$('.employee_id').text();
var report_text=$('.report_textarea').val();
 
  $.get("{{ path('report_issue')}}?employee_id="+employee_id+"&data="+report_text,
 
  function(data, status){
if(data=='1'){
    alert("No Such IDNo"),
    $('#myModal').modal("close");
}
else{
    alert("done");
//var response=data.split(',');
   
$('#myModal').modal("hide");

   

}
 $('.report_textarea').val("");
 

  });


  });




