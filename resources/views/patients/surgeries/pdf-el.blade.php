<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surgery Report</title>
</head>
<style>
    body {
        font-family: "DejaVu Sans";
    }
</style>
<body>

<h1 class="display-4">Πρακτικό Χειρουργείου</h1>
<table style="width: 70%">
    <tbody>
    <tr>
        <td><strong>Όνομα :</strong>
        <td>{{ $patient->last_name . ', ' . $patient->first_name }}</td>
    </tr>
    <tr>
        <td><strong>Hμ. γέννησης :</strong></td>
        <td>{{ $patient->birth_date ? $patient->birth_date->format('d.m.Y') : 'no date' }}</td>
    </tr>
    <tr>
        <td><strong>Ημ. χειρουργείου :</strong></td>
        <td>{{ $surgery->date ? $surgery->date->format('d.m.Y') : 'no date'}}</td>
    </tr>
    </tbody>
</table>

<hr>
<style>
    td, th {
        padding: 5px;
    }
</style>
<table style="width: 100%">
    <tbody>
    <tr>
        <td><strong>Διάγνωση :</strong></td>
        <td>{{$surgery->diagnosis}}</td>
        <td><strong>Θεραπεία :</strong></td>
        <td>{{$surgery->therapy}}</td>
    </tr>

    <tr>
        <td><strong>Χειρουργός :</strong></td>
        <td>{{$surgery->surgeon}}</td>
        <td><strong>Βοηθός :</strong></td>
        <td>{{$surgery->assistant}}</td>
    </tr>
    <tr>
        <td><strong>Αναισθησία :</strong></td>
        <td>{{$surgery->anesthesia}}</td>
        <td><strong>Αναισθησιολόγος :</strong></td>
        <td>{{$surgery->anesthesist}}</td>
    </tr>
    </tbody>
</table>

<br>
<p align="justify">{{$surgery->text}}</p>

</body>
</html>