<!DOCTYPE html>

<html lang="en-US">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="ThemeStarz">

    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,700' rel='stylesheet' type='text/css'>
    <link href="assets/fonts/font-awesome.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="assets/css/bootstrap-select.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="assets/css/jquery.slider.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
    <link type="text/css" href="assets/metro/css/metro.css" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <link type="text/css" href="assets/css/masterstyle.css" rel="stylesheet">

      {{-- <title>Mena | Bookmarked Properties</title> --}}

    <title>LMJFB | HOME </title>

</head>

<body class="page-sub-page page-my-properties page-account" id="page-top">
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
                                  Ma classe
                                </div>

                                <div class="panel-body">
                                <div class="spark-settings-tabs">
                                   <ul class="nav spark-settings-stacked-tabs" role="tablist">
                                        <li role="presentation">
                                            <a href="{{url('/actualites-site')}}">
                                                  Blog
                                             </a>
                                        </li>

                                        <li role="presentation">
                                            <a href="{{url('/ajouter-un-article')}}">
                                                Ajouter une actua.
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                              </div>
                        </div>

                        <div class="panel panel-default panel-flush">
                              <div class="panel-heading">
                                  Mes élèves
                                </div>

                                <div class="panel-body">
                                <div class="spark-settings-tabs">
                                   <ul class="nav spark-settings-stacked-tabs" role="tablist">
                                        <li role="presentation">
                                            <a href="{{url('/ajouter-un-compte-utilisateur')}}">
                                                  Notes d'evaluations
                                             </a>
                                        </li>

                                        {{-- <li role="presentation">
                                            <a href="/docs/2.0/releases">
                                                Supprimer un compte
                                            </a>
                                        </li> --}}

                                        <li role="presentation">
                                            <a href="{{url('/ajouter-un-eleve')}}">
                                                Absences
                                            </a>
                                        </li>

                                        <li role="presentation">
                                            <a href="{{url('/ajouter-une-classe')}}">
                                                Retards
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
                    {{-- <div class="mail-box-header">
                      @yield('section-title')
                    </div> --}}
                    <div class="panel panel-default panel-flush">
                        @yield('section-content')
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
<script type="text/javascript" src="assets/js/custom.js"></script>
<!--[if gt IE 8]>
<script type="text/javascript" src="assets/js/ie.js"></script>
<![endif]-->

</body>
</html>
