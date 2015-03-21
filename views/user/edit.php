<div class="container">
	<h1 class="page-header">Users Edit</h1>

	<?php var_dump($this->user) ;?>

	<form id="form-add-user" action="<?php echo URL; ?>user/save/<?php echo $this->user['id']; ?>" method="post">
		<div class="form-group">
			<label for="login">Login</label>
			<input type="text" name="login" class="form-control" id="login" placeholder="Login" value="<?php echo isset($this->user['login']) ? $this->user['login'] : '' ?>">
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" name="password" class="form-control" id="password" placeholder="Password" value="">
		</div>
		<div class="form-group">
			<label for="role">Role</label>
			<select class="form-control" name="role">
				<option value="default" <?php if (isset($this->user['role']) && $this->user['role'] == 'default') echo 'selected' ?>>Default</option>
				<option value="admin" <?php if (isset($this->user['role']) && $this->user['role'] == 'admin') echo 'selected' ?>>Admin</option>
				<option value="owner" <?php if (isset($this->user['role']) && $this->user['role'] == 'owner') echo 'selected' ?>>Owner</option>
			</select>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary">Edit</button>
		</div>
	</form>

</div>
