<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        @if (!Auth::guest())
                        <li><a href="/home">Home</a></li>
                        <li><a href="/campain/create">Campain</a></li>
                        <li><a href="/contactNumber">Contact Number</a></li>
                        @endif    
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                           
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        // number of character each sms
        n = 128;
        function calculateCountMultiple() {
            // get value from input text area using id
            input_character = document.getElementById('inputCharacterMultiple')
            // remaining character numbers will show here
            remain_character = document.getElementById('remainCharacterMultiple')
            // conunt number of minimum sms need to send
            number_of_sms = parseInt(1+parseInt(input_character.value.length)/n) 
            // count remaining number of letters to add extra sms
            num_of_character_remaining_on_this_message = n - parseInt(input_character.value.length)%n
            // display result
            remain_character.innerHTML =  num_of_character_remaining_on_this_message + "/" + number_of_sms;
        }
    </script>
    <script src="http://docs.handsontable.com/0.32.0/bower_components/handsontable/dist/handsontable.full.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <link type="text/css" rel="stylesheet" href="http://docs.handsontable.com/0.32.0/bower_components/handsontable/dist/handsontable.full.min.css">
    <script>
    document.addEventListener("DOMContentLoaded", function() {

  var
    data = [
      ['', ''],
    ],
    container1 = document.getElementById('example1'),
    hot1;
  
  hot1 = new Handsontable(container1, {
    colHeaders: [
                            'Name',
                            'Number',
                        ],
    data: data,
    startCols: 2,
    minSpareRows: 1,
    minSpareColumns: 0,
    stretchH: 'all',
    autoWrapRow: true,
  });
  
  function bindDumpButton() {
      if (typeof Handsontable === "undefined") {
        return;
      }
  
      Handsontable.dom.addEvent(document.body, 'click', function (e) {
  
        var element = e.target || e.srcElement;
  
        if (element.nodeName == "BUTTON" && element.name == 'dump') {
          var name = element.getAttribute('data-dump');
          var instance = element.getAttribute('data-instance');
          var hot = window[instance];
          console.log('data of ' + name, hot.getData());
        }
      });
    }
  bindDumpButton();
  $("#save").click(function () {
               
                $("#value").val(JSON.stringify({data: hot1.getData()}));
                 $('data_form').submit()
            });

});
</script>
</body>
</html>
