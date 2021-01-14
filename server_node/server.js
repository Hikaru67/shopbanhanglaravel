var io = require('socket.io')(6001, {
    cors: {
        origin: '*',
    }
})
console.log('Connected to port 6001')
io.on('error', function (socket){
    console.log('error')
})
io.on('connection', function (socket){
    console.log('Có người vừa kết nối' + socket.io)
})
var Redis = require('ioredis')
var redis = new Redis(6379)
redis.psubscribe("*", function (error, count){
    //
})
redis.on('pmessage', function (partner, chanel, message){
    console.log(chanel)
    console.log(message)
    console.log(partner)

    message = JSON.parse(message)

    io.emit(chanel + ":" + message.event, message.data.message)
    console.log('Sent')
})
