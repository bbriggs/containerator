//Define an angular module for our app
var app = angular.module('myApp', []);

app.controller('tasksController', function($scope, $http) {
  getBeer(); // Load all beers regardless of on_tap status
  function getBeer(){
  $http.post("ajax/getBeer.php").success(function(data){
        $scope.tasks = data;
       });
  };
  $scope.addBeer = function (task) {
    $http.post("ajax/addBeer.php?task="+task).success(function(data){
        getBeer();
        $scope.taskInput = "";
      });
  };
  $scope.deleteBeer = function (task) {
    if(confirm("Are you sure to delete this beer?")){
    $http.post("ajax/deleteBeer.php?taskID="+task).success(function(data){
        getBeer();
      });
    }
  };

  $scope.toggleStatus = function(id, on_tap, task) {
    if(on_tap=='1'){on_tap='0';}else{on_tap='1';}
      $http.post("ajax/updateStatus.php?id="+id+"&on_tap="+on_tap).success(function(data){
        getBeer();
      });
  };

});
