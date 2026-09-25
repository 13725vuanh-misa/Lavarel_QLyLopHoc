<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>@yield('title')</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* HEADER */
        header {
            height: 70px;
            background-color: #2c3e50;
            color: white;
            display: flex;
            align-items: center;
            padding: 0 30px;
        }

        header h1 {
            font-size: 24px;
        }

        /* PHẦN GIỮA */
        .main-container {
            display: flex;
            flex: 1;
            min-height: 500px;
        }

        /* SIDEBAR */
        .sidebar {
            width: 220px;
            background-color: #34495e;
            color: white;
            padding: 20px;
        }

        .sidebar h2 {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .sidebar ul {
            list-style: none;
        }

        .sidebar li {
            margin-bottom: 10px;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px;
            border-radius: 5px;
        }

        .sidebar a:hover {
            background-color: #2c3e50;
        }

        /* CONTENT */
        .content {
            flex: 1;
            padding: 30px;
            background-color: #ecf0f1;
        }

        .content h2 {
            margin-bottom: 15px;
        }

        /* FOOTER */
        footer {
            height: 60px;
            background-color: #2c3e50;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
    @stack('styles')
</head>

<body>

    <!-- HEADER -->
    @include('partial.header')

    <!-- SIDEBAR + CONTENT -->
    <div class="main-container">

        @include('partial.sidebar')

        <!-- CONTENT -->
        <main class="content">
            @yield('content')
        </main>

    </div>

    <!-- FOOTER -->
    @include('partial.footer')

</body>
</html>

