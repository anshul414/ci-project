<?php include_once('public_header.php'); ?>

<div class='container'>
<h1>
	<?php echo $article->title; ?>
</h1>
<hr>
<p>
	<?php echo $article->body; ?>
</p>	
<?php if(!is_null($article->image_path)): ?>
	<img src="<?php echo $article->image_path; ?>" alt="">
<?php endif; ?>
</div>

<?php include_once('public_footer.php'); ?>