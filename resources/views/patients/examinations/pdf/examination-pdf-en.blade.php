@extends('layouts.pdf')

@section('content')

    <h4>Examination - Report</h4>
    <hr>
    <table class="table">
        <tbody>
        <tr>
            <th scope="row">Date :</th>
            <td>{{$examination->date->format('d.m.Y')}}</td>
        </tr>
        <tr>
            <td>Name : </td>
            <td>{{$patient->full}}</td>
        </tr>
        </tbody>
    </table>



@endsection