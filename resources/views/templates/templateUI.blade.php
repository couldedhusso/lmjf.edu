<!DOCTYPE html>

<html lang="en-US">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,700' rel='stylesheet' type='text/css'>
    <link href="assets/fonts/font-awesome.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="assets/css/bootstrap-select.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="assets/css/jquery.slider.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
      <link type="text/css" href="assets/semantic/semantic.css" rel="stylesheet">
    <link type="text/css" href="assets/metro/css/metro.css" rel="stylesheet">


    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <link type="text/css" href="assets/css/masterstyle.css" rel="stylesheet">

      {{-- <title>Mena | Bookmarked Properties</title> --}}

    <title>LMJFB | HOME </title>

</head>

<body class="page-sub-page page-my-properties page-account" id="page-top"
            ng-app="mainApp" ng-controller="mainController">
<!-- Wrapper -->
<div class="wrapper">
  <div>
      @include('layouts.Header')
  </div>

    <!-- Page Content -->
    <div id="page-content">
        <!-- Breadcrumb -->
        <div class="container" style="padding-top:40px;">

            <ol class="breadcrumb">
                <li><a href="index.html">Acceuil</a></li>
                @yield('breadcrumb')
            </ol>
        </div>
        <!-- end Breadcrumb -->

        <div class="container">
            <div class="row">
            <!-- sidebar -->
            <div class="col-md-3 col-sm-2">
                <section id="sidebar">
                    <header><h3><img class="ui avatar image" src="/images/wireframe/square-image.png">
                            <span>Username</span></h3></header>
                      <aside>
                        <div class="panel panel-default panel-flush">
                              <div class="panel-heading">
                                  Actualités du site
                                </div>

                                <div class="panel-body">
                                <div class="spark-settings-tabs">
                                   <ul class="nav spark-settings-stacked-tabs" role="tablist">
                                        <li role="presentation">
                                            <a href="{{url('/actualites-site')}}">
                                                  Notre vie scolaire
                                             </a>
                                        </li>
                                        {{-- <li role="presentation">
                                            <a href="{{url('/ajouter-un-article')}}">
                                                Ajouter une actua.
                                            </a>
                                        </li> --}}
                                    </ul>
                                </div>
                              </div>
                        </div>

                        <div class="panel panel-default panel-flush">
                              <div class="panel-heading">
                                  Autres
                                </div>

                                <div class="panel-body">
                                <div class="spark-settings-tabs">
                                   <ul class="nav spark-settings-stacked-tabs" role="tablist">
                                        <li role="presentation">
                                            <a href="{{url('/ajouter-un-compte-utilisateur')}}">
                                                  Comptes utilisateur
                                             </a>
                                        </li>

                                        {{-- <li role="presentation">
                                            <a href="/docs/2.0/releases">
                                                Supprimer un compte
                                            </a>
                                        </li> --}}

                                        <li role="presentation">
                                            <a href="{{url('/ajouter-un-eleve')}}">
                                              Nos élèves
                                            </a>
                                        </li>

                                        <li role="presentation">
                                            <a href="{{url('/ajouter-une-classe')}}">
                                                Classes
                                            </a>
                                        </li>

                                        <li role="presentation">
                                            <a href="{{url('/ajouter-une-discipline')}}">
                                                   Disciplines
                                             </a>
                                        </li>

                                        <li role="presentation">
                                            <a href="{{url('/ajouter-un-semestre')}}">
                                                Semestres
                                             </a>
                                        </li>

                                    </ul>
                                </div>
                              </div>
                        </div>
                      </aside>
                </section><!-- /#sidebar -->
            </div><!-- /.col-md-3 -->
            <!-- end Sidebar -->

              <div class="col-lg-9">

                    <div class="panel panel-default panel-flush">
                      <div class="panel-heading">
                          @yield('heading-form')
                      </div>
                      <div class="panel-body" style="padding:15px;">
                          @yield('section-form')
                      </div>
                    </div>

                    <div class="panel panel-default panel-flush">
                      <div class="panel-heading">
                          @yield('heading-item')
                      </div>
                      <div class="panel-body" style="padding:15px;">
                          @yield('list-item')
                      </div>
                    </div>


                </div>
                <!-- end My Properties -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div>
    <!-- end Page Content -->
    <!-- Page Footer -->
    <!-- Page Footer -->
    <footer id="page-footer">
        <div class="inner">
            <aside id="footer-main">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-sm-6">
                            <span>LMJFB Copyright © 2016. All Rights Reserved.</span>
                        </div><!-- /.col-sm-6 -->

                        <div class="col-md-3 col-sm-3">
                             <span class="pull-right"><a href="#page-top" class="roll"><i class="fa fa-arrow-up">&nbsp; Haut</i></a></span>
                        </div><!-- /.col-sm-3 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </aside><!-- /#footer-main -->
        </div><!-- /.inner -->
    </footer>
    <!-- end Page Footer -->
    <!-- end Page Footer -->
</div>

<script type="text/javascript" src="assets/js/jquery-2.1.0.min.js"></script>
<script type="text/javascript" src="assets/js/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/smoothscroll.js"></script>
<script type="text/javascript" src="assets/js/retina-1.1.0.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.magnific-popup.min.js"></script>
<script src="assets/metro/js/metro.js"></script>
<script type="text/javascript" src="assets/js/scrollReveal.min.js"></script>
<script type="text/javascript" src="{{asset('assets/angular/js/angular.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/angular/js/angular-ui-bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/angular/angularApp.js')}}"></script>
<script type="text/javascript" src="assets/semantic/semantic.js"></script>
<!--[if gt IE 8]>
<script type="text/javascript" src="assets/js/ie.js"></script>
<![endif]-->

<script type="text/javascript">
  $('select.dropdown').dropdown();
  $('.ui.radio.checkbox').checkbox();

  // function HideDiv {
  //   var role = "";
  //   var len =
  //
  //   document.getElementById(id).style.visibility="hidden";
  //   return true;
  // }
</script>
<script type="text/javascript">

  // var role = document.getElementById(id);
  // document.getElementById('#content-teacher').style.visibility="hidden";
  // if (role == 'teacher') {
  //   document.getElementById('#content-teacher').style.visibility="visible";
  //
  // }else {
  //   document.getElementById('#content-teacher').style.visibility="hidden";
  // }

</script>

</body>
</html>
