@extends('layout.master')

@section('content')

@section('title',' - Generate Horoscope')

<div class="container">
    <h4 class="text-center mb-5"><u>Generate Horoscope</u></h4>
    <form method="post" action="{{URL::to('save-horoscope')}}" class="mb-4" id="yearForm">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">
            <div class="col-md-5">
                @include('partials.form_year')
            </div>
            <div class="col-md-2 text-end">
                <button type="submit" class="btn btn-success">Generate</button>
            </div>
        </div>

        @if(session('exist'))
        <div class="mt-4">
            <div class="row mb-3">
                {{session('exist')}}
            </div>
            <button type="submit" class="btn btn-primary" name="regenerate" value="1">Yes</button>
            <button type="button" class="btn btn-danger" onclick='$(this).parent().remove();'>No</button>
        </div>
        @endif
    </form>
    @include('layout.message')
</div>
@endsection

@section('script')
<script src="{{URL::to('public/js/custom.js')}}"></script>
@endsection