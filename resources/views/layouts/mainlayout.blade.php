<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan | @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Tambahkan di dalam <head> -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<style>
    .main {
        height: 100vh;

    }

    .sidebar {
        background-color: whitesmoke;
        color: black;
    }


    .sidebar a {
        color: black;
        text-decoration: none;
        display: block;
        padding: 20px;
    }

    .sidebar a:hover {
        background-color: white;
    }

    .sidebar form {
        padding: 20px;
    }

    .active {
        background-color: lightgray;
        border-right: solid 8px grey;
    }
</style>

<body>
    <div class="main d-flex flex-column justify-content-between">
        <nav class="navbar navbar-dark navbar-expand-lg navbar-light bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Perpustakaan</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

            </div>
        </nav>

        <div class="body-content h-100">
            <div class="row g-0 h-100">
                <div class="sidebar col-lg-2 collapse d-lg-block" id="navbarSupportedContent">
                    <a href="/dashboard" @if (request()->route()->uri == 'dashboard') class ='active' @endif>Dashboard</a>

                    <a href="/books" @if (request()->route()->uri == 'books' ||
                            request()->route()->uri == 'book-add' ||
                            request()->route()->uri == 'book-deleted' ||
                            request()->route()->uri == 'book-edit/{slug}' ||
                            request()->route()->uri == 'book-delete/{slug}') class ='active' @endif>Buku</a>

                    <a href="/categories" @if (request()->route()->uri == 'categories' ||
                            request()->route()->uri == 'category-add' ||
                            request()->route()->uri == 'category-deleted' ||
                            request()->route()->uri == 'category-edit/{slug}' ||
                            request()->route()->uri == 'category-delete/{slug}') class ='active' @endif>Kategori</a>

                    <a href="/anggotas" @if (request()->route()->uri == 'anggotas') class ='active' @endif>Anggota</a>

                    <a href="/rent-logs"@if (request()->route()->uri == 'rent-logs') class ='active' @endif>Rent Log</a>

                    <a href="/rent-forms"@if (request()->route()->uri == 'rent-forms') class ='active' @endif>Rent Forms</a>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger ">Logout</button>
                    </form>


                </div>
                <div class="content p-5 col-lg-10">
                    @yield('content')
                </div>

            </div>
        </div>

    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
