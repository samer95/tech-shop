</div>
<? require 'src/Layout/Footer.php'; ?>

<script src="themes/js/common.js"></script>
<script src="themes/js/jquery.flexslider-min.js"></script>
<script type="text/javascript">
  $(function () {
    $(document).ready(function () {
      $('.flexslider').flexslider({
        animation: "fade",
        slideshowSpeed: 4000,
        animationSpeed: 600,
        controlNav: false,
        directionNav: true,
		// the container that holds the flexslider
        controlsContainer: ".flex-container"
      });
    });
  });
</script>
</body>
</html>