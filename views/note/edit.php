<div class="container">

	<h1 class="page-header">Notes Edit</h1>

	<form id="form-edit-note" action="<?php echo URL; ?>note/save/<?php echo $this->note[0]['note_id']; ?>" method="post">
		<div class="form-group">
			<label for="title">Title</label>
			<input type="text" name="title" class="form-control" id="title" placeholder="Title" value="<?php if (isset($this->note[0]['title'])) echo $this->note[0]['title']; ?>">
		</div>
		<div class="form-group">
			<label for="content">Content</label>
			<textarea type="text" rows="4" name="content" class="form-control" id="content" placeholder="Content"><?php if (isset($this->note[0]['content'])) echo $this->note[0]['content']; ?></textarea>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary">Save</button>
		</div>
	</form>

</div>
