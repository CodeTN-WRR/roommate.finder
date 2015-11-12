app.factory("User", ['$http', function($http) {
	return $http.get("http://westrowdyrebels.projects.codetn.org/dev/json/user.json")
 		  .success(function(data) {
     	        return data;
             })
   		  .error(function(err) {
    					return err;
 			 			});
}]);
