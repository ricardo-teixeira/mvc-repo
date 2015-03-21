<div class="container">

	<h1 class="page-header">Dashboard</h1>

	<form id="randomInsert" action="<?php echo URL; ?>dashboard/xhrInsert" method="post">
		
		<div class="input-group">
			<input type="text" name="text" class="form-control input-lg" placeholder="Add text...">
			<span class="input-group-btn">
				<button class="btn btn-success input-lg" type="submit">Add!</button>
			</span>
		</div><!-- /input-group -->

	</form>


	<!-- List group -->
	<ul id="listInserts" class="list-group">

	</ul>


</div>