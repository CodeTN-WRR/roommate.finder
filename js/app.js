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
			controller: "FriendController",
			templateUrl: "js/views/friends-template.html"
		})
		.when("/search_roommate", {
			controller: "SearchController",
			templateUrl: "js/views/searchresults-template.html"
		})
		.otherwise({
			redirectTo: "/"
		})
});

