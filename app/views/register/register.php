<?php $this->setSiteTitle('TTRPG DB'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>
<div class="container col-md-6 col-md-offset-3 card">
<form class="form" action="" method="post">
        <div class="bg-danger"><?php echo $this->displayErrors; ?></div>
        <h3 class="text-center">Register</h3>
        <div class="form-group">
            <label for="fname">First name</label>
            <input type="text" name="fname" id="fname" class="form-control" value="<?php echo $this->post['fname']; ?>">
        </div>
        <div class="form-group">
            <label for="lname">Last name</label>
            <input type="text" name="lname" id="lname" class="form-control" value="<?php echo $this->post['lname']; ?>">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control" value="<?php echo $this->post['email']; ?>">
        </div>
        <div class="form-group">
            <label for="username">Choose a username</label>
            <input type="text" name="username" id="username" class="form-control" value="<?php echo $this->post['username']; ?>">
        </div>
        <div class="form-group">
            <label for="password">Choose a password</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="form-group">
            <label for="password">Confirm your password</label>
            <input type="password" name="confirm" id="confirm" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" value="Register" class="btn btn-large btn-primary">
        </div>
    </form>
</div>
<?php $this->end(); ?>
