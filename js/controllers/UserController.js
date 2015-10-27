app.controller("UserController", ['$scope',
    function ($scope) {
	$scope.appName = "roomate.finder";
	$scope.twelve = [
		{
			photo: "../../Images/Tux-ECB.png",
			name: "Ayden Case",
			age: 15,
			college: "University of Tennessee",
			highschool: "West High School",
			interests: "Coding, Sleeping, Eating, Reddit, Linux",	
		}
	]
    }]);
