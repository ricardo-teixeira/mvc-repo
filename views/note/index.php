<div class="container">
	<h1 class="page-header">Note</h1>

	<form id="form-add-note" class="alert bg-info" action="<?php echo URL; ?>note/create" method="post">
		<div class="form-group">
			<label for="title">Title</label>
			<input type="text" name="title" class="form-control" id="title" placeholder="Title">
		</div>
		<div class="form-group">
			<label for="content">Content</label>
			<textarea type="text" rows="4" name="content" class="form-control" id="content" placeholder="Content"></textarea>
		</div>
		<div class="form-group">
			<label>&nbsp;</label>
			<button type="submit" class="btn btn-success">Add</button>
		</div>
	</form>

	<?php if (count($this->noteList) == 0) :?>
		<div class="alert alert-warning text-center">
			Nenhuma nota disponível.
		</div>
	<?php else: ?>

		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Title</th>
						<th>Content</th>
						<th>Data Added</th>
						<th>Modified in</th>
						<th class="text-right">Actions</th>
					</tr>
				</thead>
				<tbody>

					<?php foreach ($this->noteList as $key => $note) : ?>
						<tr>
							<th scope="row"><?php echo $note['note_id']; ?></th>
							<td><?php echo $note['title']; ?></td>
							<td><?php echo $note['content']; ?></td>
							<td><?php echo $note['date_added']; ?></td>
							<td><?php echo $note['last_edited']; ?></td>
							<td class="text-right">
								<a class="btn btn-danger delete" href="<?php echo URL; ?>note/delete/<?php echo $note['note_id']; ?>" title="Delete"><i class="fa fa-trash-o"></i></a>
								<a class="btn btn-default" href="<?php echo URL; ?>note/edit/<?php echo $note['note_id']; ?>" title="Edit"><i class="fa fa-pencil-square-o"></i></a>
							</td>
						</tr>
					<?php endforeach; ?>

				</tbody>
			</table>
		</div>

	<?php endif; ?>

</div>

<script>
	$(function(){
		$('.delete').click(function(e){
			var c = confirm("Are you sure you want to delete?");
			if(c == false) return false;
		});
	});
</script>
