
<!doctype html>
<html>
<head>
	<title>SMALLBLOG</title>
	<link rel="stylesheet" type="text/css" href="../global/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../global/css/blog.css">
</head>
<body>
	<div class="page">

 
  <!-- TOP MENU IS INCLUDED HERE -->	
	
		<div class="menu-top">
			<div class="container">
				<?php  include '../global/includes/menu.php' ?>
			</div>
		</div>
 
  <!-- HEADING IS INCLUDED HERE -->
		
		<div class="head">
			<div class="jumbotron">
				<div class="container">
					<div class="title_block">
						<h1> <center> BLOGGER </center> </h1>
					</div>
				</div>
			</div>			
		</div>


<!-- FETCHING POINT STARTS -->

	<div class="post_results">
		<div class="container">	
							<?php
								include '../global/includes/sql_connect.php';

								// Convertion of Name to Id

								if(isset($_GET['id']))
									{

								
													
								// Fetching actual Data
												

												$catagory_id_query = 'select * from posts where catagory_id='.$_GET['id'];
									
								//				echo $catagory_id_query;

												$result = mysql_query($catagory_id_query,$connetion_open);

												$number_of_posts = mysql_num_rows($result);

												if($number_of_posts==0){
													echo "NOT ANY POST RELATED TO THIS CATAEGORY IN LIST";
												//	die();
												}
												

												while( $row =mysql_fetch_assoc($result) ){
														
																echo '<div  class="content">';
																echo '<a href=single.php?id='.$row['id'].'>';
																
															//	echo $row['catagory_id'].' '.$row['id'].' 
																echo '<img src="http://localhost/blog/admin/imgs/'.$row['name'].'.jpg"/>';
																echo '<input type="hidden" name="id" value="'.$row['id'] .'"/>';
																echo $row['name'].'</br>';
																echo $row['create_at'].'</br>';
																echo '</a>';
																echo '</div>';
												}
									}

									else
									{
										echo "<div class=content>";
										print "!SORRY, NO DATA FOUND";
										print '</br>';
										print "SEEMS TO BE WRONG SERCH DETAILS";
										echo "</div>";
									}
							
						?>

		</div>
	</div>
</div>

<div class="footer">
		
		MANISH H. CHAMPANERI

</div>
</body>

<script src="http://localhost/blog/admin/js/jQuery-2.1.4.min.js"></script>

<script type="text/javascript">
{

//		alert("I am ready");
		$(document).ready( function()  {


				$('#<?php echo $_GET['id'] ?>').addClass('active');

		});
}

</script>
</html>