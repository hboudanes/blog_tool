<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>
    <!-- Place the first <script> tag in your HTML's <head> -->
        <script src="https://cdn.tiny.cloud/1/h311yfxr24sy3lv1xgdfakewg521gyjnw916rdvifjpqnr24/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

    <!-- Custom fonts for this template-->
    @vite(['resources/fontawesome-free/css/all.min.css','resources/js/app.js'])

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/sb-admin-2.min.css'])
</head>

<body id="page-top">

    @yield('childContent')

    <!-- Bootstrap core JavaScript-->
    @vite(['resources/js/jquery-3.6.0.min.js', 'resources/jquery-easing/jquery.easing.min.js','resources/chart.js/Chart.min.js','resources/js/sb-admin-2.min.js','resources/js/demo/chart-area-demo.js','resources/js/demo/chart-pie-demo.js'])
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
   

</body>

</html>
