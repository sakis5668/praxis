@extends('layouts.pdf')

@section('content')

    <h4>Untersuchung</h4>
    <hr>
    <table class="table">
        <tbody>
        <tr>
            <td>Datum :</td>
            @if($examination->date)
                <td>{{$examination->date->format('d.m.Y')}}</td>
            @else
                <td>-</td>
            @endif
        </tr>
        <tr>
            <td>Name :</td>
            <td><strong>{{$patient->last_name}}, {{ $patient->first_name }}</strong></td>
        </tr>
        <tr>
            <td>Geb.-Datum :</td>
            @if($patient->birthdate)
                <td>{{ $patient->birth_date->format('d.m.Y') }}</td>
            @else
                <td><i>-</i></td>
            @endif
        </tr>
        <tr>
            <td>Addresse :</td>
            @if($patient->address)
                <td>{{ $patient->address}}</td>
            @else
                <td><i>-</i></td>
            @endif
        </tr>
        </tbody>
    </table>
    <hr>
    <style>
        td, th {
            padding: 15px;
            vertical-align: top;
            width: 80%;
        }
    </style>
    <table class="table">
        <tbody>

        <tr align="justify">
            <td>Befunde :</td>
            <td>{!! nl2br(e($examination->findings)) !!}</td>
        </tr>

        <tr align="justify">
            <td>Empfehlungen :</td>
            @if($examination->instructions)
                <td>{!! nl2br(e($examination->instructions)) !!}</td>
            @else
                <td>-</td>
            @endif
        </tr>

        </tbody>
    </table>


@endsection