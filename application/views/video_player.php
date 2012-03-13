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
<meta property="og:type" content="video">
<meta property="og:video:type" content="application/x-shockwave-flash">
<meta property="og:site_name" content="El Fary Es Dios">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width; height=device-height;">
	<title><?php echo $title ?></title>
</head>
<body marginwidth="0" marginheight="0">
	<embed width="100%" height="100%" name="plugin" src=<?php echo $url; ?> type="application/x-shockwave-flash">
</body>
</html>