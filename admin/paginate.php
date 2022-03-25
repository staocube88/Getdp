<?php 
require_once('../z_db_pdo.php');

try {

    // Find out how many items are in the table
    $total = $con->query('
        SELECT
            COUNT(*)
        FROM
            users
    ')->fetchColumn();

    // How many items to list per page
    $limit = 2;

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
    $prevlink = ($page > 1) ? '<a href="?page=1" title="First page">&laquo;</a> <a href="?page=' . ($page - 1) . '" title="Previous page">&lsaquo;</a>' : '<span class="disabled">&laquo;</span> <span class="disabled">&lsaquo;</span>';

    // The "forward" link
    $nextlink = ($page < $pages) ? '<a href="?page=' . ($page + 1) . '" title="Next page">&rsaquo;</a> <a href="?page=' . $pages . '" title="Last page">&raquo;</a>' : '<span class="disabled">&rsaquo;</span> <span class="disabled">&raquo;</span>';

    // Display the paging information
    echo '<div id="paging"><p>', $prevlink, ' Page ', $page, ' of ', $pages, ' pages, displaying ', $start, '-', $end, ' of ', $total, ' results ', $nextlink, ' </p></div>';

    // Prepare the paged query
    $stmt = $con->prepare('
        SELECT
            *
        FROM
            users
        ORDER BY
            date_created
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
            echo '<p>', $row['fname'], '</p>';
        }

    } else {
        echo '<p>No results could be displayed.</p>';
    }

} catch (Exception $e) {
    echo '<p>', $e->getMessage(), '</p>';
}


?>

<section class="section-padding">
            <div class="container">
              <div class="text-center mb-80">
                  <h2>Icon Tab</h2>
                  <p>materialize has 8 unique tab style</p>
              </div>

              <div class="row">
                <div class="col-md-12">

                    <div class="icon-tab">

                      <!-- Nav tabs -->
                      <div class="text-center">
                        <ul class="nav nav-pills" role="tablist">
                          <li role="presentation"><a href="#icontab-1" class="waves-effect waves-light"  role="tab" data-toggle="tab"> <i class="material-icons">&#xE7FD;</i></a></li>
                          <li role="presentation" class="active"><a href="#icontab-2" class="waves-effect waves-light" role="tab" data-toggle="tab"> <i class="material-icons">&#xE40A;</i></a></li>
                          <li role="presentation"><a href="#icontab-3" class="waves-effect waves-light" role="tab" data-toggle="tab"> <i class="material-icons">&#xE53B;</i></a></li>
                          <li role="presentation"><a href="#icontab-4" class="waves-effect waves-light" role="tab" data-toggle="tab"> <i class="material-icons">&#xE859;</i></a></li>
                        </ul>
                      </div>

                      <!-- Tab panes -->
                      <div class="panel-body mt-40">
                        <div class="tab-content">
                          <div role="tabpanel" class="tab-pane fade" id="icontab-1">

                            <div class="row">
                              <div class="col-md-6">
                                  <h2 class="text-bold mb-40">About us</h2>
                                  <p>Himenaeos a vestibulum morbi. <a href="#">Ullamcorper cras scelerisque</a> taciti lorem metus feugiat est lacinia facilisis id nam leo condimentum praesent id diam. Vestibulum amet porta odio elementum convallis parturient tempor tortor tempus a mi ad parturient ad nulla mus amet in penatibus nascetur at vulputate euismod a est tristique scelerisque. Aliquet facilisis nisl vel vestibulum dignissim gravida ullamcorper hac quisque ad at nisl egestas adipiscing vel blandit.</p>
                              </div>

                              <div class="col-md-6">
                                  <img src="assets/img/mockup/laptop-tab.jpg" alt="" class="img-responsive">
                              </div>
                            </div>
                          </div>

                          <div role="tabpanel" class="tab-pane fade in active" id="icontab-2">
                            <div class="row">
                              <div class="col-md-6">
                                  <h2 class="text-bold mb-40">Our Mission</h2>
                                  <p>Himenaeos a vestibulum morbi. <a href="#">Ullamcorper cras scelerisque</a> taciti lorem metus feugiat est lacinia facilisis id nam leo condimentum praesent id diam. Vestibulum amet porta odio elementum convallis parturient tempor tortor tempus a mi ad parturient ad nulla mus amet in penatibus nascetur at vulputate euismod a est tristique scelerisque. Aliquet facilisis nisl vel vestibulum dignissim gravida ullamcorper hac quisque ad at nisl egestas adipiscing vel blandit.</p>
                              </div>

                              <div class="col-md-6">
                                  <img src="assets/img/mission.jpg" alt="" class="img-responsive">
                              </div>
                            </div>
                          </div>

                          <div role="tabpanel" class="tab-pane fade" id="icontab-3">
                            <div class="row">
                              <div class="col-md-6">
                                  <h2 class="text-bold mb-40">What We Do</h2>
                                  <p>Himenaeos a vestibulum morbi. <a href="#">Ullamcorper cras scelerisque</a> taciti lorem metus feugiat est lacinia facilisis id nam leo condimentum praesent id diam. Vestibulum amet porta odio elementum convallis parturient tempor tortor tempus a mi ad parturient ad nulla mus amet in penatibus nascetur at vulputate euismod a est tristique scelerisque. Aliquet facilisis nisl vel vestibulum dignissim gravida ullamcorper hac quisque ad at nisl egestas adipiscing vel blandit.</p>
                              </div>

                              <div class="col-md-6">
                                  <img src="assets/img/mockup/laptop-tab.jpg" alt="" class="img-responsive">
                              </div>
                            </div>
                          </div>
                          
                          <div role="tabpanel" class="tab-pane fade" id="icontab-4">
                            <div class="row">
                              <div class="col-md-6">
                                  <h2 class="text-bold mb-40">Our Setps</h2>
                                  <p>Himenaeos a vestibulum morbi. <a href="#">Ullamcorper cras scelerisque</a> taciti lorem metus feugiat est lacinia facilisis id nam leo condimentum praesent id diam. Vestibulum amet porta odio elementum convallis parturient tempor tortor tempus a mi ad parturient ad nulla mus amet in penatibus nascetur at vulputate euismod a est tristique scelerisque. Aliquet facilisis nisl vel vestibulum dignissim gravida ullamcorper hac quisque ad at nisl egestas adipiscing vel blandit.</p>
                              </div>

                              <div class="col-md-6">
                                  <img src="assets/img/mission.jpg" alt="" class="img-responsive">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                    </div><!-- /.icon-tab -->

                </div><!-- /.col-md-12 -->
              </div><!-- /.row -->
            </div><!-- /.container -->
        </section>