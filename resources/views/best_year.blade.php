@extends('layout.master')

@section('content')

@section('title',' - Best Year')

<div class="container">
    <h4 class="text-center mb-5"><u>Best Year</u></h4>
    @if(isset($zodiac_id))
    <div class="alert alert-primary" role="alert">
        {{$year}} is best year for {{getZodiacSigns($zodiac_id)}}
    </div>
    @endif
    <form method="post" action="{{URL::to('best-year')}}" class="mb-4" id="yearForm">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">
            <div class="col-md-5">
                @include('partials.form_year')
            </div>
            <div class="col-md-2 text-end">
                <button type="submit" class="btn btn-success">Find</button>
            </div>
        </div>
    </form>
    @if(isset($list))
        @include('partials.horoscope_calendar')
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