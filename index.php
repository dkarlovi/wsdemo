<?php
// we wish to integrate PHP sessions with node.js
session_name('PHPSESSID');
session_start();
?><html ng-app="wsdemo">
<head>
<title>Angular.js + node.js + socket.io plaything</title>
<link rel="stylesheet" href="css/style.css" />

<script src="js/lib/angular.js"></script>
<script src="js/lib/socket.io.js"></script>
<script src="js/client.js"></script>
</head>
<body ng-controller="ranger">
    <div id="log">
        <div ng-repeat="item in data.log">
            <div class="time">{{ item.timestamp|date:'mediumTime' }}</div>
            <div class="author">
                <abbr title="Session ID" class="session_id" ng-class="{'self': item.self.session}">{{ item.author.session }}</abbr>
                (<abbr title="Socket ID" class="socket_id" ng-class="{'self': item.self.socket}">{{ item.author.socket }}</abbr>)
            </div>
            <div class="text">{{ item.text }}</div>
            <div style="clear: both;"></div>
        </div>
    </div>
    <form ng-submit="chat(data)">
        <input type="text" placeholder="Message" ng-model="data.message"/>
        <button type="submit">Send</button>
    </form>
    <div>
        <input type="range" min="0" max="100" step="5" ng-model="data.range" ng-change="range(data)"/> <span class="range">{{ data.range }}</span>
    </div>
</body>
</html>