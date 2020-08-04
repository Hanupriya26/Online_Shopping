var mysql = require('mysql');
var express = require('express');
var session = require('express-session');
var bodyParser = require('body-parser');
var path = require('path');

var app = express();
app.use(bodyParser.urlencoded({extended : true}));
app.use(bodyParser.json());
app.use(session({
	secret: 'secret',
	resave: true,
	saveUninitialized: true
}));

var connection = mysql.createConnection({
	host     : 'localhost',
	user     : 'root',
	password : '',
	database : 'myntra'
});

app.use('/public',express.static(path.join(__dirname,'public')));

app.get('/login.html', function (request, response) {
	response.sendFile(path.join(__dirname,"pages/login.html"));
});



app.post('/login_auth', function(request, response) {
	var username = request.body.username;
	var password = request.body.password;
	
	if (username && password) {
		connection.query('SELECT * FROM UserLogin WHERE User = ? AND Password = ?', [username, password], function(error, results, fields) {
			if (results.length > 0) {
				/*
				request.session.loggedin = true;
				request.session.username = username;
				response.redirect('/home');
				*/
				response.send('Success');
			} else {
				response.send('Incorrect Username and/or Password!');
			}			
			response.end();
		});
	} else {
		response.send('Please enter Username and Password!');
		response.end();
	}
	console.log(username);console.log(password);
	//response.redirect('/login.html');
});

 var server = app.listen(3001, "127.0.0.1", function () {
	var host = server.address().address;
	var port = server.address().port;
 
	console.log("Myntra is running at http://%s:%s", host, port);
 });

