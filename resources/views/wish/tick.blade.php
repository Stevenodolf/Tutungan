@extends('layouts.app')

@section('head')
    <script src="{{ asset('js/src/wish/wishDetail.js') }}"></script>
@endsection

@section('content')
    <div class="contentContainer">
{{--        <div class="tick" data-did-init="handleTickInit">--}}

{{--            <div data-repeat="true" data-layout="horizontal fit" data-transform="preset(d, h, m, s) -> delay">--}}

{{--                <div class="tick-group">--}}

{{--                    <div data-key="value" data-repeat="true" data-transform="pad(00) -> split -> delay">--}}

{{--                        <span data-view="flip"></span>--}}

{{--                    </div>--}}

{{--                    <span data-key="label" data-view="text" class="tick-label"></span>--}}

{{--                </div>--}}

{{--            </div>--}}

{{--        </div>--}}

        <div class="tick" data-value="Hello World">

            <span data-view="flip"></span>

        </div>

        <div class="tick-onended-message" style="display:none">
            <p>Time's up</p>
        </div>
    </div>
@endsection
