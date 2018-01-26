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
    <link href="/css/pagination.css" rel="stylesheet">
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
                <tbody id="rows">
                </tbody>
            </table>
            <div id="pagination-demo"></div>
        </div>
    </div>
</div> <!-- /container -->
<div class=".demo"></div>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="/js/ie10-bug.js"></script>
<script src="/js/pagination.min.js"></script>
<script>
    $('#pagination-demo').twbsPagination({
        totalPages: <?php echo $data['page']['pages']; ?>,
        visiblePages: 7,
        onPageClick: function (event, page) {
            $.ajax({
                url: "/pages/?page=" + page
            }).done(function(response) {
                $("#rows").empty();
                console.log(JSON.parse(response));
                var result = JSON.parse(response);
                $.each(result, function (index, value) {
                    var html = "<tr id=\"result\"><td scope=\"row\" class=\"col-md-5\">"+value.payment_supplier+"</td>" +
                        "<td class=\"col-md-3\">"+value.payment_ref+"</td>" +
                        "<td class=\"col-md-2\">"+value.payment_cost_rating+"</td>" +
                        "<td class=\"col-md-2\">"+value.payment_amount+"</td></tr>"
                    console.log(html);
                    $("#rows").append(html);
                })
            });
        }
    });
</script>
</body>
</html>

