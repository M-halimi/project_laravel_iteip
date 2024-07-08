<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Quixlab - Bootstrap Admin Dashboard Template by Themefisher.com</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('asset/images/favicon.png') }}">
    <!-- Pignose Calender -->
    <link href="{{ asset('asset/plugins/pg-calendar/css/pignose.calendar.min.css') }}" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="./plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="./plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    {{-- table link --}}
    <link rel="stylesheet" href="{{ asset('asset/plugins/tables/css/datatable/dataTables.bootstrap4.min.css') }}">
    <!-- Custom Stylesheet -->
    <link href="{{ asset('asset/css/style.css') }}" rel="stylesheet">
    {{-- model css --}}
    <link href="{{ asset('asset/plugins/summernote/dist/summernote.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https:/use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- fullCalendar -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fullcalendar/main.css') }}">
    <!-- Theme style -->


</head>

<body>


    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3"
                    stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        {{-- <div class="row"> --}}
        {{-- @include('admin.navbaer.nav') --}}
        {{-- </div>x --}}
        @include('admin.navbaer.nav')                                           
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->

        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        @if (Auth::user()->type === 'Etudiant')
            {{-- include sidebar  Etudiant --}}
            @include('etudiant.sidebaer.sidebaer')
        @elseif(Auth::user()->type === 'Stagiaire')
            {{-- include sidebar Stagiaire --}}
            <h2>stager</h2>
        @elseif(Auth::user()->type === 'Enseignant')
            @include('enseignant.saidebaer.saidebaer')
            {{-- include sidebar Enseignant --}}
        @elseif(Auth::user()->type === 'admin')
            @include('admin.sidebaer.sidebaer')
        @endif
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->

        <div class="content-body">
            <div class="row">
                <div class="container" align='center' style="width: 350px;  border-raduis:90px 85px">
                    @include('admin.flashbag.flashbag')
                </div>
            </div>

            @yield('content')
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        @include('admin.footer.footer')
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="{{ asset('asset/plugins/common/common.min.js') }}"></script>
    <script src="{{ asset('asset/js/custom.min.js') }}"></script>
    <script src="{{ asset('asset/js/settings.js') }}"></script>
    <script src="{{ asset('asset/js/gleek.js') }}"></script>
    <script src="{{ asset('asset/js/styleSwitcher.js') }}"></script>

    <!-- Chartjs -->
    <script src="{{ asset('asset/plugins/chart.js/Chart.bundle.min.js') }}"></script>
    <!-- Circle progress -->
    <script src="{{ asset('asset/plugins/circle-progress/circle-progress.min.js') }}"></script>
    <!-- Datamap -->
    <script src="{{ asset('asset/plugins/d3v3/index.js') }}"></script>
    <script src="{{ asset('asset/plugins/topojson/topojson.min.js') }}"></script>
    <script src="{{ asset('asset/plugins/datamaps/datamaps.world.min.js') }}"></script>
    <!-- Morrisjs -->
    <script src="{{ asset('asset/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('asset/plugins/morris/morris.min.js') }}"></script>
    <!-- Pignose Calender -->
    <script src="{{ asset('asset/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('asset/plugins/pg-calendar/js/pignose.calendar.min.js') }}"></script>
    <!-- ChartistJS -->
    <script src="{{ asset('asset/plugins/chartist/js/chartist.min.js') }}"></script>
    <script src="{{ asset('asset/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js') }}"></script>

    {{-- table script --}}
    <script src="{{ asset('asset/plugins/tables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('asset/plugins/tables/js/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('asset/plugins/tables/js/datatable-init/datatable-basic.min.js') }}"></script>

    <script src="{{ asset('asset/plugins/summernote/dist/summernote.min.js') }}"></script>
    <script src="{{ asset('asset/plugins/summernote/dist/summernote-init.js') }}"></script>


    <script src="{{ asset('asset/js/dashboard/dashboard-1.js') }}"></script>
    <script src="{{ asset('asset/plugins/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('asset/plugins/validation/jquery.validate-init.js') }}"></script>
    {{-- SCRIPT VERIF --}}
    <!-- fullCalendar 2.2.5 -->
    <script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/fullcalendar/main.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset("assets/plugins/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
    <!-- jQuery UI -->
    <script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script>
        $(function () {

          /* initialize the external events
           -----------------------------------------------------------------*/
          function ini_events(ele) {
            ele.each(function () {

              // create an Event Object (https://fullcalendar.io/docs/event-object)
              // it doesn't need to have a start or end
              var eventObject = {
                title: $.trim($(this).text()) // use the element's text as the event title
              }

              // store the Event Object in the DOM element so we can get to it later
              $(this).data('eventObject', eventObject)

              // make the event draggable using jQuery UI
              $(this).draggable({
                zIndex        : 1070,
                revert        : true, // will cause the event to go back to its
                revertDuration: 0  //  original position after the drag
              })

            })
          }

          ini_events($('#external-events div.external-event'))

          /* initialize the calendar
           -----------------------------------------------------------------*/
          //Date for the calendar events (dummy data)
          var date = new Date()
          var d    = date.getDate(),
              m    = date.getMonth(),
              y    = date.getFullYear()

          var Calendar = FullCalendar.Calendar;
          var Draggable = FullCalendar.Draggable;

          var containerEl = document.getElementById('external-events');
          var checkbox = document.getElementById('drop-remove');
          var calendarEl = document.getElementById('calendar');

          // initialize the external events
          // -----------------------------------------------------------------

          new Draggable(containerEl, {
            itemSelector: '.external-event',
            eventData: function(eventEl) {
              return {
                title: eventEl.innerText,
                backgroundColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
                borderColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
                textColor: window.getComputedStyle( eventEl ,null).getPropertyValue('color'),
              };
            }
          });

          var calendar = new Calendar(calendarEl, {
            headerToolbar: {
              left  : 'prev,next today',
              center: 'title',
              right : 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            themeSystem: 'bootstrap',
            //Random default events
            events: [
              {
                title          : 'All Day Event',
                start          : new Date(y, m, 1),
                backgroundColor: '#f56954', //red
                borderColor    : '#f56954', //red
                allDay         : true
              },
              {
                title          : 'Long Event',
                start          : new Date(y, m, d - 5),
                end            : new Date(y, m, d - 2),
                backgroundColor: '#f39c12', //yellow
                borderColor    : '#f39c12' //yellow
              },
              {
                title          : 'Meeting',
                start          : new Date(y, m, d, 10, 30),
                allDay         : false,
                backgroundColor: '#0073b7', //Blue
                borderColor    : '#0073b7' //Blue
              },
              {
                title          : 'Lunch',
                start          : new Date(y, m, d, 12, 0),
                end            : new Date(y, m, d, 14, 0),
                allDay         : false,
                backgroundColor: '#00c0ef', //Info (aqua)
                borderColor    : '#00c0ef' //Info (aqua)
              },
              {
                title          : 'Birthday Party',
                start          : new Date(y, m, d + 1, 19, 0),
                end            : new Date(y, m, d + 1, 22, 30),
                allDay         : false,
                backgroundColor: '#00a65a', //Success (green)
                borderColor    : '#00a65a' //Success (green)
              },
              {
                title          : 'Click for Google',
                start          : new Date(y, m, 28),
                end            : new Date(y, m, 29),
                url            : 'https://www.google.com/',
                backgroundColor: '#3c8dbc', //Primary (light-blue)
                borderColor    : '#3c8dbc' //Primary (light-blue)
              }
            ],
            editable  : true,
            droppable : true, // this allows things to be dropped onto the calendar !!!
            drop      : function(info) {
              // is the "remove after drop" checkbox checked?
              if (checkbox.checked) {
                // if so, remove the element from the "Draggable Events" list
                info.draggedEl.parentNode.removeChild(info.draggedEl);
              }
            }
          });

          calendar.render();
          // $('#calendar').fullCalendar()

          /* ADDING EVENTS */
          var currColor = '#3c8dbc' //Red by default
          // Color chooser button
          $('#color-chooser > li > a').click(function (e) {
            e.preventDefault()
            // Save color
            currColor = $(this).css('color')
            // Add color effect to button
            $('#add-new-event').css({
              'background-color': currColor,
              'border-color'    : currColor
            })
          })
          $('#add-new-event').click(function (e) {
            e.preventDefault()
            // Get value and make sure it is not null
            var val = $('#new-event').val()
            if (val.length == 0) {
              return
            }

            // Create events
            var event = $('<div />')
            event.css({
              'background-color': currColor,
              'border-color'    : currColor,
              'color'           : '#fff'
            }).addClass('external-event')
            event.text(val)
            $('#external-events').prepend(event)

            // Add draggable funtionality
            ini_events(event)

            // Remove event from text input
            $('#new-event').val('')
          })
        })
      </script>
</body>

</html>
