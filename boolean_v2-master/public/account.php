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
echo $page;
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
		function addPageLink ($isLink, $num = null) {
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
			if ($num  != $page) { 
				if ($isLink) {
					$html .= "href=\"/account.php?page=" ;
					$html .= $num;
					$html .= "&number=$perPage\""; 
					$html .= ">";
					$html .= $num;
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
		for ($i = 1; $i < 6; $i++) {
			if ($pages > 5) {
				if ($page < 5) {
					if ($i < 5) {
					    addPageLink(true, $i);
					} else {
						addPageLink(false);
					}
				} else if ($page > $pages - 4) {
					if ($i == 1) {
						addPageLink(false);
					} else {
						addPageLink(true, $pages - (5 - $i));
					}
				} else {
					if ($i == 1 || $i == 5) {
						addPageLink(false);
					} else {
						if ($page % 3 == 2) {
							addPageLink(true, $page + ($i - 2));
						} else if ($page % 3 == 1) {
							addPageLink(true, $page - (4 - $i));
						} else {
							addPageLink(true, $page - (3 - $i));
						}
					}
				}
			} else {
				if ($i <= $pages) {
					addPageLink(true, $i);
				}
			}
		}
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