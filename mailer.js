const express = require('express')
const path = require('path')
const bodyParser = require('body-parser')
const app = express()
app.use(bodyParser.json())
app.use(bodyParser.urlencoded({ extended: true })); 
app.use(express.static(__dirname));
app.get('/',(req,res)=>{
    res.sendFile(path.join(__dirname, './index.html'))
})
app.post('/thankyou', (req,res)=>{
    console.log('hi')
    console.log(req.body)
    var nodemailer = require('nodemailer');


var transporter = nodemailer.createTransport({
    service: 'zoho',
    host:'smtp.zoho.com',
    port: 465,
    secure:true,
    auth: {
      user: 'queries@tedroox.com',
      pass: 'Queries.tedroox@12'
    }
  });
  
  var mailOptions = {
    from: 'tedroox <queries@tedroox.com>',
    to: req.body.email,
    subject: 'confirmation mail',
    html: '<p>thank you '+req.body.name+' for booking with dental academy, we will get back to you on '+req.body.phone+'</p>'
  };
  
  transporter.sendMail(mailOptions, function(error, info){
    if (error) {
      console.log(error);
    } else {
      console.log('Email sent: ' + info.response);
    }
  });
    res.sendFile(path.join(__dirname,'./thankyou.html'))
})

app.post('/contact_us',(req,res)=>{
    console.log(req.body)
    var nodemailer = require('nodemailer');


var transporter = nodemailer.createTransport({
    service: 'gmail',
    
    auth: {
      user: 'dentalconnectacademy@gmail.com',
      pass: 'Salil@1507'
    }
  });
  
  var mailOptions = {
    from: 'dentalconnectacademy@gmail.com',
    to: req.body.email,
    subject: 'contact us',
    html: '<p>thank you '+req.body.name+' for contacting dental academy, we will get back to you on your query on '+req.body.phone+'</p>'
  };
  
  transporter.sendMail(mailOptions, function(error, info){
    if (error) {
      console.log(error);
    } else {
      console.log('Email sent: ' + info.response);
    }



})
})
app.listen((3000), function(){
    console.log('running')
})