<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>GRE Uzbekistan</title>

    <link href="assets/img/favi.png" rel="icon">
    {{-- <link href="assets/img/tel.png" rel="apple-touch-icon"> --}}
</head>

<body>

    <!-- Section: Design Block -->
    <section class="background-radial-gradient overflow-hidden">
        <style>
            .background-radial-gradient {
                background-color: hsl(218, 41%, 15%);
                background-image: radial-gradient(650px circle at 0% 0%,
                        hsl(218, 41%, 35%) 15%,
                        hsl(218, 41%, 30%) 35%,
                        hsl(218, 41%, 20%) 75%,
                        hsl(218, 41%, 19%) 80%,
                        transparent 100%),
                    radial-gradient(1250px circle at 100% 100%,
                        hsl(218, 41%, 45%) 15%,
                        hsl(218, 41%, 30%) 35%,
                        hsl(218, 41%, 20%) 75%,
                        hsl(218, 41%, 19%) 80%,
                        transparent 100%);
            }

            #radius-shape-1 {
                height: 220px;
                width: 220px;
                top: -60px;
                left: -130px;
                background: radial-gradient(#44006b, #ad1fff);
                overflow: hidden;
            }

            #radius-shape-2 {
                border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
                bottom: -60px;
                right: -110px;
                width: 300px;
                height: 300px;
                background: radial-gradient(#44006b, #ad1fff);
                overflow: hidden;
            }

            .bg-glass {
                background-color: hsla(0, 0%, 100%, 0.9) !important;
                backdrop-filter: saturate(200%) blur(25px);
            }
        </style>

        <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
            <div class="row gx-lg-5 align-items-center mb-5">
                <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
                    <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                        GRE Subject Test <br />
                        <span style="color: hsl(218, 81%, 75%)">Fizika (50% ustama) </span>
                    </h1>
                    <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
                        GRE Subject Test - bu xalqaro sertifikat hisoblanadi.
                    </p>

                    <a href="{{ route('registrPage') }}"><button type="button"
                            class="btn btn-primary btn-sm col-md-4 mb-4 justify-content-md-end">Ro'yxatdan
                            o'tish</button></a>
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                    <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                    <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

                    <br>
                    <br>
                    <div class="card bg-glass">
                        <div class="card-body px-4 py-5 px-md-5">
                            <form method="post" action="{{ route('auth') }}">
                                @csrf
                                <!-- 2 column grid layout with text inputs for the first and last names -->

                                <div class="form-outline mb-4">
                                    <input type="text" class="form-control" name="name" placeholder="Ismingiz" />
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <input type="text" class="form-control" name="password"
                                        placeholder="Parolingiz" />
                                </div>

                                <!-- Submit button -->
                                <button type="submit" class="btn btn-primary btn-sm col-md-4 mb-4">Tizimga
                                    kirish</button>
                            </form>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
