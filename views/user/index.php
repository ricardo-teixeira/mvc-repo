<div class="container">
	<h1 class="page-header">Users</h1>

	<form id="form-add-user" class="form-inline alert bg-primary" action="<?php echo URL; ?>user/create" method="post">
		<div class="form-group">
			<label for="login">Login</label>
			<input type="text" name="login" class="form-control" id="login" placeholder="Login">
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" name="password" class="form-control" id="password" placeholder="Password">
		</div>
		<div class="form-group">
			<label for="role">Role</label>
			<select class="form-control" name="role">
				<option value="default">Default</option>
				<option value="admin">Admin</option>
			</select>
		</div>
		<div class="form-group">
			<label>&nbsp;</label>
			<button type="submit" class="btn btn-success">Add</button>
		</div>
	</form>

	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Login</th>
					<th>Role</th>
					<th class="text-right">Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($this->userList as $key => $user) : ?>
					<tr>
						<th scope="row"><?php echo $user['user_id']; ?></th>
						<td><?php echo $user['login']; ?></td>
						<td><?php echo $user['role']; ?></td>
						<td class="text-right">
							<a class="btn btn-danger <?php echo ($user['role'] == 'owner') ? 'disabled' : ''; ?>" href="<?php echo URL; ?>user/delete/<?php echo $user['user_id']; ?>" title="Delete"><i class="fa fa-trash-o"></i></a>
							<a class="btn btn-default" href="<?php echo URL; ?>user/edit/<?php echo $user['user_id']; ?>" title="Edit"><i class="fa fa-pencil-square-o"></i></a>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>


</div>
