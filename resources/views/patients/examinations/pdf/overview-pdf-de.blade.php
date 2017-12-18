@extends('layouts.pdf')

@section('content')

    <h4>Übersicht</h4>
    <hr>
    <table class="table">
        <tbody>
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

    <table class="table">
        <tbody>
        <tr>
            <td><strong>Anamnese :</strong></td>
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
                <th><strong>Datum :</strong></th>
                <td><strong>{{ $examination->date ? $examination->date->format('d.m.Y') : '-' }}</strong></td>
            </tr>

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