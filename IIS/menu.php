<div class="row">
	<div class="col-md-2">
        <a href="index.php">
            <img class="img-fluid" src="images/logo.png" alt="logo"/>
        </a>
    </div>
    <div class="col-md-10">

        <h1 class="title display-1">Manga Shop</h1>
        
        <nav class="navbar navbar-expand-md rounded mb-3">
        	<div class="collapse navbar-collapse">
				<ul>
				<li><a href="index.php">Home</a></li>

				<li class="drop"><a class="opened" href="manga.php">Manga</a>
					<div class="drop_zoznam">
	                    <a href="manga.php?characters">Characters</a>
	                    <a href="manga.php?genres">Genres </a>
	                    <a href="manga.php?authors">Authors</a>
	                </div>
				</li>

				<li><a href="contact.php">Contact</a></li>

				<li class="drop"><a class="opened" href="ucet.php">User</a>
					<div class="drop_zoznam">
	                    <a href="ucet.php?oblibene">Favourite</a>
	                    <a href="ucet.php?nastaveni">Options</a>
						<?php
						if(isset($_SESSION['username'])){
							require_once('connect_to_sql.php');
							$usr = $_SESSION['username'];
							$querry = 'select * from T_USER where NICKNAME ="'.$usr.'"';
							$response = mysqli_query($dbc, $querry);
							$row = mysqli_fetch_array($response);
							if($row['SPRAVCE']== "Y" ){
								echo '<a href="ucet.php?admin">Administrator tools</a>';
								}
							}?>
	                </div>
				</li>

				<li><a href="kosik.php">Cart</a></li>
			</ul>	
			</div>
		</nav>
	</div>
</div>