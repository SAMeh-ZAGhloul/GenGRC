{{--@extends('layouts.app')--}}

{{--@section('content_header')--}}
{{--    <h1>Test Report</h1>--}}
{{--@stop--}}

{{--@section('content')--}}

{{--    <div class="card">--}}
{{--        <div class="card-header">--}}
{{--            Control Implementation Report--}}
{{--        </div>--}}
{{--        <div class="card-body">--}}

{{--            <table class="table table-striped">--}}
{{--                <thead>--}}
{{--                <tr>--}}
{{--                    <th>In Scope Standard</th>--}}
{{--                    <th>Control Count</th>--}}
{{--                    <th>Implementation Count</th>--}}
{{--                </tr>--}}
{{--                </thead>--}}
{{--                <tbody>--}}
{{--                @foreach($inScopeStandards as $inScopeStandard)--}}
{{--                    <tr>--}}
{{--                        <td>{{ $inScopeStandard->name }}</td>--}}
{{--                        <td>{{ $inScopeStandard->controls->count() }}</td>--}}
{{--                        @php--}}
{{--                            $implementationCount = 0;--}}
{{--                            foreach ($inScopeStandard->controls as $control) {--}}
{{--                                $implementationCount += $control->implementations->count();--}}
{{--                            }--}}
{{--                        @endphp--}}
{{--                        <td>{{$implementationCount}}</td>--}}
{{--                    </tr>--}}
{{--                @endforeach--}}
{{--                </tbody>--}}
{{--            </table>--}}

{{--        </div>--}}

{{--    </div>--}}

{{--@endsection--}}


@extends('reports.layout')
@section('content')
    <h1>Control Implementation Report</h1>
    <table class="table table-striped" width="100%" border="1">
        <thead>
        <tr>
            <th>In Scope Standard</th>
            <th>Control Count</th>
            <th>Implementation Count</th>
        </tr>
        </thead>
        <tbody>
        @foreach($inScopeStandards as $inScopeStandard)
            <tr>
                <td>{{ $inScopeStandard->name }}</td>
                <td align="center">{{ $inScopeStandard->controls->count() }}</td>
                @php
                    $implementationCount = 0;
                    foreach ($inScopeStandard->controls as $control) {
                        $implementationCount += $control->implementations->count();
                    }
                @endphp
                <td align="center">{{$implementationCount}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{--    <table border="1px" style="table-layout:fixed;" width="100%">--}}
    {{--        <tr>--}}
    {{--            <th style="width:5%;">5%</th>--}}
    {{--            <th style="width:10%;">10%</th>--}}
    {{--            <th style="width:25%;">25%</th>--}}
    {{--            <th style="width:60%;">60%</th>--}}
    {{--        </tr>--}}
    {{--    </table>--}}


    </div>

    <div class="page-break"></div>
    <h1>Page 2</h1>
    {{--<h1>{{ $title }}</h1>--}}
    <p>This is a PDF generated using Laravel Dompdf.</p>
@endsection
