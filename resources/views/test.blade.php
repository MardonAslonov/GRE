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

                {{-- <ul>
                    <button type="button" class="btn btn-outline-warning">{{Auth::User()->name}}</button>
                      <a href="{{route('logout')}}"  class="btn btn-outline-warning">log out</a>
                  </ul> --}}

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
            @if ($a == $currentTest)
                <a href="{{ route('startSelect', $a) }}"><button type="button"
                        class="btn btn-secondary px-1 mt-1">{{ $a++ }}</button></a>
            @else
                <a href="{{ route('startSelect', $a) }}"><button type="button"
                        class="btn btn-outline-secondary px-1 mt-1">{{ $a++ }}</button></a>
            @endif
        @endwhile
    </div>
    <div class="container mt-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-10 col-lg-10">
                <div class="border">
                    <div class="question bg-white p-3 border-bottom">
                        <div class="d-flex flex-row justify-content-between align-items-center mcq">
                            <h4>{{ $number }}</h4><span>( {{ $currentTest = $testArrayNumber + 1 }} / 100 )</span>
                        </div>
                    </div>
                    {{-- <div class="m-3"></div> --}}

                    {{-- <div class="m-3"></div>
            <div class="btn-group me-2 mb-3" role="group" aria-label="First group">
                <?php $a = 1; ?>
                <?php $check = 5; ?>
            @foreach ($count as $con)
                @if ($results != null)
                    @foreach ($results as $res)
                        @if ($res->project_id == $con)
                        <input type="hidden"  {{$check=1}}>
                        @endif
                    @endforeach
                    @if ($check == 0 && $con != $project->id)
                        <a href="{{route('list',['subject_id'=>$subject->id,'project_id'=>$con ])}}"><button type="button" class="btn btn-outline-secondary">{{$a++}}</button></a>
                    @elseif($con==$project->id)
                        <a href="{{route('list',['subject_id'=>$subject->id,'project_id'=>$con ])}}"><button type="button" class="btn btn-secondary">{{$a++}}</button></a>
                    @else
                        <a href="{{route('list',['subject_id'=>$subject->id,'project_id'=>$con ])}}"><button type="button" class="btn btn-success">{{$a++}}</button></a>
                    @endif
                    <input type="hidden"  {{$check=0}}>
                @else
                        <a href="{{route('list',['subject_id'=>$subject->id,'project_id'=>$con ])}}"><button type="button" class="btn btn-outline-secondary" >{{$a++}}</button></a>
                @endif
            @endforeach
            </div> --}}
                    <div class="question bg-white p-3 border-bottom">
                        <div class="d-flex flex-row align-items-center question-title">
                            <img class="img-thumbnail rounded mx-auto d-block"
                                src="{{ asset('storage/test/' . $nameImage) }}" alt="" />
                        </div>
                        <br>
                        <form
                            action="{{ route('b', ['id' => $id, 'testArrayNumber' => $testArrayNumber, 'number' => $number]) }}">
                            <input type="radio" name="answerUser" value="A">
                            <label for="html">A</label><br>
                            <input type="radio" name="answerUser" value="B">
                            <label for="css">B</label><br>
                            <input type="radio" name="answerUser" value="C">
                            <label for="css">C</label><br>
                            <input type="radio" name="answerUser" value="D">
                            <label for="css">D</label><br>
                            <input type="radio" name="answerUser" value="E">
                            <label for="javascript">E</label><br><br>
                            <input type="submit" class="btn btn-outline-primary" value="Javob berish">
                        </form>
                        {{-- <div class="ans ml-2">
                            <label class="radio"> <input type="radio" name="name" value="A">
                                <span>A</span>
                            </label>
                        </div>
                        <div class="ans ml-2">
                            <label> <input type="radio" name="name" value="B">
                                <span>B</span>
                            </label>
                        </div>
                        <div class="ans ml-2">
                            <label class="radio"> <input type="radio" name="name" value="C">
                                <span>C</span>
                            </label>
                        </div>
                        <div class="ans ml-2">
                            <label class="radio"> <input type="radio" name="name" value="D">
                                <span>D</span>
                            </label>
                        </div>
                        <div class="ans ml-2">
                            <label class="radio"> <input type="radio" name="name" value="E">
                                <span>E</span>
                            </label>
                        </div> --}}
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
