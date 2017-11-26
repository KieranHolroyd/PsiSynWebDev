<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="getreload/resources/css/reload.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<title>Github Repos Directory</title>
</head>
<body>
	<div class="r-container-l row">
		<ul class="r-vnl">
		<?php 
		$dirlist = scandir ("./");
		$ignored = ['.', '..', 'index.php'];
		foreach ($dirlist as $dl) {
			if (!in_array($dl, $ignored)) {
				if (is_dir($dl) || strpos($dl, ".rar") || strpos($dl, ".zip")) {
					if ($dl=="..") {
						$dl="&lt;&lt;Previous";
						$dllink="../";
					} else {
						$dllink=$dl;
					}
					echo "<a class=\"r-link-nounderline\" href=\"$dllink\"><li class=\"r-vnl-item\"><span class=\"fa fa-folder\"></span> $dl</li></a>";
				} else {
					echo "<a class=\"r-link-nounderline\" href=\"$dl\"><li class=\"r-vnl-item\"><span class=\"fa fa-file-code-o\"></span> $dl</li></a>";
				}
			}
		}
		?>
		</ul>
	</div>
</body>
</html>
