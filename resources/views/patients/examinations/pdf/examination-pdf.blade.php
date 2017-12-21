@extends('layouts.pdf')

@section('content')

    @include('layouts.language')

    <h4>{{__('examination-pdf.title')}}</h4>
    <hr>
    <table class="table">
        <tbody>
        <tr>
            <td>{{__('examination-pdf.Date')}} :</td>
            @if($examination->date)
                <td>{{$examination->date->format('d.m.Y')}}</td>
            @else
                <td>-</td>
            @endif
        </tr>
        <tr>
            <td>{{__('examination-pdf.Name')}} :</td>
            <td><strong>{{$patient->last_name}}, {{ $patient->first_name }}</strong></td>
        </tr>
        <tr>
            <td>{{__('examination-pdf.BirthDate')}} :</td>
            @if($patient->birthdate)
                <td>{{ $patient->birth_date->format('d.m.Y') }}</td>
            @else
                <td><i>{{__('examination-pdf.notavail')}}</i></td>
            @endif
        </tr>
        <tr>
            <td>{{__('examination-pdf.Address')}} :</td>
            @if($patient->address)
                <td>{{ $patient->address}}</td>
            @else
                <td><i>{{__('examination-pdf.notavail')}}</i></td>
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
            <td>{{__('examination-pdf.Findings')}} :</td>
            <td>{!! nl2br(e($examination->findings)) !!}</td>
        </tr>

        <tr align="justify">
            <td>{{__('examination-pdf.Instructions')}} :</td>
            @if($examination->instructions)
                <td>{!! nl2br(e($examination->instructions)) !!}</td>
            @else
                <td>-</td>
            @endif
        </tr>

        </tbody>
    </table>


@endsection