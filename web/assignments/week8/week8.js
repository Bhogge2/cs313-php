const http = require('http');

const onRequest = (request,response) => {
    if(request.url == '/home')
    {
        response.write('<h1>Welcome to the home page</h1>');
    }
    else if (request.url == '/getData')
    {
        response.writeHead(200,{'Content-Type': 'application/json'});
        response.write(JSON.stringify({ name: "Bradford Hogge", class: "cs313"}));
    }
    else if (request.url == '/add')
    {
        response.writeHead(200,{'Content-Type': 'text/html'});
        response.write("<h1>Add Numbers</h1>");
    }
    else 
    {
        response.writeHead(200,{'Content-Type': 'text/html'});
        response.write('<h1>404 Page Not Found</h1>');
        response.end();
    }
    response.end();
}

const server = http.createServer(onRequest);
const callback = () => {
    console.log("Working");
};

server.listen(8888, callback);
var Hello = "Hello World";
console.log(Hello);