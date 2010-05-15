<?php 

  header("Content-type: text/html; charset=utf-8");

?>
<!doctype html public "-//W3C//DTD HTML 4.01//EN">
<html lang="cs"><head>

<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="static/playground.css" type="text/css">
<title><?=L('playground_page_title')?></title>
<script src="static/playground.js" type="text/javascript"></script> 
<?php if($lib_version != ""): ?>
<script src="<?php echo get_lib_url($lib_version); ?>" type="text/javascript"></script>
<?php endif; ?>

<!-- code -->
<script type="text/javascript">
<?php echo $js_code . "\n" ?>
</script>

</head><body>
<?php if($js_code == "" && $html_code == "") echo "<div style='text-align: center;'>" . L('playground_nothing') . "</div>" ?>

<?php echo $html_code . "\n" ?>

</body></html>