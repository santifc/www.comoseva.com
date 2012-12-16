<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><head>
	
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pagina no encontrada! error 404</title>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-455535-7']);
 // _gaq.push(['_trackPageview']);
 // _gaq.push(['_trackEvent', 'Error', '404', 'page: ' + document.location.pathname + document.location.search + ' ref: ' + document.referrer]);
  _gaq.push(['_trackPageview', '/404page.php?page=' + document.location.pathname + document.location.search + '&from=' + document.referrer]);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</head>

<body onLoad="javascript:pageTracker._setVar('comosevaexcluirsanti');">

 <?php include($_SERVER['DOCUMENT_ROOT'].'/includes/toputil.php'); ?>
<h1>Esta página no existe en comoseva.com</h1>
<p>Puedes volver a la <a href="/">home</a>  , o usar el buscador:</p>
<!-- Empieza buscador -->
<script type="text/javascript" src="//www.google.com/jsapi"></script>
<script type="text/javascript">
  google.load('search', '1');
  google.setOnLoadCallback(function() {
    google.search.CustomSearchControl.attachAutoCompletion(
      '006670124764219011245:iqmmvf6gpri',
      document.getElementById('q'),
      'cse-search-box');
  });
</script>
<form action="http://www.google.com/cse" id="cse-search-box">
  <div align="center">
    <input type="hidden" name="cx" value="006670124764219011245:iqmmvf6gpri" />
    <input type="hidden" name="ie" value="UTF-8" />
    <input type="text" name="q" id="q" autocomplete="off" size="31" />
    <input type="submit" name="sa" value="Buscar direcciones" />
  </div>
</form>
<script type="text/javascript" src="//www.google.com/cse/brand?form=cse-search-box&lang=es"></script>

<!-- termina buacador -->

</body>
</html>
