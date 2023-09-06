<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>Secondary Online clearance</title>
        <link rel="shortcut icon" href="{{ URL::to('graduate.png') }}">
        <!-- Scripts -->
        <script src="{{asset('jquery-3.7.0.min.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
        <script src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js" defer></script>
        <link rel="stylesheet" href="{{ URL::to('assets/css/custom.css') }}">
        <link rel="stylesheet" href="{{ URL::to('assets/plugins/fontawesome/css/all.min.css') }}">
        
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
        {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}
        
        <!-- Styles -->
        {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">

        <link rel="stylesheet" href="{{asset('assets/plugins/datatables/datatables.min.css')}}">

        
        
        <!-- Icons -->
        <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
        <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

        @yield('styles')
        
        <!-- Small Ionicons Fixes for AdminLTE -->
        <style>
        html {
            background-color: #f4f6f9;
        }
        
        .nav-icon.icon:before {
            width: 25px;
        }

        .bg-primary{
            background: #0f0f0f !important;
        }

        .content-wrapper {
            background-color: #505459 !important;
        }
        .small-box {
            border-radius: 0px;
        }

        .btn-primary {
    color: #fff;
    background-color: #000000;
    border-color: #cacaca;
}

.btn-primary:hover {
    color: #ffffff;
    background-color: #0000007b;
    border-color: #c3bebe;
}


a.disabled {
    pointer-events: none;
    color: #6c757d;
}

/* print-styles.css */
@media print {
  #printable_div {
    /* Add your A4 print styles here */
   /* width: 210mm; /* Width of A4 paper */
    /*height: 297mm; /* Height of A4 paper */
  }
}

        </style>

    </head>
    
    <body class="sidebar-mini layout-fixed layout-navbar-fixed ">
        <div id="app" class="wrapper">
            <div class="main-header">
                @include('layouts.nav')
            </div>
        
            @include('layouts.sidebar')
        
            <main class="content-wrapper p-5">
                @yield('content')
            </main>
        </div>

        @include('layouts.footer')

        @stack('modals')
        
        @stack('scripts')
        
        <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
        <script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('assets/plugins/datatables/datatables.min.js')}}"></script>
        
        @if (session()->has('success')) 
        <script>
            var notyf = new Notyf({dismissible: true, position: {x: 'right', y: 'top'}})
            notyf.success('{{ session('success') }}')
        </script> 
        @endif
          @if (session()->has('error')) 
        <script>
            var notyf = new Notyf({dismissible: true, position: {x: 'right', y: 'top'}})
            notyf.error('{{ session('error') }}')
        </script> 
        @endif

        <script>
            /* Simple Alpine Image Viewer */
            document.addEventListener('alpine:init', () => {
                Alpine.data('imageViewer', (src = '') => {
                    return {
                        imageUrl: src,
        
                        refreshUrl() {
                            this.imageUrl = this.$el.getAttribute("image-url")
                        },
        
                        fileChosen(event) {
                            this.fileToDataUrl(event, src => this.imageUrl = src)
                        },
        
                        fileToDataUrl(event, callback) {
                            if (! event.target.files.length) return
        
                            let file = event.target.files[0],
                                reader = new FileReader()
        
                            reader.readAsDataURL(file)
                            reader.onload = e => callback(e.target.result)
                        },
                    }
                })
            })
        </script>
        <script>
            //initialize datatable
            $('#myTable').DataTable();

        </script>
  
</body>
</html>