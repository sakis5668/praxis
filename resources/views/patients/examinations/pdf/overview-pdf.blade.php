@extends('layouts.pdf')

@section('content')

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

    <table style="padding: 30px; width: 100%;">
        <tbody>
        <tr>
            <td style="vertical-align: top">
                <title-text><strong>{{__('overview-pdf.title')}}</strong></title-text>
                <br>
                <small-text>
                    ({{__('overview-pdf.Printed')}}: {{ \Carbon\Carbon::now()->format('d.m.Y') }})
                </small-text>
            </td>
            <td style="text-align: right">
                <small-text>
                    <strong>{{$patient->physician->name}}</strong><br>
                    {{$patient->physician->specialty}}<br>
                    {{$patient->physician->address}}<br>
                    {{$patient->physician->postal}}, {{$patient->physician->city}}
                </small-text>
            </td>
        </tr>
        </tbody>
    </table>
    <hr class="style1">
    <table style="padding: 30px; width: 50%">
        <tbody>
        <tr>
            <td>
                <regular-text><strong>{{__('overview-pdf.Name')}} :</strong></regular-text>
            </td>
            <td>
                <regular-text>{{$patient->last_name}}, {{ $patient->first_name }}</regular-text>
            </td>
        </tr>
        <tr>
            <td>
                <regular-text><strong>{{__('overview-pdf.BirthDate')}} :</strong></regular-text>
            </td>
            <td>
                <regular-text>{{$patient->birth_date ? $patient->birth_date->format('d.m.Y') : '-'}}</regular-text>
            </td>
        </tr>
        <tr>
            <td>
                <regular-text><strong>{{__('overview-pdf.Address')}} :</strong></regular-text>
            </td>
            <td>
                <regular-text>{{$patient->address ? $patient->address : '-'}}</regular-text>
            </td>
        </tr>
        <tr>
            <td style="vertical-align: top">
                <regular-text><strong>{{__('overview-pdf.Information')}} :</strong></regular-text>
            </td>
            <td>
                <regular-text>{!! $patient->information ? nl2br(e($patient->information)) : '-' !!}</regular-text>
            </td>
        </tr>
        </tbody>
    </table>
    <hr class="style2">
    <table style="padding: 30px; width: 100%">
        <tbody>
        <tr>
            <td style="vertical-align: top">
                <regular-text><strong>{{__('overview-pdf.History')}} :</strong></regular-text>
            </td>
            <td>
                <regular-text>{!! nl2br(e($patient->history->history)) !!}</regular-text>
            </td>
        </tr>
        </tbody>
    </table>
    <hr class="style2">


    <table style="padding: 30px; width: 100%">
        @foreach($patient->examinations as $examination)

            <tr>
                <th><regular-text><strong>{{__('overview-pdf.Date')}} :</strong></regular-text></th>
                <td><regular-text><strong>{{ $examination->date ? $examination->date->format('d.m.Y') : '-' }}</strong></regular-text></td>
            </tr>

            <tr>
                <td style="vertical-align: top"><regular-text>{{__('overview-pdf.Findings')}} :</regular-text></td>
                <td><regular-text>{!! nl2br(e($examination->findings)) !!}</regular-text></td>
            </tr>

            <tr>
                <td style="vertical-align: top"><regular-text>{{__('overview-pdf.Instructions')}} :</regular-text></td>
                @if($examination->instructions)
                    <td><regular-text>{!! nl2br(e($examination->instructions)) !!}</regular-text></td>
                @else
                    <td><regular-text>-</regular-text></td>
                @endif
            </tr>
            <tr>
                <td colspan="2">
                    <hr class="style3">
                </td>
            </tr>
        @endforeach
    </table>


@endsection