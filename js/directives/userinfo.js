app.directive("userinfo", function() {
	return {
		restrict: "E",
		scope: {
			id: "="
		},
		templateUrl: "js/directives/userinfo.html"
	       };
});
