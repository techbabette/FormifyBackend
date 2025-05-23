var nodemailer = require('nodemailer');
var rabbitmq = require('./listeners/rabbitmq.js');

let transporter = nodemailer.createTransport({
  host: process.env.MAILHOST,
  port: process.env.MAILPORT,
  pool: true,

  disableFileAccess: true,
  disableUrlAccess: true,

  auth: {
    user: process.env.MAIL,
    pass: process.env.MAILPASS
  }
}, {
  from: process.env.MAIL
})

messageSourceMap = {
  "rabbitmq" : rabbitmq
}

functionToRun = messageSourceMap[process.env.MESSAGE_SOURCE];
if (functionToRun){
  functionToRun(transporter);
}

exports.handler = async (event, context) => {
  for (let message of event.records){
    const jsonObject = JSON.parse(message.body);
    const email = jsonObject.body.email;
    const token = jsonObject.body.token;
    await sendActivationMail(transporter, email, token)
  }
}