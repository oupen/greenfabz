angular.module('starter.controllers', [])

.controller('AppCtrl', function($scope, $ionicModal, $timeout) {

  // With the new view caching in Ionic, Controllers are only called
  // when they are recreated or on app start, instead of every page change.
  // To listen for when this page is active (for example, to refresh data),
  // listen for the $ionicView.enter event:
  //$scope.$on('$ionicView.enter', function(e) {
  //});

  // Form data for the login modal
  $scope.loginData = {};

  // Create the login modal that we will use later
  $ionicModal.fromTemplateUrl('templates/login.html', {
    scope: $scope
  }).then(function(modal) {
    $scope.modal = modal;
  });

  // Triggered in the login modal to close it
  $scope.closeLogin = function() {
    $scope.modal.hide();
  };

  // Open the login modal
  $scope.login = function() {
    $scope.modal.show();
  };

  // Perform the login action when the user submits the login form
  $scope.doLogin = function() {
    console.log('Doing login', $scope.loginData);

    // Simulate a login delay. Remove this and replace with your login
    // code if using a login system
    $timeout(function() {
      $scope.closeLogin();
    }, 1000);
  };
})

.controller('PlaylistsCtrl', function($scope) {
  $scope.playlists = [
    { title: 'Reggae', id: 1 },
    { title: 'Chill', id: 2 },
    { title: 'Dubstep', id: 3 },
    { title: 'Indie', id: 4 },
    { title: 'Rap', id: 5 },
    { title: 'Cowbell', id: 6 }
  ];
})

.controller('articleCtrl', function($scope, $http, $stateParams, NgMap) {
    $http({
        method: 'GET',
        url: 'http://baptiste-dumortier.fr/PHP/greenfabz/api_get.php?id='+ $stateParams.articleId
    }).then(function succesCallback(response) {
        $scope.article = response.data;

        if ($scope.article.geoloc===""){
            $scope.hidden="ng-hide";
        }
    });
    NgMap.getMap().then(function(map) {
        $scope.map = map;
    });
})

.controller('mailCtrl', function($scope, $http){
    $scope.data = {};

    $scope.submit = function(){
        var link = 'http://baptiste-dumortier.fr/PHP/greenfabz/api.php';

        $http.post(link, {mail_adress : $scope.data.mail_adress, mail_text : $scope.data.mail_text})
    }
})
    .controller('quizzCtrl', function ($scope, $http) {
        $scope.data = {};

        $scope.submit = function(){
            var link = 'http://baptiste-dumortier.fr/PHP/greenfabz/api_quizz.php';

            $http.post(link, {reponse : $scope.data.reponse});

            $scope.hiddenreponse=" ";
        }
    })

    .controller('articlesCtrl', function($scope, $http) {
        $http({
            method: 'GET',
            url: 'http://baptiste-dumortier.fr/PHP/greenfabz/api_get.php'
        }).then(function succesCallback(response) {
            $scope.articles = response.data;
        })
    });
