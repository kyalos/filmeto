var nodemailer = require('nodemailer');
var fs = require('fs');

var cred = JSON.parse(fs.readFileSync('C:/xampp/htdocs/glass/backend/email/cred.json', 'utf8'));
var transporter = nodemailer.createTransport({
    service: cred.service,
    auth: {
        user: cred.user,
        pass : cred.pass
    }
});

send(process.argv[2], process.argv[3], process.argv[4], process.argv[5]);

function send(username, username2, email, _password){
    var mailOptions = {
        from: '"Voting Commissioner "<kmarcelus92@gmail.com>',
        to: email,
        subject: 'Welcome to Glass. DO NO REPLY!',
        html: `
        <!DOCTYPE html>
            <html>
            <head>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Glass</title>
            <style>
            * {
              box-sizing:border-box;
            }


            .main {
              background-color: #f7b160;
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
              <p style="font-size: 40px"><b>Glass</b></p>
            </div>

            <ol>    
            <li><h3>Welcome `+username +` `+username2+`</h3></li>
            <li><h3>You have been successfully registered</h3></li>
            <li><h3>Use the following password to access the system.</h3></li>
            <li><h3>PLEASE KEEP YOUR PASSWORD A SECRET</h3></li>

            <li><h3>Please do NOT reply to this email</h3></li>
            

            <li><h4>Password: <span>`+_password+`</span></h4></li>

            <li><a href="localhost/glass"><h4> Go to system</h4></a></li>
            
            </ol>

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
