@extends('layouts.app')

@section('head')
    <script src="{{ asset('js/src/wish/wishDetail.js') }}"></script>
@endsection

@section('content')
    <div class="contentContainer">
        <div class="tick" data-did-init="setupTickCountDown" data-credits="false">
            <div data-repeat="true"
                 data-layout="horizontal center fit"
                 data-transform="preset(d, h, m, s) -> delay">
                <div class="tick-group" data-layout="vertical right">
                    <div data-key="value"
                         data-repeat="true"
                         data-transform="pad(00) -> split -> delay">
                        <span data-view="flip"></span>
                    </div>

                    <span data-key="label"
                          data-view="text"
                          class="tick-label"></span>
                </div>
            </div>
        </div>
    </div>
@endsection
