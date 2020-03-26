var nodemailer = require('nodemailer');
var fs = require('fs');

var cred = JSON.parse(fs.readFileSync('C:/xampp/htdocs/filmeto/email/cred.json', 'utf8'));
var transporter = nodemailer.createTransport({
    service: cred.service,
    auth: {
        user: cred.user,
        pass : cred.pass
    }
});

send(process.argv[2], process.argv[3], process.argv[4]);

function send(name, email, message){

    var mailOptions = {
        from: '"Head communications Filmeto "<kmarcelus92@gmail.com>',
        to: email,
        subject: 'Welcome to Filmeto. DO NO REPLY!',
        html: `
        <!DOCTYPE html>
            <html>
            <head>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Filmeto</title>
            <style>
            * {
              box-sizing:border-box;
            }


            .main {
              background-color: orange;
              padding:20px;
              float:left;
              width:100%; /* The width is 60%, by default */
            }

            /* Use a media query to add a break point at 800px: */
            @media screen and (max-width:500px) {
              .main {
                width:100%; /* The width is 100%, when the viewport is 800px or smaller */
              }
            }
            </style>
            </head>
            <body>

            <div class="left"> &nbsp;</div>
            <div class="main">
              <p style="font-size: 35px"><b>Filmeto</b></p>
              
            </div>

           
            <h3>Hi&nbsp;   `+name+`.</h3>
            <h3>This is a response to your message sent through our website.</h3>

            <h3>"`+message+`"</h3>
            

            </body>
</html>
        `
    };
    
    process.env["NODE_TLS_REJECT_UNAUTHORIZED"] = 0;
    transporter.sendMail(mailOptions, function(error, info){
        if(error){
            console.log(error);
        }
        else{
            console.log('Email sent to ' + email);
        }
    });
}
