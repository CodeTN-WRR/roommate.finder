app.directive("userinfo", function() {
	return {
		restrict: "E",
		scope: {
			idnum: "="
		},
		templateUrl: "js/directives/userinfo.html"
	};
});
