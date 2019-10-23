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

$page = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT);
$perPage = filter_input(INPUT_GET, 'number', FILTER_SANITIZE_NUMBER_INT);
$pages = ceil(count($results) / $perPage);
echo $pages;
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
				echo "href=\"account.php?page=" . 1 . "&number=$perPage\"";
			}?>>First</a></li>
		<li class="page-item <?php if ($page == 1) {echo 'disabled'; } ?>">
			<a class="page-link" <?php if ($page != 1) {
				echo "href=\"account.php?page=" . ($page-1) . "&number=$perPage\"";
			}?>>Previous</a></li>
		<?php 
		$html = "";
		function addPageLink ($index, $isLink) {
			global $html, $page, $perPage;
			$html .= '<li class="page-item';
			if ($index + 1 == $page) { $html .= ' active';}
			$html .= '"><a class="page-link"';
			if ($index + 1 == $page) { 
				$html .= ">";
				$html .= $index + 1;
			}
			if ($index + 1 != $page) { 
				if ($isLink) {
					$html .= "href=\"/account.php?page=" ;
					$html .= $index+1;
					$html .= "&number=$perPage\""; 
					$html .= ">";
					$html .= $index+1;
				} else {
					$html .= ">";
					$html .= '...';
				}
			}
			$html .= "</a></li>";
		}
		// if more than 5 pages:
		//   if current page 1-4, show 1 2 3 4 ...
		//   if current page >= total - 4, show e.g  ... 7 8 9 10
		//   otherwise show e.g. ... 4 5 6 ...
		// if 5 or fewer pages, show all pages e.g 1 2 3 4 5
		for ($i = 0; $i < 5; $i++) {
			if ($pages > 5) {
				if ($page < 5) {
					if ($i < 4) {
					    addPageLink($i, true);
					} else {
						addPageLink($i, false);
					}
				} else if ($page > $pages - 4) {
					if ($i == 0) {
						addPageLink($i, false);
					} else {
						addPageLink($pages - (5 - $i), true);
					}
				} else {
					if ($i == 0 || $i == 4) {
						addPageLink($i, false);
					} else {
						if ($page % 3 == 2) {
							//$page, $page + 1, $page + 2
							addPageLink($page + ($i - 1), true);
						} else if ($page % 3 == 1) {
							//$page - 2, $page - 1, $page
							addPageLink($page - (3 - $i), true);
						} else {
							//$page % 3 = 0
							//$page - 1, $page, $page + 1
							addPageLink($page - (2 - $i), true);
						}
					}
				}
			}
		}
		/*for ($i = 0; $i < $pages; $i++) {
			$html .= '<li class="page-item';
			if ($i+1 == $page) { $html .= ' active';}
			$html .= '"><a class="page-link"';
			if ($i+1 != $page) { 
				$html .= "href=\"/account.php?page=" ;
			    $html .= $i+1;
				$html .= "&number=$perPage\""; 
			}
			$html .= ">";
			$html .= $i+1;
			$html .= "</a></li>";
		}*/
		echo $html;
		?>
		<li class="page-item <?php if ($page == $pages) {echo 'disabled'; } ?>"><a class="page-link" 
		<?php if ($page != $pages) { echo "href=\"account.php?page=" . ($page + 1) . "&number=$perPage\"";
		} ?>>Next</a></li>
		<li class="page-item <?php if ($page == $pages) {echo 'disabled'; } ?>"><a class="page-link"
		<?php if ($page != $pages) { echo "href=\"account.php?page=" . ($pages) . "&number=$perPage\"";
		} ?>>Last</a></li>
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