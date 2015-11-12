var app = angular.module("Roomate_Finder", ['ngRoute']);

app.config(function($routeProvider) {
	console.log($routeProvider);
	$routeProvider
		.when("/", {
			controller: "UserController",
			templateUrl: "js/views/home-template.html"
		})
		.when("/profile", {
			controller: "UserController",
			templateUrl: "js/views/profile-template.html"
		})
		.when("/friends_list", {
			controller: "UserController",
			templateUrl: "js/views/searchresults-template.html"
		})
		.when("/search_roommate", {
			controller: "UserController",
			templateUrl: "js/views/searchresults-template.html"
		})
		.otherwise({
			redirectTo: "/"
		})
});

