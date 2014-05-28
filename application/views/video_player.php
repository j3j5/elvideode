<!-- <!DOCTYPE html> -->
<html style="">
<head>
<?php
$this->load->helper('html_helper');
echo link_tag('favicon.png', 'icon', 'image/png');
echo '<meta name="title" content="' . $title . '">';
echo '<meta name="description" content="' . $description . '">';

echo '<meta property="og:title" content="' . $title . '">';
echo '<meta property="og:image" content="https://i4.ytimg.com/vi/' . $video_id . '/hqdefault.jpg">';
echo '<meta property="og:description" content="' . $description . '">'
?>

<!-- Piwik -->
<script type="text/javascript">
  var _paq = _paq || [];
  _paq.push(['trackSiteSearch',
			// Search keyword searched for
			"<?php echo $query; ?>",
			// Search category selected in your search engine. If you do not need this, set to false
			false,
			// Number of results on the Search results page. Zero indicates a 'No Result Search Keyword'. Set to false if you don't know
			1
  ]);
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u=(("https:" == document.location.protocol) ? "https" : "http") + "://dezwartepoet.nl/piwik/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', 4]);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0]; g.type='text/javascript';
    g.defer=true; g.async=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<noscript><p><img src="http://dezwartepoet.nl/piwik/piwik.php?idsite=4" style="border:0;" alt="" /></p></noscript>
<!-- End Piwik Code -->


<meta property="og:type" content="video">
<meta property="og:video:type" content="application/x-shockwave-flash">
<meta property="og:site_name" content="El Vídeo de">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width; height=device-height;">
<title><?php echo $title ?></title>
</head>
<body marginwidth="0" marginheight="0">
	<embed width="100%" height="100%" name="plugin" src=<?php echo $url; ?> type="application/x-shockwave-flash">
</body>
</html>
