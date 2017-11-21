<!DOCTYPE html>
<html>
    <head>
        <title>Timezone Time</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="timezone-calc-container">

                    <h4>Time Zone Converter</h4>

                    <form action="{{ route('form.timezone-form') }}" id="timezone-form" method="post">

                        <meta name="csrf-token" content="{{ csrf_token() }}"/>

                        {{--From Region--}}
                        <select name="from-region" id="from-region">
                            <option value="" disabled selected>Select a Region</option>
                            @foreach($regions as $region)
                                <option data-timezones="{{ $region['timezones'] }}"
                                        value="{{ $region['regionKey'] }}">{{ $region['regionName'] }}</option>
                            @endforeach
                        </select>

                        {{--From Time Zone--}}
                        <select name="from-zone" id="from-zone">
                            <option value="" disabled selected>Select a Time Zone</option>
                        </select>

                        {{--From Date--}}
                        <input id="from-date" name="from-date" type="date">

                        {{--From Time--}}
                        <input id="from-time" type="time" name="from-time">


                        <div class="convert-to-text"><span>Convert To Timezone:</span></div>

                        {{--To Region--}}
                        <select name="to-region" id="to-region">
                            <option value="" disabled selected>Select a Region</option>
                            @foreach($regions as $region)
                                <option data-timezones="{{ $region['timezones'] }}"
                                        value="{{ $region['regionKey'] }}">{{ $region['regionName'] }}</option>
                            @endforeach
                        </select>

                        {{--To Zone--}}
                        <select name="to-zone" id="to-zone">
                            <option value="" disabled selected>Select a Time Zone</option>
                        </select>

                        <input type="submit" value="Convert">

                    </form>

                    <div class="timezone-results">

                        <div class="converted-date">Converted Date Goes Here</div>

                    </div>

                </div>
            </div>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
