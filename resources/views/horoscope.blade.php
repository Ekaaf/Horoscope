@extends('layout.master')

@section('content')

@if($currentRoute == "generate-horoscope-message")
@section('title',' - Horoscope Message')
@else
@section('title',' - Horoscope')
@endif

<div class="container">
    <h4 class="text-center mb-5">
        <u>@if($currentRoute == "generate-horoscope-message") Horoscope With Message @else Horoscope @endif</u>
    </h4>
    <form method="post" action="{{URL::to($currentRoute)}}" class="mb-4" id="horoscopeForm">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">
            <div class="col-md-5">
                @include('partials.form_zodiac_id')
            </div>
            <div class="col-md-5">
                @include('partials.form_year')
            </div>
            <div class="col-md-2 text-end">
                <button type="submit" class="btn btn-success">Find</button>
            </div>
        </div>
    </form>
    @if(isset($list))
        @if($currentRoute == "generate-horoscope-message")
            @include('partials.horoscope_calendar_message')
        @else
            @include('partials.horoscope_calendar')
        @endif
    @endif
</div>

<style type="text/css">
    thead tr, tbody{
        border: 1px solid black;
    }
</style>

@endsection

@section('script')
<script src="{{URL::to('public/js/custom.js')}}"></script>
@endsection