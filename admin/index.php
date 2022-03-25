<?php 

$site_title = "Admin - Selfie Challenge";
require_once('../z_db_pdo.php');
include_once('header_admin.php');
?>

 <section class="section-padding">
            <div class="container">

              <div class="text-center mb-30">
                  <h2 class="section-title">Contestants</h2>
                  <p class="section-sub"></p>
              </div>

                <div class="row">

<?php
try {

    // Find out how many items are in the table
    $total = $con->query('
        SELECT
            COUNT(*)
        FROM
            users
		WHERE
			image_name != ""
    ')->fetchColumn();

    // How many items to list per page
    $limit = 12;

    // How many pages will there be
    $pages = ceil($total / $limit);

    // What page are we currently on?
    $page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array(
        'options' => array(
            'default'   => 1,
            'min_range' => 1,
        ),
    )));

    // Calculate the offset for the query
    $offset = ($page - 1)  * $limit;

    // Some information to display to the user
    $start = $offset + 1;
    $end = min(($offset + $limit), $total);

    // The "back" link
    $prevlink = ($page > 1) ? '<a href="?page=1" title="First page"><i class="fa fa-angle-double-left fa-4 aria-hidden="true"></i></a> <a href="?page=' . ($page - 1) . '" title="Previous page"><i class="fa fa-chevron-left fa-3 aria-hidden="true"></i></a>' : '<span class="disabled"><i class="fa fa-angle-double-left fa-4"></i></span> <span class="disabled"><i class="fa fa-chevron-left fa-3"></i></span>';

    // The "forward" link
    $nextlink = ($page < $pages) ? '<a href="?page=' . ($page + 1) . '" title="Next page"><i class="fa fa-chevron-right fa-3"></i></a> <a href="?page=' . $pages . '" title="Last page"><i class="fa fa-angle-double-right fa-4"></i></a>' : '<span class="disabled"><i class="fa fa-chevron-right fa-3"></i></span> <span class="disabled"><i class="fa fa-angle-double-right fa-4"></i></span>';

    // Display the paging information
    echo '<div id="paging" class="col-md-10"><p>', $prevlink, ' Page ', $page, ' of ', $pages, ' pages ' ,$nextlink, ' <span class="pull-right">displaying ', $start, '-', $end, ' of ', $total, ' results </span></p></div>';

    // Prepare the paged query
    $stmt = $con->prepare('
        SELECT
            *
        FROM
            users
		WHERE
			image_name != ""
        ORDER BY
            date_created DESC
        LIMIT
            :limit
        OFFSET
            :offset
    ');

    // Bind the query params
    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();

    // Do we have any results?
    if ($stmt->rowCount() > 0) {
        // Define how we want to fetch the results
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $iterator = new IteratorIterator($stmt);

        // Display the results
        foreach ($iterator as $row) {
            //echo '<p>', $row['fname'], '</p>';
			$facebook = trim_social($row['facebook'], '#');
			$facebook = trim_social($row['facebook'], '@');
			$twitter = trim_social($row['twitter'], '@');
			$instagram = trim_social($row['instagram'], '@');
			
			
			echo '<div class="col-md-3 col-sm-6 col-xs-6 mb-30">
			  <div class="featured-item seo-service">
				  <div class="icon">
					  <img class="img-responsive" src="../output/'.$row['image_name'].'" alt="">
				  </div>
				  <div class="desc">
					  <h2>'.strtoupper($row['fname']).' <br> with <br> '.strtoupper($row['dog_name']).'</h2>
					  <h4>'.date("D, j M Y g:i:s A",$row['date_created']).'</h4>
					  <div class="bg-overlay"></div>
					  <p class="learn-more">Facebook  <i class="fa fa-long-arrow-right"></i>&nbsp;&nbsp;<a target="_blank" href="http://facebook.com/'.$facebook.'">'.$facebook.'</a><br>
					  Twitter  <i class="fa fa-long-arrow-right"></i>&nbsp;&nbsp;<a target="_blank" href="http://twitter.com/'.$twitter.'">'.$twitter.'</a><br>
					  Instagram  <i class="fa fa-long-arrow-right"></i>&nbsp;&nbsp;<a target="_blank" href="http://instagram.com/'.$instagram.'">'.$instagram.'</a></p>
				  </div>
			  </div><!-- /.featured-item -->
			</div><!-- /.col-md-3 -->
			';
        }

    } else {
        echo '<p>No results could be displayed.</p>';
    }

} catch (Exception $e) {
    echo '<p>', $e->getMessage(), '</p>';
}

function trim_social($social, $char){
	return ltrim($social, $char);
}

?>


                    
					
					
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section>
		
<?php include_once('footer_admin.php'); ?>