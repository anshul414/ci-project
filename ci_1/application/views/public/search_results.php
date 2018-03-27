<?php include('public_header.php'); ?>
<div class="container">
	<h1>Search Result</h1>
	<table class="table">
		<thead>
			<tr>
				<td>Sr. No.</td>
				<td>Article Title</td>
				<td>Published On</td>
			</tr>
		</thead>
		<tbody>
			<tr>
			<?php if(count($articles) ): 	
			$count = $this->uri->segment(4, 0);
			foreach($articles as $article): ?>
				<td><?php echo ++$count; ?></td>
				<td><?php echo $article->title; ?></td>
				<td><?php echo "Date"; ?></td>
			</tr>	
			<?php endforeach; ?>
			<?php else: ?>	
			<tr>
				<td colspan="3">
					No Records Found.
				</td>
			</tr>	
			<?php endif; ?>	
		</tbody>	
	</table>
	<?php echo $this->pagination->create_links(); ?>
</div>	
<?php include('public_footer.php'); ?>