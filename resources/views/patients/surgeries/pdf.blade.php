@extends('layouts.pdf')

@section('content')

    @include('layouts.language')

    <h4>{{__('surgery-pdf.title')}}</h4>
    <table style="width: 50%">
        <tbody>
        <tr>
            <td><strong>{{__('surgery-pdf.Name')}} :</strong>
            <td>{{ $patient->last_name . ', ' . $patient->first_name }}</td>
        </tr>
        <tr>
            <td><strong>{{__('surgery-pdf.BirthDate')}} :</strong></td>
            <td>{{ $patient->birth_date ? $patient->birth_date->format('d.m.Y') : __('surgery-pdf.noDate') }}</td>
        </tr>
        <tr>
            <td><strong>{{__('surgery-pdf.OperationDate')}} :</strong></td>
            <td>{{ $surgery->date ? $surgery->date->format('d.m.Y') : __('surgery-pdf.noDate')}}</td>
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
            <td><strong>{{__('surgery-pdf.Diagnosis')}} :</strong></td>
            <td>{{$surgery->diagnosis}}</td>
            <td><strong>{{__('surgery-pdf.Therapy')}} :</strong></td>
            <td>{{$surgery->therapy}}</td>
        </tr>

        <tr>
            <td><strong>{{__('surgery-pdf.Surgeon')}} :</strong></td>
            <td>{{$surgery->surgeon}}</td>
            <td><strong>{{__('surgery-pdf.Assistant')}} :</strong></td>
            <td>{{$surgery->assistant}}</td>
        </tr>
        <tr>
            <td><strong>{{__('surgery-pdf.Anesthesia')}} :</strong></td>
            <td>{{$surgery->anesthesia}}</td>
            <td><strong>{{__('surgery-pdf.Anesthesist')}} :</strong></td>
            <td>{{$surgery->anesthesist}}</td>
        </tr>
        </tbody>
    </table>

    <br>
    <p align="justify">{{$surgery->text}}</p>

@endsection