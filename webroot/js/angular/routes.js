adminApp.config( ['$routeProvider',
  function($routeProvider) {
    $routeProvider.
      when('/dictionaries/index/:domain', {
        templateUrl: '/angular/template?t=Dictionary.dictionaries/index',
        controller: 'DictionariesCtrl'
      }).
      when('/dictionaries/edit/:node', {
        templateUrl: '/angular/template?t=Dictionary.dictionaries/edit',
        controller: 'DictionariesEditCtrl'
      })
  }
]);