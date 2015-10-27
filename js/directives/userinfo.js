app.directive("userinfo", function() {
	return {
		restrict: "E",
		scope: {
			idnum: "="
		},
		templateUrl: "js/views/userinfo.html"
	};
});
