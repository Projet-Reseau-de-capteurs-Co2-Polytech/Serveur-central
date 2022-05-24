<?php

function headerUser(){
	echo'
	<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
		<ul class="nav nav-pills align-content-center justify-content-center" >
		  <li class="nav-item"><a href="adminUser.php" class="nav-link active" aria-current="page">Users</a></li>
		  <li class="nav-item"><a href="admin.php" class="nav-link">Bâtiments</a></li>
		</ul>
	</header>
	';
}

function headerBat(){
	echo'
	<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
		<ul class="nav nav-pills align-content-center justify-content-center" >
		  <li class="nav-item"><a href="adminUser.php" class="nav-link">Users</a></li>
		  <li class="nav-item"><a href="admin.php" class="nav-link active" aria-current="page">Bâtiments</a></li>
		</ul>
    </header>
		';
}

?>