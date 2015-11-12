app.controller("UserController", ['$scope', 'Main',
    function ($scope, Main) {
		Main.success(function(data) {
  			$scope.Main_data = data;
  		});
    }]);
