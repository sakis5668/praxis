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


<h4>Surgery Report</h4>
<table style="width: 50%">
    <tbody>
    <tr>
        <td><strong>Name :</strong>
        <td>{{ $patient->last_name . ', ' . $patient->first_name }}</td>
    </tr>
    <tr>
        <td><strong>birth date :</strong></td>
        <td>{{ $patient->birth_date ? $patient->birth_date->format('d.m.Y') : 'no date' }}</td>
    </tr>
    <tr>
        <td><strong>Operation date :</strong></td>
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
        <td><strong>Diagnosis :</strong></td>
        <td>{{$surgery->diagnosis}}</td>
        <td><strong>Therapy :</strong></td>
        <td>{{$surgery->therapy}}</td>
    </tr>

    <tr>
        <td><strong>Surgeon :</strong></td>
        <td>{{$surgery->surgeon}}</td>
        <td><strong>Assistant :</strong></td>
        <td>{{$surgery->assistant}}</td>
    </tr>
    <tr>
        <td><strong>Anesthesia :</strong></td>
        <td>{{$surgery->anesthesia}}</td>
        <td><strong>Anesthesist :</strong></td>
        <td>{{$surgery->anesthesist}}</td>
    </tr>
    </tbody>
</table>

<br>
<p align="justify">{{$surgery->text}}</p>

</body>
</html>