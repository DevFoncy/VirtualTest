
<?php include 'inc/header.php'; 


 ?>
<div style="background: #fff none repeat scroll 0 0;
  border: 3px solid #999;
  margin-top: 5px;
  min-height: 400px;
  padding: 15px;
  margin-left: 12px;
  width: 1010px;">

	<div class="container">
	<section id="content">
		<form action="exam.php" method="POST">
			<h1>Login Form</h1>
			<div>
				<input type="text" placeholder="Username" required="" id="username" />
			</div>
			<div>
				<input type="password" placeholder="Password" required="" id="password" />
			</div>
			<div>
				<input type="submit" value="Log in" />
				<a href="#">Lost your password?</a>
				<a href="#">Register</a>
			</div>
		</form><!-- form -->
		
	</section><!-- content -->
</div><!-- container -->
</div>
<?php include 'inc/footer.php'; ?>
