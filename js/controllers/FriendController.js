app.controller("FriendController", ['$scope', 'FriendService',
    function ($scope, FriendService) {
		FriendService.success(function(data) {
  			$scope.Friend_data = data;
  		});
    }]);
