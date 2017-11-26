<!DOCTYPE html>
<?php include 'incl/db.php'; ?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PsiSyn Network | Home</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
	<link rel="stylesheet" href="styles.css">
	<link rel="stylesheet" href="grid/simple-grid.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.5.1/js/iziModal.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.5.1/css/iziModal.min.css">
</head>
<body>
	<div class="first">
		<h1>PSISYN NETWORK</h1>
	</div>
	<div class="second">
		<h1>About Us</h1>
		<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. In pretium et tortor et fermentum. Quisque nec hendrerit lacus. Nam quis dui nibh. Morbi molestie nunc id imperdiet vestibulum. Donec elementum velit eu felis consequat volutpat. Suspendisse vestibulum neque id vehicula tempor. Nunc turpis urna, accumsan a tincidunt sed, pellentesque id felis. Aenean tristique orci ut dui lacinia, ut dapibus elit sagittis. Suspendisse non ante quis nisi volutpat volutpat. Etiam rhoncus laoreet magna eleifend sagittis. Maecenas vitae urna iaculis, commodo neque a, posuere velit. Nunc a efficitur mauris, id cursus diam. Pellentesque posuere porttitor ipsum nec varius. Nulla porta metus leo, ut porta lorem lobortis ut. Vivamus eros sem, condimentum vel quam sit amet, sollicitudin tincidunt urna. Aliquam non semper ipsum.

		Curabitur at nisi purus. Sed fringilla, orci dapibus viverra congue, felis quam dignissim massa, a elementum neque dolor et nunc. Nullam fringilla erat luctus luctus luctus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nulla eu eros pulvinar, molestie nisi ut, ultrices mi. Maecenas sit amet nunc vitae nisl vulputate tempus. Suspendisse eget nibh diam. Nulla varius est nec felis congue, quis ullamcorper metus interdum. Cras tristique quis diam ut pharetra. Nullam dignissim bibendum mauris eu auctor. Donec neque mauris, rutrum luctus rhoncus at, sagittis vehicula mauris. Curabitur vel nulla iaculis tortor congue tempus at in neque. Fusce eu imperdiet tellus. Integer non velit at ex eleifend aliquam. Aenean aliquet luctus mauris vitae consectetur. Cras ac leo fermentum, luctus mauris vel, malesuada felis. </p>
	</div>
	<div class="third">
		<?php 
			$r=DB::query("SELECT * FROM news ORDER BY id DESC LIMIT 3");
			$r_tree=array();
			foreach($r as $r){$r_tree[$r['id']][]=$r;}
			foreach($r_tree as $r_group => $r_list){
			foreach ($r_list as $r) { ?>
			<span style="float: right;"><?php echo $r['author']." | ".$r['uploaded'] ?></span><h1><?php echo $r['title']; ?></h1>
			<div><?php $content=$r['content']; if(strlen($content) > 250) $content = substr($content, 0, 250).'... <a href="#story" onclick="viewFullStory('.$r['id'].');">Full Story</a>'; echo $content; ?></div>
		<?php }}?>
	</div>
	<div id="modal">
    <!-- Page content -->
	</div>
</body>
<script>
	function viewFullStory(id) {
		$('#modal').iziModal('open');
		$.post('getFull.php',{'id':id}, function(data) {
			story = JSON.parse(data);
      $("#modal .iziModal-content").html(story.content);
      $('#modal').iziModal('setTitle', story.title);
      $('#modal').iziModal('setSubtitle', story.authorndate);
    });
	}
	$("#modal").iziModal();
</script>
</html>
