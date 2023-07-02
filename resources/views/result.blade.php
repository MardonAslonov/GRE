<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <title>GRE test</title>
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
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                </ul>
                <button class="btn btn-outline-dark me-md-2" type="text">
                    {{ Auth::User()->name }}
                    <i class="bi bi-person-fill"></i>
                </button>
                <a href="{{ route('logout') }}" class="btn btn-outline-dark me-md-2 px-1">chiqish <i
                        class="bi bi-door-open-fill"></i></a>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-5 col-lg-4">
                <div class="border">
                    <h6>
                        <div class="question bg-white p-2 border-bottom">
                            Ism familiya: {{ Auth::User()->name }} {{ Auth::User()->surname }}
                        </div>
                        <div class="question bg-white p-2 border-bottom">
                            Variant: {{ $number }}
                        </div>
                        <div class="question bg-white p-2 border-bottom">
                            To'g'ri: {{ $correctAnswerAmount }} ta
                        </div>
                        <div class="question bg-white p-2 border-bottom">
                            Noto'g'ri: {{ $incorrectAnswerAmount }} ta
                        </div>
                        <div class="question bg-white p-2 border-bottom">
                            Ishlanmagan: {{ $noAnswerAmount = 100 - ($correctAnswerAmount + $incorrectAnswerAmount) }}
                            ta
                        </div>
                        <div class="question bg-white p-2">
                            Raw Scores: <br><br>
                            <h4>{{ $rawScores }}</h4>
                        </div>
                    </h6>
                </div>
                <br>
                <div class="d-grid gap-2 col-12 mx-auto">
                    <a class="btn btn-outline-primary"
                        href="{{ route('numberIncorrect', ['user_id' => Auth::User()->id, 'number' => $number]) }}"
                        role="button">Batafsil
                        <i class="bi bi-file-check-fill"></i>
                    </a>
                </div>
                <br>
                <div class="d-grid gap-2 col-12 mx-auto">
                    <a class="btn btn-outline-dark" href="{{ route('ratingEndPage', $number) }}" role="button">Reyting
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-list-columns-reverse" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M0 .5A.5.5 0 0 1 .5 0h2a.5.5 0 0 1 0 1h-2A.5.5 0 0 1 0 .5Zm4 0a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1h-10A.5.5 0 0 1 4 .5Zm-4 2A.5.5 0 0 1 .5 2h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5Zm-4 2A.5.5 0 0 1 .5 4h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5Zm-4 2A.5.5 0 0 1 .5 6h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1h-8a.5.5 0 0 1-.5-.5Zm-4 2A.5.5 0 0 1 .5 8h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1h-8a.5.5 0 0 1-.5-.5Zm-4 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1h-10a.5.5 0 0 1-.5-.5Zm-4 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5Zm-4 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5Z" />
                        </svg>
                    </a>
                </div>
            </div>

            <div class="col-md-5 col-lg-5">
                <table class="table table-bordered border-primary">
                    <thead>
                        <tr>
                            <th scope="col" colspan="4" class="text-center">Balni bilish jadvali</th>
                        </tr>
                        <tr>
                            <th scope="col" class="text-center">Ball</th>
                            <th scope="col" class="text-center">Form A<br>(Raw Scores)</th>
                            <th scope="col" class="text-center">Form B <br>(Raw Scores)</th>
                            <th scope="col" class="text-center">Form C <br>(Raw Scores)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">900</th>
                            <td class="text-center">
                                <h4>73</h4>
                            </td>
                            <td class="text-center">
                                <h4>68-69</h4>
                            </td>
                            <td class="text-center">
                                <h4>64</h4>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">800</th>
                            <td class="text-center">
                                <h4>58-59</h4>
                            </td>
                            <td class="text-center">
                                <h4>54-55</h4>
                            </td>
                            <td class="text-center">
                                <h4>50</h4>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">700</th>
                            <td class="text-center">
                                <h4>44</h4>
                            </td>
                            <td class="text-center">
                                <h4>41</h4>
                            </td>
                            <td class="text-center">
                                <h4>38</h4>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">600</th>
                            <td class="text-center">
                                <h4>30</h4>
                            </td>
                            <td class="text-center">
                                <h4>27</h4>
                            </td>
                            <td class="text-center">
                                <h4>27</h4>
                            </td>
                        </tr>
                        <tr>
                            <th colspan="4" scope="row" class="text-center"><br>Raw Scores = To'g'ri - ( Noto'g'ri
                                / 4
                                ) <br><br></th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{ Auth::logout() }}
    <br><br>
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Aslonov Mardon 2023</p>
            <p class="m-0 text-center text-white"><i class="bi bi-telephone"></i> +998(99) 895-59-91</p>
            <p class="m-0 text-center text-white">
                <i class="bi bi-telegram"></i> @Aslonov_Mardon
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
        <div class="container">
            <p class="m-0 text-center text-white"><i class="bi bi-credit-card-fill"></i> Faoliyatimiz rivoji uchun
                sababchi bo'lmoqchi bo'lsangiz: 8600 0529 5273 8605</p>
        </div>
    </footer>
</body>

</html>
