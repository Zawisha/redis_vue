var http = require('http').Server();
var io = require('socket.io')(http);
var Redis = require('ioredis');
io.origins('*:*');


var redis = new Redis();
redis.subscribe('my-channel');
console.log('TUUUU');
redis.on('message', function (channel, message) {
    console.log('TORAAAA');
    console.log('Message recieved ' + message);
    console.log('Channel recieved' + channel);
    message = JSON.parse(message);
    io.emit(channel + ':' + message.event, message.data);
});

http.listen(3000, function()
    {
  console.log('ListeningSSS on Port 3000');
    }
);