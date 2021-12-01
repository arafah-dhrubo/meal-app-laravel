Hello..
This mail contains Weekly report of your Team.
<style>
    table,
    th,
    td {
        border: 1px solid black;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

</style>
<table>
    <thead>
        <tr>
            <th>Meal Type</th>
            <th>Expense</th>
            <th>Person</th>
        </tr>
    </thead>
    <tbody>

        <tr>
            <td>Snacks</td>
            <td>{{ $body["expense_for_snacks"]}}</td>
            <td>{{ $body["person_for_snacks"] }}</td>
        </tr>
        <tr>
            <td>Lunch</td>
            <td>{{ $body["expense_for_lunch"] }}</td>
            <td>{{ $body["person_for_lunch"] }}</td>
        </tr>
        <tr>
            <td>Party</td>
            <td>{{ $body["expense_for_party"] }}</td>
            <td>{{ $body["person_for_party"] }}</td>
        </tr>
    </tbody>
</table>
