angular.module('app.routes', [])

.config(function($stateProvider, $urlRouterProvider) {

  // Ionic uses AngularUI Router which uses the concept of states
  // Learn more here: https://github.com/angular-ui/ui-router
  // Set up the various states which the app can be in.
  // Each state's controller can be found in controllers.js
  $stateProvider
    
  

  .state('menu.ventas', {
    url: '/ventas',
    views: {
      'side-menu21': {
        templateUrl: 'templates/ventas.html',
        controller: 'ventasCtrl'
      }
    }
  })

  .state('menu.marketing', {
    url: '/marketing',
    views: {
      'side-menu21': {
        templateUrl: 'templates/marketing.html',
        controller: 'marketingCtrl'
      }
    }
  })

  .state('menu.detalle', {
    url: '/detalle',
    views: {
      'side-menu21': {
        templateUrl: 'templates/detalle.html',
        controller: 'detalleCtrl'
      }
    }
  })

  .state('menu.main', {
    url: '/main',
    views: {
      'side-menu21': {
        templateUrl: 'templates/main.html',
        controller: 'mainCtrl'
      }
    }
  })

  .state('menu.subcategoria', {
    url: '/subcategoria',
    views: {
      'side-menu21': {
        templateUrl: 'templates/subcategoria.html',
        controller: 'subcategoriaCtrl'
      }
    }
  })

  .state('menu', {
    url: '/menu',
    templateUrl: 'templates/menu.html',
    controller: 'menuCtrl'
  })

  .state('login', {
    url: '/login',
    templateUrl: 'templates/login.html',
    controller: 'loginCtrl'
  })

$urlRouterProvider.otherwise('/login')

  

});