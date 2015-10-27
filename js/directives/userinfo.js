app.directive("userinfo", function() {
	return {
		restrict: "E",
		scope: {
			id: "="
		},
		templateUrl: "UserInfo.html"
	       };
});
