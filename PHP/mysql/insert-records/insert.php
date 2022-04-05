<html>

<head>
	<style>
		div {
			background-color: #d7faae;
			color: #236aca;
			width: 1000px;
			border: 25px solid white;
			padding: 25px;
			text-align: center;
			font-size: 25;
		}
	</style>
</head>

<body style="background-color: f9b7f1; color: 236aca;">
	<br><br><br>
	<center>
		<div>
			<?php
			$file1 = "student.csv";
			$servername = '127.0.0.1';
			$username = 'root';
			$password = '';
			$dbname = 'msc';

			$name = $_POST["name"];
			$email = $_POST["email"];
			$mobile = $_POST["mobile"];

			$connection = mysqli_connect($servername, $username, $password, $dbname);
			if ($connection) echo "Localhost/$dbname successfully connected" . "<br>";
			else echo "***Server?$dbname cannot be connected. Please check your system.***" . "<br><br>";

			$tablename = 'student';
			$sql1 = "INSERT INTO $tablename VALUES ('$name','$email','$mobile')";
			$result1 = mysqli_query($connection, $sql1);
			if ($result1) {
				echo $name . ' , ' . $mobile . ' , ' . $email . " added in " . $tablename . " successfully" . "<br>";
				$sql2 = "SELECT * FROM $tablename";
				$result2 = mysqli_query($connection, $sql2);
				$nrec = 0;
				$fp1 = fopen($file1, 'a');
				fwrite($fp1, "NAME");
				fwrite($fp1, ",");
				fwrite($fp1, "MOBILE NO");
				fwrite($fp1, ",");
				fwrite($fp1, "EMAIL");
				fwrite($fp1, chr(13));
				fwrite($fp1, chr(10));
				fclose($fp1);
				echo "<center><table cellpadding=3 width=100% border=1>";
				echo "<tr>" . "<th colspan=4 align=center font-size=60px>" . "Table-1: Content of $tablename" . "</th>" . "</tr>";
				echo "<tr>" . "<td>Rec</td>" . "<td>Name</td>" . "<td>Mobile</td>" . "<td>Email</td></tr>";
				while ($row = mysqli_fetch_assoc($result2)) {
					$nrec++;
					$name = $row["name"];
					$email = $row["email"];
					$mobile = $row["mobile"];
					$fp1 = fopen($file1, 'a');
					echo "<br>";
					fwrite($fp1, $name);
					fwrite($fp1, ',');
					fwrite($fp1, $mobile);
					fwrite($fp1, ',');
					fwrite($fp1, $email);
					fwrite($fp1, chr(13));
					fwrite($fp1, chr(10));
					fclose($fp1);
					echo "<tr>" . "<td>" . $nrec . "</td>" . "<td>" . $name . "</td>" . "<td>" . $mobile . "</td>" . "<td>" . $email . "</td>" . "</tr>";
				}
				echo "</table>" . "</center>";
				echo "<br><br>Total number of records available in $tablename=" . $nrec . "<br><br>";
				echo "<a href=dbms.html>" . "BACK" . "</a>";
			} else {
				echo "***Record cannot be added in $tablename. Please check your system***" . "<br>";
			}
			?>
		</div>
	</center>
</body>

</html>