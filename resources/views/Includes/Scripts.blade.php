<script type="text/javascript" src="assets/js/jquery-2.1.0.min.js"></script>
<script type="text/javascript" src="assets/js/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/smoothscroll.js"></script>
<script type="text/javascript" src="assets/js/retina-1.1.0.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.magnific-popup.min.js"></script>
<script type="text/javascript" src="assets/js/imagesloaded.pkgd.min.js"></script>
<script type="text/javascript" src="assets/js/masonry.pkgd.min.js"></script>
<script type="text/javascript" src="assets/js/scrollReveal.min.js"></script>
<script type="text/javascript" src="assets/js/custom.js"></script>
<!-- FlexSlider -->
<!--[if gt IE 8]> <script type="text/javascript" src="assets/js/ie.js"></script> <![endif]-->

<script src="assets/js/main.js"></script>
<script src="assets/semantic/semantic.min.js"></script>
<script src="assets/metro/js/jquery.js"></script>
<script src="assets/metro/js/metro.js"></script>
<!--[if gt IE 8]> <script type="text/javascript" src="assets/js/ie.js"></script> <![endif]-->
<script>
  $(window).load(function() {
    initializeOwl(false);
  });
</script>

<script>
(function() {
  var menuEl = document.getElementById('ml-menu'),
    mlmenu = new MLMenu(menuEl, {
      // breadcrumbsCtrl : true, // show breadcrumbs
      // initialBreadcrumb : 'all', // initial breadcrumb text
      backCtrl : false, // show back button
      // itemsDelayInterval : 60, // delay between each menu item sliding animation
      onItemClick: loadDummyData // callback: item that doesn´t have a submenu gets clicked - onItemClick([event], [inner HTML of the clicked item])
    });

  // mobile menu toggle
  var openMenuCtrl = document.querySelector('.action--open'),
    closeMenuCtrl = document.querySelector('.action--close');

  openMenuCtrl.addEventListener('click', openMenu);
  closeMenuCtrl.addEventListener('click', closeMenu);

  function openMenu() {
    classie.add(menuEl, 'menu--open');
  }

  function closeMenu() {
    classie.remove(menuEl, 'menu--open');
  }

  // simulate grid content loading
  var gridWrapper = document.querySelector('.content');

})();
</script>
