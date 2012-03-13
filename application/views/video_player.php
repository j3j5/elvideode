<!-- <!DOCTYPE html> -->
<html style="">
<head>
<?php
$this->load->helper('html_helper');
echo link_tag('favicon.png', 'icon', 'image/png');
?>
<!-- 	<link rel="icon" href="/favicon.png" type="image/png"> -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width; height=device-height;">
	<title><?php echo $title ?></title>
</head>
<body marginwidth="0" marginheight="0">
	<embed width="100%" height="100%" name="plugin" src=<?php echo $url; ?> type="application/x-shockwave-flash">
</body>
</html>