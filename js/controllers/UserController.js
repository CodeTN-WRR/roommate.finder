app.controller("UserController", ['$scope', 'User',
    function ($scope, User) {
		User.success(function(data) {
  			$scope.User_data = data;
  		});
    }]);
