<?php session_start();include 'incl/db.php'; ?>
<?php if ($_SESSION['logged_in_to_addpage']): ?>
	<?php 
		if (isset($_POST['title']) && !empty($_POST['title']) && isset($_POST['content']) && !empty($_POST['content']) && isset($_POST['author']) && !empty($_POST['author'])) {
			if ($_COOKIE['skey']==$_POST['skey']) {
				DB::insert('news', array(
					'title' => addslashes($_POST['title']),
					'content' => addslashes($_POST['content']),
					'author' => addslashes($_POST['author'])
				));
				echo "Story Added. Going Home";
				header("refresh:3;url=index.php");
			} else {
				echo "Failed Secret Key. Going Home";
				header("refresh:3;url=index.php");
			}
		} else {
			echo "Fill In Everything. Going Back";
			header("refresh:3;url=addpage.php");
		}
	?>
<?php else: ?>
<?php header('location: signin.php') ?>
<?php endif ?>
