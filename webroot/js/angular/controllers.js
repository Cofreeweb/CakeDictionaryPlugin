
angular.module( 'adminApp').controller( 'DictionariesCtrl', function( $scope, $rootScope, $routeParams, $http, paginationFactory) {
    var url = paginationFactory.url( '/admin/dictionary/dictionaries/index/' + $routeParams.domain + '.json');
    $http.get( url).success(function( data){
      $scope.nodes = data.nodes;
      $scope.pages = data.paging.pageCount;
      $scope.current = data.paging.page;
    });
    
    console.log( $rootScope.languages);
    
});


angular.module( 'adminApp').controller( 'DictionariesEditCtrl', function( $scope, $routeParams, $http) {
    $http.get( '/admin/dictionary/dictionaries/edit/' + $routeParams.node + '.json').success(function( data){
      $scope.dictionary = data.dictionary;
    });
});
