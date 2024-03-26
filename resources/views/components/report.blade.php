@php
    use Illuminate\Support\Facades\DB;
    // Retrieve data from the database
    $res = DB::table('transactions')
        ->select('TransactionType', DB::raw('SUM(Expense) as TotalExpense'))
        ->groupBy('TransactionType')
        ->get();

    // Prepare data for the pie chart
    $dataPoints = [];
    foreach ($res as $row) {
        // Prepare data for the pie chart
        $arrayItem = ['label' => $row->TransactionType, 'y' => $row->TotalExpense];
        array_push($dataPoints, $arrayItem);
    }
@endphp

<div class="container mt-5">
    <h2 class="mb-4">Report</h2>

    <!-- Display the table -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Transaction Type</th>
                <th>Total Expense</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($res as $row)
                <tr>
                    <td>{{ $row->TransactionType }}</td>
                    <td>${{ $row->TotalExpense }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Chart container -->
    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
</div>

<!-- Scripts for the pie chart -->
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script>
    window.onload = function() {
        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            title: {
                text: "Expenses by Transaction Type"
            },
            data: [{
                type: "pie",
                yValueFormatString: "#,##0.00\"\"",
                indexLabel: "{label} ({y})",
                dataPoints: @json($dataPoints, JSON_NUMERIC_CHECK)
            }]
        });
        chart.render();
    }
</script>
