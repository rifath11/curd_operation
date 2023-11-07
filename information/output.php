<?php 
$pdo = new PDO("mysql:host=localhost;dbname=information", "root", "");

$stmt = $pdo->prepare("SELECT * FROM info");
$stmt->execute();
$info = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];

    $sql = "INSERT INTO `info`(
      `first_name`,
      `last_name`,
      `email`,
      `gender`
  )
    VALUES(?,?,?,?)";
  
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$first_name, $last_name, $email, $gender]); 
}
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Student Registration Form</title>
  
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="css/style.css">
      <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>


      <script>
          $(document).ready(function(){
	        // Activate tooltip
	        $('[data-toggle="tooltip"]').tooltip();
	
	        // Select/Deselect checkboxes
	        var checkbox = $('table tbody input[type="checkbox"]');
	        $("#selectAll").click(function(){
		      if(this.checked){
			    checkbox.each(function(){
				  this.checked = true;                        
			    });

		      } else{
			    checkbox.each(function(){
			    this.checked = false;                        
			    });
		      } 
	        });
	        checkbox.click(function(){
		      if(!this.checked){
			    $("#selectAll").prop("checked", false);
		      }
	        });
          });
      </script>

</head>

<body>
  <h1>
      Crud Operation Form
  </h1>
<!----

<p>
  (An example table + detail view scenario)
</p>
---->
<main>
  <table>
    <thead>
      <tr>
        <th>first_name</th>
        <th>last_name</th>
        <th>email</th>
        <th>gender</th>
        <th>Action</th>
      </tr>
      <?php
			include 'dbconn.php';
			$query = 'SELECT * FROM info';
			$mysqliquery = mysqli_query($conn, $query);
			while ($result = mysqli_fetch_assoc($mysqliquery)) { 
				?>
				<tr>
					<td>
						<?php echo $result['first_name']; ?>
					</td>
					<td>
						<?php echo $result['last_name']; ?>
					</td>
					<td>
						<?php echo $result['email']; ?>
					</td>
					<td>
						<?php echo $result['gender']; ?>
					</td>
					<td>
						<a href="update.php?id=<?php echo $result['id']; ?>" class="edit"><i class="material-icons" data-toggle="tooltip" title="Update">&#xE254;</i></a>
						<a href="delete.php?ids=<?php echo $result['id']; ?>" class="delete"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
					</td>
				</tr>
				<?php
			  }
			  ?>



			
		
					

    </thead>
    <tfoot>
      <tr>
        <th colspan='3'>
          Year: 2014
        </th>
      </tr>
    </tfoot>
    <tbody> 
</table>
</main>



<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script src="js/index.js"></script>

</body>
</html>