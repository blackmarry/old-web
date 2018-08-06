<?php
	if(isset($_GET['admin']) and $_GET['admin'] == "users" ){
		$querry = "SELECT * FROM T_USER;";
		$response = mysqli_query($dbc, $querry);
		if($response){?>
		<table align="left" cellspacing="4" cellpadding="6">
		<tr>
			<td align="left">Id</td>
			<td align="left">Nick</td>
			<td align="left">SU</td>
			<td align="left">Active</td>
		</tr>
		<?php	
			while($row = mysqli_fetch_array($response)){
		?>
				<tr>
					<td align="left"><?php echo $row['ID_USER'];?></td>
					<td align="left"><?php echo $row['NICKNAME'];?></td>
					<td align="left"><?php echo $row['SPRAVCE'];?></td>
					<td align="left"><?php echo $row['ACTIVATED'];?></td>
					<td align="left"><a href="admin_execute.php?deactivate=<?php echo $row['ID_USER'];?>">Deactivate</a></td>
					<td align="left"><a href="admin_execute.php?activate=<?php echo $row['ID_USER'];?>">Activate</a></td>
					<td align="left"><a href="admin_execute.php?make_su=<?php echo $row['ID_USER'];?>">Make SU</a></td>
					<td align="left"><a href="admin_execute.php?disable_su=<?php echo $row['ID_USER'];?>">Disable SU</a></td>
					<td align="left"><a href="admin_execute.php?delete=<?php echo $row['ID_USER'];?>">Delete</a></td>
				</tr>
		
		<?php
			}
		?>
		</table>	

			
<?php
		}
		
	}elseif(isset($_GET['admin']) and $_GET['admin'] == "manga"){		
?>
		<form action="admin_execute.php" method="post">
			<p>Add manga: </p>
			<p>Title: 		<input type="text" 	name="title" size="20" value="" />*</p>
			<p>Picture: 	<input type="text" 	name="picture" size="20" value="" /></p>
			<p>Status: 
				<select name="status">
					<option value="open">open</option>
					<option value="close">finished</option>
				</select>
			</p>
			<p>Frequency: 	
				<select name="frequency">
					<option value="day">Daily</option>
					<option value="week">Weekly</option>
					<option value="month">Monthly</option>
					<option value="year">Yearly</option>
				</select>
			</p>
			<p>Date of release:<input type="date" name="date"></p>
			<p><input type="submit" name="manga" value="add"/></p>
		</form>
<?php
	}elseif(isset($_GET['admin']) and $_GET['admin'] == "volume"){
		?>
		<form action="admin_execute.php" method="post">
			<p>Add volume: </p>
			<p>Title: 		<input type="text" 	name="title" size="20" value="" /></p>
			<p>Chapter: 	
				<select name="Chapter">
					<?php 
					require_once('connect_to_sql.php');
					$querry = "SELECT MANGA.TITLE as NAME, CHAPTER.TITLE as NAME2, CHAPTER.ID_CHAPTER as ID FROM CHAPTER join MANGA on ID_MANGA = MANGA_ID";
					$response = mysqli_query($dbc, $querry);
					while($row = mysqli_fetch_array($response)){
						echo '<option value="'.$row['ID'].'">'.$row['NAME']." ".$row['NAME2']."</option>";
					}
					?>
				</select>
			</p>
			<p><input type="submit" name="volume" value="Add"/></p>
		</form>
<?php
	}elseif(isset($_GET['admin']) and $_GET['admin'] == "chapter"){
		?>
		<form action="admin_execute.php" method="post">
			<p>Title: 				<input type="text" 	name="title" size="20" value="" /></p>
			<p>Serial number: 	<input type="text" 	name="serial" size="20" value="" /></p>
			<p>Manga:
					<select name="Manga">
						<?php 
						require_once('connect_to_sql.php');
						$querry = "SELECT *  FROM MANGA";
						$response = mysqli_query($dbc, $querry);
						while($row = mysqli_fetch_array($response)){
							echo '<option value="'.$row['ID_MANGA'].'">'.$row['TITLE']."</option>";
						}
						?>
					</select>
				</p>
				<p><input type="submit" name="chapter" value="Add"/></p>
			</form>
		<?php
	}elseif(isset($_GET['admin']) and $_GET['admin'] == "magazine"){
?>
		<form action="admin_execute.php" method="post">
			<p>Add magazine: </p>
			<p>Title: 		<input type="text" 	name="title" size="20" value="" /></p>
			<p>Chapter: 	
				<select name="Chapter">
					<option value="NULL">none</option>
					<?php 
					require_once('connect_to_sql.php');
					$querry = "SELECT MANGA.TITLE as NAME, CHAPTER.TITLE as NAME2, ID_CHAPTER as ID FROM CHAPTER join MANGA on ID_MANGA = MANGA_ID";
					$response = mysqli_query($dbc, $querry);
					while($row = mysqli_fetch_array($response)){
						echo '<option value="'.$row['ID'].'">'.$row['NAME']." ".$row['NAME2']."</option>";
					}
					?>
				</select>
			</p>
			<p><input type="submit" name="volume" value="add"/></p>
		</form>
<?php
	}
	else{?>
		<h4>Administrator options:</h4>
		<p><a href='ucet.php?admin=users'>Manage users</a></p>
		<p><a href='ucet.php?admin=manga'>Add manga</a></p>
		<p><a href='ucet.php?admin=chapter'>Add chapter</a></p>
		<p><a href='ucet.php?admin=volume'>Add volume</a></p>
		<p><a href='ucet.php?admin=magazine'>Add magazine</a></p>
		<?php
	}
	if(isset($_GET['bad_title'])){
		echo "You have to have a title";
	}
	if(isset($_GET['bad_picture'])){
		echo "Bad picture name";
	}
	if(isset($_GET['dupe_title'])){
		echo "Duplicate title, sorry";
	}
	if(isset($_GET['BAD'])){
		echo "Something went horribly wrong, not sure what though :/ ";
	}
	if(isset($_GET['bad_serial'])){
		echo "Bad serial number";
	}
?>