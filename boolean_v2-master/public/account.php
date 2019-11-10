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
$resultsAnd = array_filter($results, function($v){
	return $v['mode'] == 'and';
});
$winsAnd = array_filter($resultsAnd, function($v){
	return $v['win'] == 1;
});
$resultsOr = array_filter($results, function($v){
	return $v['mode'] == 'or';
});
$winsOr = array_filter($resultsOr, function($v){
	return $v['win'] == 1;
});
$resultsNot = array_filter($results, function($v){
	return $v['mode'] == 'not';
});
$winsNot = array_filter($resultsNot, function($v){
	return $v['win'] == 1;
});

$page = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT);
$perPage = filter_input(INPUT_GET, 'number', FILTER_SANITIZE_NUMBER_INT);
$pages = ceil(count($results) / $perPage);

?>
<div class="container">
	<div class="row pt-5">
		<h1 class="mx-auto">Win Percentages</h1>
	</div>
	<div class="row boolean-wins">
		<div class="col-sm-3">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title">ALL</h5>
					<p class="win-percentage"><?php if (count($results) > 0) {
						echo (round((count($wins) / count($results)) * 100)) . "%"; } else {
						echo "n/a"; }; ?></p>
				</div>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title">AND</h5>
					<p class="win-percentage"><?php if (count($resultsAnd) > 0) { 
						echo round((count($winsAnd) / count($resultsAnd)) * 100) . "%"; } else {
						echo "n/a"; }; ?></p>
				</div>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title">OR</h5>
					<p class="win-percentage"><?php if (count($resultsOr) > 0) {
						echo round((count($winsOr) / count($resultsOr)) * 100) . "%";} else {
						echo "n/a"; }; ?></p>
				</div>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title">NOT</h5>
					<p class="win-percentage"><?php if (count($resultsNot) > 0) { 
						echo round((count($winsNot) / count($resultsNot)) * 100) . "%"; } else {
						echo "n/a"; }; ?></p>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row pt-5 mb-5">
		<h1 id="history" class="mx-auto">Play History</h1>
	</div>
	<nav class="nav justify-content-between" aria-label="Play history page navigation">
	  <ul class="pagination pagination-sm">
		<li class="page-item <?php if ($page == 1) {echo 'disabled'; } ?>">
			<a class="page-link" <?php if ($page != 1) {
				echo "href=\"account.php?page=" . 1 . "&number=$perPage#history\"";
			}?>><<</a></li>
		<li class="page-item <?php if ($page == 1) {echo 'disabled'; } ?>">
			<a class="page-link" <?php if ($page != 1) {
				echo "href=\"account.php?page=" . ($page-1) . "&number=$perPage#history\"";
			}?>><</a></li>
		<?php 
		$html = "";
		function addPageLink ($num, $isEllipsis = false) {
			global $html, $page, $perPage;
			$html .= '<li class="page-item';
			// Add active class to link for current page
			if ($num  == $page) { $html .= ' active';}
			$html .= '"><a class="page-link"';
			// Button for current page doesn't link
			if ($num == $page) { 
				$html .= ">";
				$html .= $num;
			}
			if ($num != $page) { 
				$html .= "href=\"/account.php?page=" ;
				$html .= $num;
				$html .= "&number=$perPage#history\""; 
				$html .= ">";
				if (!$isEllipsis) {
					$html .= $num;
				} else {
					$html .= '...';
				}
			}
			$html .= "</a></li>";
		}
		// Generate page navigation buttons
		// if total number of pages > 5:
		//   if current page 1-4, show 1 2 3 4 ...
		//   if current page >= total - 4, show e.g  ... 7 8 9 10
		//   otherwise show e.g. ... 4 5 6 ...
		// if 5 or fewer pages, show all pages e.g 1 2 3 4 5
		for ($i = 1; $i < 6; $i++) {
			if ($pages > 5) {
				if ($page < 5) {
					if ($i < 5) {
					    addPageLink($i);
					} else {
						addPageLink($i, true);
					}
				} else if ($page > $pages - 4) {
					if ($i == 1) {
						addPageLink($pages - 4, true);
					} else {
						addPageLink($pages - (5 - $i));
					}
				} else {
					if ($page % 3 == 2) {
						if ($i == 1 || $i == 5) {
							addPageLink($page + ($i - 2), true);
						} else {
							addPageLink($page + ($i - 2));
						}
					} else if ($page % 3 == 1) {
						if ($i == 1 || $i == 5) {
							addPageLink($page - (4 - $i), true);
						} else {
							addPageLink($page - (4 - $i));
						}
					} else {
						if ($i == 1 || $i == 5) {
							addPageLink($page - (3 - $i), true);
						} else {
							addPageLink($page - (3 - $i));
						}
					}
				
				}
			} else {
				if ($i <= $pages) {
					addPageLink($i);
				}
			}
		}
		echo $html;
		?>
		<li class="page-item <?php if ($page == $pages) {echo 'disabled'; } ?>"><a class="page-link" 
		<?php if ($page != $pages) { echo "href=\"account.php?page=" . ($page + 1) . "&number=$perPage#history\"";
		} ?>>></a></li>
		<li class="page-item <?php if ($page == $pages) {echo 'disabled'; } ?>"><a class="page-link"
		<?php if ($page != $pages) { echo "href=\"account.php?page=" . ($pages) . "&number=$perPage#history\"";
		} ?>>>></a></li>
	  </ul>
	
	<div id="per-page" class="dropdown">
	  <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		Results per page
	  </button>
	  <div class="dropdown-menu float-right" aria-labelledby="dropdownMenuButton">
		<?php 
			$arr = array('10', '25', '50');
			foreach ($arr as $value) {
				echo '<a class="dropdown-item';
				if ($perPage == $value) {
					echo " active";
				}
				echo '"';
				if ($perPage != $value) {
					echo 'href="/account.php?page=1&number=' . $value . '#history"';
				}
				echo ">$value</a>";
			}
		?>
	  </div>
	</div>
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
			foreach (array_slice($results, (($page - 1) * $perPage), $perPage)  as $result) {
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