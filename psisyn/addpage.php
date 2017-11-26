<?php session_start(); 
	$skey=bin2hex(openssl_random_pseudo_bytes(64));
	setcookie('skey', $skey, time()+3600);
?>
<?php if ($_SESSION['logged_in_to_addpage']): ?>
	<script src="https://cdn.ckeditor.com/ckeditor5/1.0.0-alpha.2/classic/ckeditor.js"></script>
	<form action="add_news.php" method="post" style="width: 600px;margin:auto;padding:10px;">
		<input type="text" name="title" placeholder="Title">
		<textarea name="content" id="editor"></textarea>
		<input type="hidden" name="author" value="<?php echo $_SESSION['username'];?>">
		<input type="hidden" name="skey" value="<?php echo $skey; ?>">
		<button type="submit">Post</button>
	</form>
	<script>
		ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
	</script>
<?php else: ?>
	<?php header('location: signin.php') ?>
<?php endif ?>