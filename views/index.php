<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 23.01.18
 * Time: 15:28
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Justified Nav Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/page.css" rel="stylesheet">
</head>

<body>

<div class="container">

    <div class="row">
        <div class="col-12">
            <h1 class="text-center">Where your money goes</h1>
            <p class="text-center">Payments made by Chichester District Council to indyvidual suppliers a value over &#163;500 made with October.</p>
        </div>
    </div>
    <hr>
    <div class="row search">
        <div class="col-md-12 col-md-offset-2 align-items-center">
            <form class="form-inline" role="form">
                <div class="form-group">
                    <input type="search" size="40%" class="form-control" id="k" name="k" placeholder="Search suppliers">
                    <select name="selection">
                        <option selected="selected">Select pound rating</option>
                    </select>
                    <input type="submit" value="Reset" class="form-control">
                    <input type="submit" value="Search" class="form-control">
                </div>
            </form>
        </div>
    </div>
    <br />
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col" class="col-md-5">Supplier</th>
                    <th scope="col" class="col-md-3">Pound ratting</th>
                    <th scope="col" class="col-md-2">Reference</th>
                    <th scope="col" class="col-md-2">Value</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach($data['page']['data'] as $key => $value) {
                    ?>
                    <tr>
                        <td scope="row" class="col-md-5"><?php echo $value['payment_supplier']; ?></td>
                        <td class="col-md-3"><?php echo $value['payment_ref']; ?></td>
                        <td class="col-md-2"><?php echo $value['payment_cost_rating']; ?></td>
                        <td class="col-md-2"><?php echo $value['payment_amount']; ?></td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>

        </div>
    </div>
</div> <!-- /container -->
<div id="relative">
    <div id="thisDiv">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <?php
                for($current = 1; $current <= 4; $current++) {
                    ?>
                    <li class="page-item <?php if($current == $data['page']['activePage']){ echo 'active'; } ?>"><a class="pagination page-link" href="/?page=<?php echo $current;?>"><?php echo $current;?></a></li>
                    <?php
                }
                ?>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>
    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="/js/ie10-bug.js"></script>
<script src="/js/pagination.js"></script>
</body>
</html>

