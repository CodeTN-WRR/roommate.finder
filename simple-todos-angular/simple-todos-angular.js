angular.module("Roomate_Finder", []);

angular.module('Roomate_Finder').controller("User_View", ['$scope',
    function ($scope) {
      $scope.names = [
          { fname: 'Ayden' },
          { fname: 'Ethan' },
          { fname: 'Jacob' }
      ];
 
  }]);