( function( $ ) {

  var uid=blog.id;
  var page_refreshed=0;
  var page=1;
  var topic=$("#topic").text();
  
  
socket.emit('validate',{Usid:uid,topic_Id:topic});


$('.msg_box').keypress(function(event){

  var topic=$("#topic").text();
    if ( event.which == 13 ) {  
         var input_message= $("#msg_box").val();   
          data={
            id:uid,
            topicId:topic,
            msg:input_message
          };
        socket.send(JSON.stringify(data));
        $("#msg_box").val('');
        }
    
       
    });



socket.on('message', function(data){
var topic=$("#topic").text();
  var chat=JSON.parse(data);

  if(chat.topicId==topic){
  $("#chatbox").animate({scrollTop: $("#chatbox").get(0).scrollHeight},900);
  $("#chatbox").append("<li class='actual_msg' style='text-align:left;float:left'><section><strong style='margin-left: -15px;'>"+data+": </strong></section></li>");

  }
  
});



socket.on('user entrance',function(data){ 
   
  if(uid==data.user){
  for(var i=0;i<data.message.length;i++){
  $("#chatbox").append("<li class='actual_msg' style='text-align:left;float:left'><section><strong style='margin-left: -15px;'>"+data.message[i]+": </strong></section></li>");
   }
}
});

} )( jQuery );
