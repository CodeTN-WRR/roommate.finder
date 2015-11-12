app.controller("SearchController", ['$scope', 'Main',
    function ($scope, Main) {
		Main.success(function(data) {
  			$scope.Search_data = data;
  		});
    }]);
