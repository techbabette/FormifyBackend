var amqp = require('amqplib/callback_api');
const sendActivationMail = require('../libs/sendActivationMail');
function rabbitmq(transporter){
    console.log(process.env.MQ);
    amqp.connect(`amqp://${process.env.MQ_USER}:${process.env.MQ_PASS}@${process.env.MQ}`, function(error0, connection) {
      if (error0) {
        throw error0;
      }
      connection.createChannel(function(error1, channel) {
        if (error1) {
          throw error1;
        }
        var exchange = 'main_exchange';
        var queue = "mail_queue"
        var event = "mail_token"


        channel.assertExchange(exchange, 'direct', {
          durable : true
        });

        channel.assertQueue(queue, {
          exclusive: false
        }, function(error2, q){
          if (error2){
            throw error2;
          }

          channel.prefetch(1);

          console.log(" [*] Waiting for messages in %s. To exit press CTRL+C", queue);

          channel.bindQueue(q.queue, exchange, event)

          channel.consume(q.queue, data => {
            let message = JSON.parse(data.content.toString());
            sendActivationMail(transporter, message.email, message.token)
            .then((info) => {
              console.log("Delivered message", info.messageId);
              channel.ack(data)
            })
            .catch((error) => {
              console.log(error.stack);
              channel.nack(data);
            })
          });
        });
      });
    });
}

module.exports = rabbitmq;
