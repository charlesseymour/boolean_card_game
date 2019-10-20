<?php

include '../inc/header.php';

requireAuth();

?>

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
		$userId = decodeJwt('sub');
		$stmt = $db->prepare("SELECT * FROM plays WHERE user_id = " . $userId);
		$stmt->execute();
		$results = $stmt->fetchAll();
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