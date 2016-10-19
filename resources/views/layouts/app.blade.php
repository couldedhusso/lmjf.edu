<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>LMJF</title>

    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="assets/css/bootstrap-select.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="assets/css/jquery.slider.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="https://code.getmdl.io/1.2.1/material.indigo-pink.min.css">

    <link rel="stylesheet" href="assets/css/fileinput.min.css" type="text/css">

    <link rel="stylesheet" href="assets/css/style.css" type="text/css">

    <!-- creative-tim CSS     -->

    <!-- Animation library for notifications   -->
    <link href="{{asset('vendors/creatietim/css/animate.min.css')}}" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="{{asset('vendors/creatietim/css/light-bootstrap-dashboard.css')}}" rel="stylesheet"/>

    <!-- Semantic-ui core CSS     -->
    <link href="{{asset('assets/semantic/semantic.min.css')}}" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="//cdn.materialdesignicons.com/1.7.22/css/materialdesignicons.min.css" media="all" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <style media="screen">
    .ui.form, ui.button, .ui.buttons .button, .header  {
        font-size:inherit;
      }

      .ui.form, ui.button {
          width: 100%;
        }

        .floating-action-button {
          position: fixed;
          bottom: 40px;
          right: 40px;
         }

      /*ui.button, .ui.buttons .button, .ui.buttons .or {
          font-size: 16px;
      }*/
    </style>

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        @include('Includes.navbar')

        @yield('content')
        {{-- <div class="btn-group dropup floating-action-button">
    <button type="button" class="btn btn-info btn-fab btn-raised dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons">save</i></button>
    <ul class="dropdown-menu dropdown-menu-right" style="min-width:0; background-color:transparent;">
        <li><a href="#" class="btn btn-danger btn-fab btn-raised"><i class="material-icons">clear</i></a></li>
    </ul> --}}
    <div class="container">
      <div class="row">

        <div class="floating-action-button">
            <div class="ui vertical orange button " tabindex="0" style="font-size:inherit">
                <div class="hidden content">Shop</div>
                <div class="visible content">
                  <i class="search icon"></i>
                </div>
            </div>
        </div>


        {{-- <a href="" target="_blank" id="view-source" class="  mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--accent mdl-color-text--accent-contrast" data-upgraded=",MaterialButton,MaterialRipple">
          View Source
          <span class="mdl-button__ripple-container">
            <span class="mdl-ripple is-animating" style="width: 255.952px; height: 255.952px; transform: translate(-50%, -50%) translate(70px, 17px);">
            </span>
          </span>
        </a> --}}
      </div>
    </div>
</div>
        {{-- <a href="https://github.com/google/material-design-lite/blob/mdl-1.x/templates/text-only/" target="_blank" id="view-source" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--accent mdl-color-text--accent-contrast" data-upgraded=",MaterialButton,MaterialRipple">View Source<span class="mdl-button__ripple-container"><span class="mdl-ripple is-animating" style="width: 255.952px; height: 255.952px; transform: translate(-50%, -50%) translate(70px, 17px);"></span></span></a> --}}
    </div>

    <!-- Semantic-ui core js     -->
    <script src="{{asset('assets/semantic/semantic.min.js')}}"></script>
    <script type="text/javascript">
        $('select.dropdown').dropdown();
        $('.ui.checkbox').checkbox();
        $('.ui.radio.checkbox').checkbox();
        $('.ui.dropdown').dropdown();
    </script>

    <!-- Scripts -->
    {{-- <script src="/js/app.js"></script> --}}
        <script defer src="https://code.getmdl.io/1.2.1/material.min.js"></script>
</body>
</html>
