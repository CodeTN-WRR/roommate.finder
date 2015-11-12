app.factory("Main", ['$http', function($http) {
	return $http.get("http://westrowdyrebels.projects.codetn.org/dev/json/search-results.json")
 		  .success(function(data) {
     	        return data;
             })
   		  .error(function(err) {
    					return err;
 			 			});
}]);
