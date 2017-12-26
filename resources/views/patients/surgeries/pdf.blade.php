@extends('layouts.pdf')

@section('content')

    @include('layouts.language')

    <style>

        title-text {
            font-size: 16px;
        }

        regular-text {
            font-size: 12px;
        }

        small-text {
            font-size: 10px;
        }

        hr.style1 {
            border-top: 3px double #8c8b8b;
            border-bottom: 0px;
        }

        hr.style2 {
            border-top: 1px solid #8b8c8c;
            border-bottom: 0px;
        }

        hr.style3 {
            border-top: 1px dotted #8c8b8b;
            border-bottom: 0px;
        }

    </style>

    <table style="width: 100%">
        <tbody>
        <tr>
            <td>
                <title-text><strong>{{__('surgery-pdf.title')}}</strong></title-text>
            </td>
            <td style="text-align: right">
                <regular-text>{{$patient->physician->name}}</regular-text>
            </td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: right">
                <small-text>
                    {{$patient->physician->specialty}}<br>
                    {{$patient->physician->address}} <br>
                    {{$patient->physician->postal}}, {{$patient->physician->city}}
                </small-text>
            </td>
        </tr>
        </tbody>
    </table>
    <hr class="style1">

    <table style="width: 50%; padding: 20px">
        <tbody>
        <tr>
            <td><regular-text><strong>{{__('surgery-pdf.Name')}} :</strong></regular-text></td>
            <td><regular-text>{{$patient->last_name . ', ' . $patient->first_name}}</regular-text></td>
        </tr>
        <tr>
            <td><regular-text><strong>{{__('surgery-pdf.BirthDate')}} :</strong></regular-text></td>
            <td><regular-text>{{ $patient->birth_date ? $patient->birth_date->format('d.m.Y') : __('surgery-pdf.noDate') }}</regular-text></td>
        </tr>
        <tr>
            <td><regular-text><strong>{{__('surgery-pdf.OperationDate')}} :</strong></regular-text></td>
            <td><regular-text>{{$surgery->date ? $surgery->date->format('d.m.Y') : __('surgery-pdf.noDate')}}</regular-text></td>
        </tr>
        </tbody>
    </table>
    <hr class="style2">

    <table style="width: 100%; padding: 20px">
        <tbody>
        <tr>
            <td><regular-text><strong>{{__('surgery-pdf.Diagnosis')}} :</strong></regular-text></td>
            <td><regular-text>{{$surgery->diagnosis}}</regular-text></td>
        </tr>
        <tr>
            <td><regular-text><strong>{{__('surgery-pdf.Therapy')}} :</strong></regular-text></td>
            <td><regular-text>{{$surgery->therapy}}</regular-text></td>
        </tr>

        <tr>
            <td><regular-text><strong>{{__('surgery-pdf.Surgeon')}} :</strong></regular-text></td>
            <td><regular-text>{{$surgery->surgeon}}</regular-text></td>
            <td><regular-text><strong>{{__('surgery-pdf.Assistant')}} :</strong></regular-text></td>
            <td><regular-text>{{$surgery->assistant}}</regular-text></td>
        </tr>

        <tr>
            <td><regular-text><strong>{{__('surgery-pdf.Anesthesia')}} :</strong></regular-text></td>
            <td><regular-text>{{$surgery->anesthesia}}</regular-text></td>
            <td><regular-text><strong>{{__('surgery-pdf.Anesthesist')}} :</strong></regular-text></td>
            <td><regular-text>{{$surgery->anesthesist}}</regular-text></td>
        </tr>
        </tbody>
    </table>
    <hr class="style2">

    <p align="justify" style="padding: 40px"><regular-text>{{$surgery->text}}</regular-text></p>

@endsection