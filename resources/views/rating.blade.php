<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <title>Reyting</title>
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#!">GRE Subject test Fizika <i class="bi bi-emoji-smile"></i></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4"></ul>
                <a href="{{ route('home') }}" class="btn btn-outline-dark me-md-2 px-1">asosiy <i
                        class="bi bi-house-fill"></i>
                    <a href="{{ route('logout') }}" class="btn btn-outline-dark me-md-2 px-1">chiqish <i
                            class="bi bi-door-open-fill"></i></a>
            </div>
        </div>
    </nav>
    <br><br>
    <div class="container mt-5">
        <div class="justify-content-center row">
            <div class="col-md-5 col-lg-10">
                <div class="border">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th scope="col" colspan="4">{{ $number }}</th>
                            </tr>
                            <tr>
                                <th scope="col">№</th>
                                <th scope="col">Raw Scores</th>
                                <th scope="col">Ism</th>
                                <th scope="col">Familiya</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $a = 1; ?>
                            @foreach ($totals as $total)
                                <tr>
                                    <th scope="row">{{ ($totals->currentpage() - 1) * 10 + $a++ }}</th>
                                    <td>{{ $total->rawScores }}</td>
                                    <td>{{ $total->userName }}</td>
                                    <td>{{ $total->userSurname }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <br>
                {{ $totals->appends(['number' => $number])->links() }}
            </div>
        </div>
    </div>
    <br><br><br><br><br><br><br>
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Aslonov Mardon 2023</p>
            <p class="m-0 text-center text-white"><i class="bi bi-telephone"></i> +998(99) 895-59-91</p>
            <p class="m-0 text-center text-white">

                <head><i class="bi bi-telegram"></i></head> @Aslonov_Mardon
            </p>
            <div class="d-grid gap-2 d-md-block">
                <a href="https://t.me/grefizikasertifikat" class="text-white">
                    <h5><i class="bi bi-telegram me-md-2"></i><label for="">Telegram kanalimiz
                        </label></h5>
                </a>
                <a href="https://www.youtube.com/channel/UCXehua_kBCImmJzCVx8Og2g" class="text-white">
                    <h5><i class="bi bi-youtube me-md-2"></i><label for=""> YouTube sahifamiz
                        </label></h5>
                </a>
            </div>
        </div>
    </footer>
</body>

</html>
