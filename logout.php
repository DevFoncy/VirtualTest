<?php include 'inc/header.php';?> 
	<div style="background: #fff none repeat scroll 0 0;
	  border: 3px solid #999;
	  margin-top: 5px;
	  min-height: 200px;
	  padding: 15px;
	  margin-left: 12px;
	  width: 1000px;">

	  <div class="alert alert-info" align="center">
		  <strong>Gracias, vuelve pronto!</strong>Seras dirigido a la pagina principal en 3 segundos
	  </div>
	  <?php  
 	  	header("Refresh:2; url=index.php");
 	 
	  ?>
	 

	</div>
<?php include 'inc/footer.php'; ?>