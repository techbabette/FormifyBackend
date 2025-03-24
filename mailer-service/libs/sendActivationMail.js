function sendActivationMail(transporter, email, token){
    let mailOptions = {
        to: email,
        html: `Click <a href="${process.env.ACTIVATION_URL}/${token}">here to activate your acount</a>`,
        text: `Click the following link to activate your account ${process.env.ACTIVATION_URL}/${token}`,
        subject: "Formify activation mail"
    }

    return transporter.sendMail(mailOptions)
}

module.exports = sendActivationMail