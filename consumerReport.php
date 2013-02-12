<?php

include_once( "connectToDB.php" );

$query = "SELECT cr.prod_id, p.prod_name, COUNT( cr.prod_id ) AS qty, SUM( p.prod_price ) as total_amount
          FROM consumer_report AS cr LEFT JOIN products AS p
          ON cr.prod_id = p.prod_id
          GROUP BY cr.prod_id;";

$result = mysql_query( $query );
$numRows = mysql_num_rows( $result );

?>

<html>

<head>
    <title>Consumer Report</title>

    <style>

        table
        {
            margin: 10px;
            padding: 10px;
            width: 50%;
            position: relative;
            left: 25%;
            right: 25%;
            border-collapse: collapse;
        }

        th
        {
            border-style: solid;
            border-width: 1px;
            border-color: green;
            margin: 0;
        }

        td
        {
            border-style: solid;
            border-width: 1px;
            border-color: green;
            margin: 0px;
            padding-left: 5px;
            padding-right: 5px;
        }

        .alignRight
        {
            text-align: right;
        }

    </style>
</head>

<body>

<h4 style="text-align: center">Report</h4>

<table>
    <tr>
        <th>ID</th>
        <th>Product Name</th>
        <th>Qty</th>
        <th>Total Amount</th>
    </tr>

    <?php

    if ( $numRows ){
        $totalAmt = 0;
        for( $i=0; $i < $numRows; $i++ ){
            $id= mysql_result( $result, $i, "prod_id" );
            $name= mysql_result( $result, $i, "prod_name" );
            $qty= mysql_result( $result, $i, "qty" );
            $total= mysql_result( $result, $i, "total_amount" );
            $totalAmt += $total;

            echo "<tr>
                    <td style='text-align: center;'>$id</td>
                    <td>$name</td>
                    <td class='alignRight'>$qty</td>
                    <td class='alignRight'>". number_format( $total, 2, '.', ',' ) ."</td>
                 </tr>";

        }

        echo "<tr>
                <td style='text-align: center'>Total:</td>
                <td></td>
                <td></td>
                <td class='alignRight'>Php ". number_format( $totalAmt, 2, '.', ',' ) ."</td>
              </tr>";

    }else{
        echo "<tr>
                <td colspan='4' style='text-align: center;'>No Data to Display</td>
              </tr>";
    }

    mysql_close();
    ?>
</table>

</body>

</html>