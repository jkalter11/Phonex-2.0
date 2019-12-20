var app = require("express")();
var bodyParser = require('body-parser');
var http = require('http').Server(app);
var io = require("socket.io")(http);
var mysql = require("mysql");
var dateFormat = require('dateformat');
var redis = require("redis");

// redis clients
var store = redis.createClient();
var store = redis.createClient();
var pub = redis.createClient();
var sub = redis.createClient() ;
var sessionStore = redis.createClient() ;



app.use(require("express").static('data'));
app.use(bodyParser.urlencoded({
  extended: true
}));
app.use(bodyParser.json());

app.get("/",function(req,res){
    res.sendFile(__dirname + '/index.html');
});


//  getting today's date  
var now = new Date();
var today=dateFormat(now, "mmmm dS, yyyy");





// To save data in MySQL at the end of Chat Session
function save_session(){

  var con = mysql.createConnection({
        host : 'localhost',
        user : 'wordpress',
        password : 'Z3ArUoM8Con3qIc',
        database : 'wordpress'
  });
  con.connect(function(err){

     if (err) console.log('Could not connect to MySQL server');
     var sql = "INSERT INTO chatsessionstable (topicId, session) values ('" + topic + "', '" + JSON.stringify(data) + "')";
     sql_conn.query(sql, function (err, result) {

      if (err) throw console.log('Could not connect to MySQL server');
      console.log('Saved data');

     });

  });
}


// This is auto initiated event when Client connects to Your Machine.  
io.on('connection',function(socket){  
socket.on('validate',function(data){


if(data.Usid!='0') {

socket.nickname=data.topic_Id;
sub.subscribe(data.topic_Id);
var messageHistory=[];

sessionStore.scard('session-'+socket.nickname, function(err,count){

  if(count>0){
    sessionStore.smembers('session-'+socket.nickname, function(err,messages){

      messages.sort();
      var index=0;
      messages.forEach(function(message){
      console.log(message);

      store.hgetall(message, function(e, obj){

        messageHistory[index]=JSON.stringify(obj.text).replace(/\\\"/g, '').replace(/\\n/g, '');
        index=index+1;
            
        if(index == messages.length){
            io.emit('user entrance',{
                user:data.Usid,
                message:messageHistory
            });
          }
      });


      });   
    });
   }
  });

}

});







  socket.on("message", function(text){

    store.incr("messageNextId", function(e, id){
      store.hmset(id, { uid: socket.nickname, text: text }, function(e, r){
      sessionStore.sadd("session-"+socket.nickname, id);
      pub.publish(socket.nickname,  id);
      });
    });
  });
  
  sub.on("message", function(pattern, key){
  store.hgetall(key, function(e, obj){
    
  var message_sent=(obj.text).replace(/\\\"/g, '').replace(/\\n/g, '');
  socket.send(obj.text);
    });
  });

});


http.listen(81,function(){
    console.log("Listening on 81");
});







