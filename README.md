wsdemo
======
A simple toy project to integrate:
* PHP session-based auth with web socket clients
* node.js
* socket.io
* angular.js

and learn a bit of git usage in the process. :)

Usage
======
* git clone
* cd wsdemo
* npm install (will install socket.io and cookies deps)
* add "127.0.0.1 websocket.dev" to /etc/hosts (needed for cookies to be sent)
* setup a simple vhost on your webserver, document root pointing to index.php
* run ./server in a terminal
* open http://websocket.dev in multiple browsers