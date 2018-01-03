@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row mt-3">
            <div class="col-md-12">
                @include('patients.actions-top')
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                @include('patients.pregnancies.pregnancies-menu')
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header">
                        <div class="row">
                            <div class="col-9">
                                {{__('pregnancy.outcome.title')}}
                            </div>
                            <div class="col-3">
                                {!! Form::open(['method'=>'get', 'action'=>['PregnancyOutcomesController@edit', $pregnancy, $outcome ]]) !!}
                                {!! Form::button('<i class="fa fa-pencil fa-lg"></i>', ['type'=>'submit', 'class'=>'form-control btn btn-outline-cool']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>

                    </div>

                    <div class="card-body">

                        <input type="hidden" name="corret" id="corret"
                               value="{{ $pregnancy->corrected_edd->format('d.m.Y') }}">
                        <input type="hidden" name="date" id="date"
                               value="{{ $outcome->date ? $outcome->date->format('d.m.Y') : \Carbon\Carbon::now()->format('d.m.Y')}}">

                        <div class="row mt-2">
                            <div class="col-md-3 font-weight-bold">{{__('pregnancy.Date')}} :</div>
                            <div class="col-md-3">{{ $outcome->date ? $outcome->date->format('d.m.Y') : __('pregnancy.nodate') }}</div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-3 font-weight-bold">Wks :</div>
                            <div class="col-md-3" id="wks"></div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-3 font-weight-bold">{{__('pregnancy.Delivery')}} :</div>
                            <div class="col-md-3">{{ $outcome->delivery_type ? \App\Enums\PregnancyDeliveryMode::getDescription($outcome->delivery_type) : __('pregnancy.notavail') }}</div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-3 font-weight-bold">{{__('pregnancy.Gender')}} :</div>
                            <div class="col-md-3">{{ $outcome->gender ? \App\Enums\PregnancyGender::getDescription($outcome->gender) : __('pregnancy.notavail') }}</div>
                            <div class="col-md-3 font-weight-bold">{{__('pregnancy.WeightInGrams')}} :</div>
                            <div class="col-md-3">{{ $outcome->weight ? $outcome->weight : __('pregnancy.notavail') }}</div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-3 font-weight-bold">{{__('pregnancy.Indication')}} :</div>
                            <div class="col-md-9">{{ $outcome->indication }}</div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-3 font-weight-bold">{{__('pregnancy.Comment')}} :</div>
                            <div class="col-md-9"><p align="justify">{!! nl2br(e($outcome->comment)) !!}</p></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <script src="{{ asset('js/moment.min.js') }}"></script>

    <script>
        // Calculate the pregnacy age (wks) at the time of delivery
        // if date of delivery is not set in the outcomes table,
        // use current date (see above, via Carbon)
        $(document).ready(function () {
            var date = moment($('#date').val(), 'D.M.YYYY');
            var corret = moment($('#corret').val(), 'D.M.YYYY');
            var days = 280 + moment.duration(date.diff(corret)).asDays();
            var wksString = ~~(days / 7) + '+' + ~~(days % 7);
            document.getElementById('wks').innerHTML = wksString;
        });
    </script>

@endsection