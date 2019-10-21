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

$page = 1;
$pages = 3;
$perPage = 10;

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
	<nav aria-label="Play history page navigation">
	  <ul class="pagination pagination-sm">
		<li class="page-item <?php if ($page == 1) {echo 'disabled'; } ?>">
			<a class="page-link" <?php if ($page != 1) {
				echo "href=\"account.php?page=" . $page-1 . "&number=$perPage\"";
			}?>>Previous</a></li>
		<?php 
		$html = "";
		for ($i = 0; $i < $pages; $i++) {
			$html .= '<li class="page-item';
			if ($i+1 == $page) { $html .= ' active';}
			$html .= '"><a class="page-link"';
			if ($i+1 != $page) { $html .= "href=\"/account.php?page=$page&number=$perPage\""; }
			$html .= ">";
			$html .= $i+1;
			$html .= "</a></li>";
		}
		echo $html;
		?>
		<!--<li class="page-item"><a class="page-link" href="#">1</a></li>
		<li class="page-item"><a class="page-link" href="#">2</a></li>
		<li class="page-item"><a class="page-link" href="#">3</a></li>-->
		<li class="page-item <?php if ($page == $pages) {echo 'disabled'; } ?>"><a class="page-link" 
		<?php if ($page != $pages) { echo "href=\"account.php?page=" . ($page + 1) . "&number=$perPage\"";
		} ?>>Next</a></li>
	  </ul>
	</nav>
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