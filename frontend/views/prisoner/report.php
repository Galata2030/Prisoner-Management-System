<?php

use frontend\models\Prisoner; // Assuming you have a "User" model for your database table
$this->title = "Prisoners";
$this->params['breadcrumbs'][] = $this->title;
?>
<div id="printButton" class="pull-right">
    <?php echo date('Y-M-d'); ?>
    <button type="button" name="print" class="btn btn-success btn-sm" onClick="printpage()">
        PRINT
        <span class="glyphicon glyphicon-print" aria-hidden="true"></span>
    </button>
</div>
<script type="text/javascript">
    function printpage() {
        document.getElementById('printButton').style.visibility = "hidden";
        window.print();
        document.getElementById('printButton').style.visibility = "visible";
    }
</script>
<div>
    <p>

        <?php

        /**
         * Calculates the total number of males and females in the database.
         * @return array The total number of males and females.
         */
        function calculatePrisoner()
        {
            $jailCount = Prisoner::find()->where(['status' => 0])->count();
            $transferCount = Prisoner::find()->where(['status' => 2])->count();
            $releaseCount = Prisoner::find()->where(['status' => 1])->count();

            return [
                'jail' => $jailCount,
                'transfer' => $transferCount,
                'release' => $releaseCount,
            ];
        }

        // Usage example:

        $prisonerCount = calculatePrisoner();
        echo "<table border='2'> <caption>Here is the Report of the Prisoners Information</caption>
        <tr><th>Total Jail</th><th>Total Transfer</th> <th> Total Release </th></tr>";
        echo "<tr><td>" . $prisonerCount['jail'] . "</td>";
        echo "<td>" . $prisonerCount['transfer'] . "</td>";
        echo "<td>" . $prisonerCount['release'] . "</td>";
        echo "</tr></table>";
        ?>
    </p>
</div>
<style>
    table {
        border-collapse: collapse;
        width: 75%;
        align-items: center;
    }

    th,
    td {
        padding: 8px;
        text-align: center;
        border-bottom: 1px solid #DDD;
    }

    tr:hover {
        background-color: #D6EEEE;
    }

    caption {
        text-align: center;
        caption-side: top;
        color: blue;
    }

    /* Styles for the page */
    body {
        font-family: Arial, sans-serif;
    }

    h1 {
        color: #333;
    }

    p {
        color: #666;
    }

    /* Styles for printing */
    @media print {
        body {
            font-size: 12pt;
        }

        h1 {
            color: #000;
        }

        p {
            color: #000;
        }
    }
</style>