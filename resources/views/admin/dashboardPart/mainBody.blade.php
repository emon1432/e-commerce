<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Twitter -->
  <meta name="twitter:site" content="@themepixels">
  <meta name="twitter:creator" content="@themepixels">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Starlight">
  <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
  <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

  <!-- Facebook -->
  <meta property="og:url" content="http://themepixels.me/starlight">
  <meta property="og:title" content="Starlight">
  <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

  <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
  <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
  <meta property="og:image:type" content="image/png">
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="600">

  <!-- Meta -->
  <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
  <meta name="author" content="ThemePixels">

  <title>Dashboard</title>

  <!-- vendor css -->
  <link href="{{asset('backend/lib/font-awesome/css/font-awesome.css')}} " rel="stylesheet">
  <link href="{{asset('backend/lib/Ionicons/css/ionicons.css')}} " rel="stylesheet">
  <link href="{{asset('backend/lib/perfect-scrollbar/css/perfect-scrollbar.css')}} " rel="stylesheet">
  <link href="{{asset('backend/lib/rickshaw/rickshaw.min.css')}} " rel="stylesheet">
  <!-- Table css -->
  <link href="{{asset('backend/lib/highlightjs/github.css')}} " rel="stylesheet">
  <link href="{{asset('backend/lib/datatables/jquery.dataTables.css')}} " rel="stylesheet">
  <link href="{{asset('backend/lib/select2/css/select2.min.css')}} " rel="stylesheet">

  <!-- Starlight CSS -->
  <link rel="stylesheet" href="{{asset('backend/css/starlight.css')}} ">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />

  <script src="{{asset('backend/lib/jquery/jquery.js')}} "></script>



</head>

<body>


  @include('admin.dashboardPart.leftSidebar')

  @include('admin.dashboardPart.header')

  @include('admin.dashboardPart.rightSidebar')


  <!-- ########## START: MAIN PANEL ########## -->
  <div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Starlight</a>
      <span class="breadcrumb-item active">Dashboard</span>
    </nav>

    @yield('mainBody')

    @include('admin.dashboardPart.footer')
  </div><!-- sl-mainpanel -->
  <!-- ########## END: MAIN PANEL ########## -->

  <script src="{{asset('backend/js/dashboard.js')}} "></script>

  <script src="{{asset('backend/lib/jquery/jquery.js')}} "></script>

  <script src="{{asset('backend/lib/popper.js/popper.js')}} "></script>
  <script src="{{asset('backend/lib/bootstrap/bootstrap.js')}} "></script>
  <script src="{{asset('backend/lib/jquery-ui/jquery-ui.js')}} "></script>
  <script src="{{asset('backend/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js')}} "></script>
  <script src="{{asset('backend/lib/jquery.sparkline.bower/jquery.sparkline.min.js')}} "></script>
  <script src="{{asset('backend/lib/d3/d3.js')}} "></script>
  <script src="{{asset('backend/lib/rickshaw/rickshaw.min.js')}} "></script>
  <script src="{{asset('backend/lib/chart.js/Chart.js')}} "></script>
  <script src="{{asset('backend/lib/Flot/jquery.flot.js')}} "></script>
  <script src="{{asset('backend/lib/Flot/jquery.flot.pie.js')}} "></script>
  <script src="{{asset('backend/lib/Flot/jquery.flot.resize.js')}} "></script>
  <script src="{{asset('backend/lib/flot-spline/jquery.flot.spline.js')}} "></script>
  <script src="{{asset('backend/lib/highlightjs/highlight.pack.js')}} "></script>
  <script src="{{asset('backend/lib/datatables/jquery.dataTables.js')}} "></script>
  <script src="{{asset('backend/lib/datatables-responsive/dataTables.responsive.js')}} "></script>
  <script src="{{asset('backend/lib/select2/js/select2.min.js')}} "></script>
  <script src="{{asset('backend/js/starlight.js')}} "></script>
  <script src="{{asset('backend/js/ResizeSensor.js')}} "></script>


  <script src="{{ asset('https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js')}}"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>



  <!-- <script src="{{asset('backend/lib/jquery/jquery.js')}} "></script>
  <script src="{{asset('backend/lib/popper.js/popper.js')}} "></script>
  <script src="{{asset('backend/lib/bootstrap/bootstrap.js')}} "></script>
  <script src="{{asset('backend/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js')}} "></script> 
  <script src="{{asset('backend/lib/highlightjs/highlight.pack.js')}} "></script>
  <script src="{{asset('backend/lib/datatables/jquery.dataTables.js')}} "></script>
  <script src="{{asset('backend/lib/datatables-responsive/dataTables.responsive.js')}} "></script>
  <script src="{{asset('backend/lib/select2/js/select2.min.js')}} "></script>
  <script src="{{asset('backend/js/starlight.js')}} "></script>  -->


  <script>
    $(function() {
      'use strict';

      $('#datatable1').DataTable({
        responsive: true,
        language: {
          searchPlaceholder: 'Search...',
          sSearch: '',
          lengthMenu: '_MENU_ items/page',
        }
      });

      $('#datatable2').DataTable({
        bLengthChange: false,
        searching: false,
        responsive: true
      });

      // Select2
      $('.dataTables_length select').select2({
        minimumResultsForSearch: Infinity
      });

    });
  </script>

  <script>
    $(document).on("click", "#delete", function(e) {
      e.preventDefault();
      var link = $(this).attr("href");
      swal({
          title: "Are you want to delete?",
          text: "Once Delete, This will be Permanently Delete!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            window.location.href = link;
          } else {
            swal("Safe Data!");
          }
        });
    });
  </script>

<script type="text/javascript">
        @if(Session::has('message'))
        var type = "{{ Session::get('alert-type','info')}}"
        switch(type) {
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;

            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;

            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;

            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
        @endif
    </script>



</body>

</html>