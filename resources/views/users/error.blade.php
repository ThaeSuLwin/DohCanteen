<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Not Found</title>
    <link rel="shortcut icon" href="assets/img/favicon.png">
    <link rel="apple-touch-icon" href="assets/img/favicon_60x60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/favicon_76x76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/img/favicon_120x120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/img/favicon_152x152.png">

    <!-- Fonts -->
    <!-- <link href="{{ asset('https://fonts.googleapis.com/css2?family=Oswald:wght@400;700&family=Raleway:wght@100;200;400;500&display=swap')}}" rel="stylesheet"> -->

    <!-- CSS Core -->
    <link rel="stylesheet" href="{{ asset ('dist/css/core.css')}}" />

    <!-- CSS Theme -->
    <link id="theme" rel="stylesheet" href="{{ asset ('dist/css/theme-beige.css')}}" />

</head>
<body>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 style="color:red"> 404 Error Page</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                  <li  class="breadcrumb-item active">404 Error Page</li>
                </ol>
              </div>
                 <div class="error-content">
                  <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Page not found.</h3>

                  <p>
                    We could not find the page you were looking for.
                    Meanwhile, you may <a href="{{ url('/') }}">return to dashboard</a> or try using the search form.
                  </p>

              
                </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>
      </div>
</body>
</html>