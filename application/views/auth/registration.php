	<div class="form-container">
	    <h1 class="judul">Create an account!</h1>
	    <?= $this->session->flashdata('message'); ?>
	    <form class="form" method="post" action="<?= base_url('auth/registration'); ?>">
	        <input type="text" class="input-text" id="username" name="username" placeholder="Username" value="<?= set_value('username'); ?>" autofocus>
	        <?= form_error('username', '<small id="helpId" class="text-danger form-text pl-3">', '</small>'); ?>

	        <?php if ($emailvalue) : ?>
	            <input type="text" class="input-text" id="email" name="email" placeholder="Email Address" value="<?= $emailvalue; ?>">

	        <?php else : ?>
	            <input type="text" class="input-text" id="email" name="email" placeholder="Email Address" value="<?= set_value('email'); ?>">

	        <?php endif; ?>
	        <?= form_error('email', '<small id="helpId" class="text-danger form-text pl-3">', '</small>'); ?>
	        <div class="flex">
	            <input type="password" class="input-text half" id="password1" name="password1" placeholder="Password">
	            <input type="password" class="input-text half" id="password2" name="password2" placeholder="Repeat Password">
	        </div>
	        <?= form_error('password1', '<small id="helpId" class="text-danger form-text pl-3">', '</small>'); ?>

	        <div class="flex">
	            <a href="<?= base_url('auth/'); ?>" class="input-tombol tombol-back half">
	                Back
	            </a>
	            <button type="submit" class="input-tombol tombol-login half">
	                Register Account
	            </button>
	        </div>
	    </form>
	    <hr>
	    <div class="form-text">
	        <a class="small" href="<?= base_url('auth/forgotpassword'); ?>">Forgot Password?</a>
	        <a class="small" href="<?= base_url('auth/'); ?>">Already have an account?</a>
	    </div>
	</div>