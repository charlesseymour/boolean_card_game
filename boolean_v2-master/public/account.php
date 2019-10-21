<?php

include '../inc/header.php';

requireAuth();

$userId = decodeJwt('sub');
$stmt = $db->prepare("SELECT * FROM plays WHERE user_id = " . $userId . " ORDER BY id DESC");
$stmt->execute();
$results = $stmt->fetchAll();
$wins = array_filter($results, function($v){
	return $v['win'] == 1;
});

?>
<div class="container">
	<div class="row pt-5">
		<h1 class="mx-auto">Play history</h1>
	</div>
	<div class="row pb-5">
		<h6 class="mx-auto">Win percentage: <?php echo round((count($wins) / count($results)) * 100); ?>%</h6>
	</div>
</div>
<div class="container">
	<table class="table table-striped">
	  <thead>
		<tr>
		  <th scope="col">Date</th>
		  <th scope="col">Boolean</th>
		  <th scope="col">Outcome</th>
		</tr>
	  </thead>
	  <tbody>
		<?php 
			foreach ($results as $result) {
				$date = $result['date'];
				$mode = strtoupper($result['mode']);
				if ($result['win'] == 0) {
					$outcome = 'lose';
				} else {
					$outcome = 'win';
				}
				echo <<<EOD
				<tr>
					<td>$date</td>
					<td>$mode</td>
					<td>$outcome</td>
				</tr>
EOD;
			
			}
		?>
	  </tbody>
	</table>
</div>