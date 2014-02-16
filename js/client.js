var wsdemo = angular.module('wsdemo', {}),
    socket = io.connect('http://websocket.dev:8000');

wsdemo.controller('ranger', function($scope) {
    // handle own info (session ID, socket ID)
    var self;
    socket.on('self', function (data) {
        self = data;
    });
    
    // initial model
    $scope.data = {message: null, range: 30, log: []};
    
    // handle chat messages
    $scope.chat = function(data) {
       if (data.message) {
           socket.emit('chat', data.message);
           data.message = '';
       }
    }
    socket.on('chat', function (data) {
        data.self = {
            session: (data.author.session === self.session),
            socket:  (data.author.socket  === self.socket),
        };
        $scope.data.log.push(data);
        $scope.$apply();
    });
    
    // handle range change propagation
    $scope.range = function(data) {
        socket.emit('range', data.range);
    }
    socket.on('range', function (data) {
        $scope.data.range = data;
        $scope.$apply();
    });
});