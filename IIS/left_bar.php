<div class="col-md-2 left">

<?php
	require_once('connect_to_sql.php');
		$querry = "SELECT * FROM MANGA;";
		$response = mysqli_query($dbc, $querry);
		
		if($response){
			echo '<table>';
			while($row = mysqli_fetch_array($response)){
				echo '<tr>'.
							'<td align="left"><a href="manga.php?manga='. $row['ID_MANGA'].'">'. $row['TITLE'].'</a> </td>'.			
							//'<td align="left"><a href="add_favorite.php?manga='.$row['ID_MANGA'].'">Pridat do oblibenych</a></td>'.							
						'</tr>';
			}
			echo '</table>';
		}
		else{
			echo'Database error :(<br>';
			echo mysqli_error($dbc);
		}
?>

</div>