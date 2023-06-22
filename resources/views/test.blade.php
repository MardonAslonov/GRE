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
                <a href="{{ route('logout') }}" class="btn btn-outline-dark px-1">chiqish <i
                        class="bi bi-door-open-fill"></i></a>
            </div>
        </div>
    </nav>
    <div class="container mt-3  px-1">
        <?php $a = 1; ?>
        <?php $currentTest = $testArrayNumber + 1; ?>
        @while ($a <= $count)
            <?php $b = 0; ?>

            @foreach ($numbersOfHasAnswer as $item)
                @if ($a == $item->numberQuestion)
                    <a
                        href="{{ route('startSelect', ['id' => $id, 'testArrayNumber' => $a - 1, 'number' => $number]) }}"><button
                            type="button" class="btn btn-success px-1 mt-1">{{ $a }}</button></a>
                    <?php $b = 1; ?>
                @endif
            @endforeach

            @if ($b == 0)
                <a href="{{ route('startSelect', ['id' => $id, 'testArrayNumber' => $a - 1, 'number' => $number]) }}"><button
                        type="button" class="btn btn-outline-secondary px-1 mt-1">{{ $a }}</button></a>
            @endif
            <?php $a++; ?>
        @endwhile

    </div>
    <div class="container mt-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-10 col-lg-10">
                <div class="border">
                    <div class="question bg-white p-3 border-bottom">
                        <div class="d-flex flex-row justify-content-between align-items-center mcq">
                            <h4>{{ $number }}</h4>
                            <h6><span>({{ $currentTest = $testArrayNumber + 1 }}/ 100 )</span></h6>
                        </div>
                    </div>
                    <div class="question bg-white p-3 border-bottom">
                        <div class="d-flex flex-row align-items-center question-title">
                            <img class="img-thumbnail rounded mx-auto d-block"
                                src="{{ asset('storage/test/' . $nameImage) }}" alt="" />
                        </div>
                        <br>
                        <form action="{{ route('answerUser') }}">
                            @csrf
                            <input type="radio" name="answerUser" value="{{ old('A') }}" required>
                            <label>A</label><br>
                            <input type="radio" name="answerUser" value="{{ old('B') }}" required>
                            <label>B</label><br>
                            <input type="radio" name="answerUser" value="{{ old('C') }}" required>
                            <label>C</label><br>
                            <input type="radio" name="answerUser" value="{{ old('D') }}" required>
                            <label>D</label><br>
                            <input type="radio" name="answerUser" value="{{ old('E') }}" required>
                            <label>E</label><br><br>
                            <input type="hidden" name="id" value={{ $id }}>
                            <input type="hidden" name="testArrayNumber" value={{ $testArrayNumber }}>
                            <input type="hidden" name="number" value={{ $number }}>
                            <input type="hidden" name="answer" value={{ $answer }}>
                            <input type="submit" class="btn btn-outline-primary" value="Javob berish">
                        </form>
                    </div>
                    <div class="d-flex flex-row justify-content-between align-items-center p-3 bg-white">
                        <div class="text-center"><a class="btn btn-primary d-flex align-items-center btn-danger"
                                href="{{ route('previousQuestion', ['id' => $id, 'testArrayNumber' => $testArrayNumber, 'number' => $number]) }}">Oldingi</a>
                        </div>
                        <div class="text-center"><a class="btn btn-primary d-flex align-items-center btn-success"
                                href="{{ route('nextQuestion', ['id' => $id, 'testArrayNumber' => $testArrayNumber, 'number' => $number]) }}">Keyingi</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
</body>

</html>
