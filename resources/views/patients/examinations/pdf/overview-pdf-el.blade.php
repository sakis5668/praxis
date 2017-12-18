@extends('layouts.pdf')

@section('content')

    <h4>Επισκόπηση εξετάσεων</h4>
    <hr>
    <table class="table">
        <tbody>
        <tr>
            <td>Όνομα :</td>
            <td><strong>{{$patient->last_name}}, {{ $patient->first_name }}</strong></td>
        </tr>
        <tr>
            <td>Ημ. γέννησης :</td>
            @if($patient->birthdate)
                <td>{{ $patient->birth_date->format('d.m.Y') }}</td>
            @else
                <td><i>-</i></td>
            @endif
        </tr>
        <tr>
            <td>Διεύθυνση :</td>
            @if($patient->address)
                <td>{{ $patient->address}}</td>
            @else
                <td><i>-</i></td>
            @endif
        </tr>
        </tbody>
    </table>

    <hr>

    <table class="table">
        <tbody>
        <tr>
            <td><strong>Ιστορικό :</strong></td>
            <td>{!! nl2br(e($patient->history->history)) !!}</td>
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



        @foreach($patient->examinations as $examination)

            <tr align="justify">
                <th><strong>Ημερομηνία :</strong></th>
                <td><strong>{{ $examination->date ? $examination->date->format('d.m.Y') : '-' }}</strong></td>
            </tr>

            <tr align="justify">
                <td>Ευρήματα :</td>
                <td>{!! nl2br(e($examination->findings)) !!}</td>
            </tr>

            <tr align="justify">
                <td>Οδηγίες :</td>
                @if($examination->instructions)
                    <td>{!! nl2br(e($examination->instructions)) !!}</td>
                @else
                    <td>-</td>
                @endif
            </tr>
            <tr>
                <th>
                    <hr>
                </th>
                <td>
                    <hr>
                </td>
            </tr>
        @endforeach

    </table>


@endsection