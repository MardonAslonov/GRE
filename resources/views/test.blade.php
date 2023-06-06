<!DOCTYPE html>
<html lang="en">

<head>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>GRE test</title>


    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
</head>

<body>
    <div class="container mt-5  px-1">
        <?php $a = 1; ?>

        <?php $b = 35; ?>


        @while ($a <= $count)
            @if ($a == $id)
                <a href="{{ route('startSelect', $a) }}"><button type="button"
                        class="btn btn-secondary px-1 mt-1">{{ $a++ }}</button></a>
            @else
                <a href="{{ route('startSelect', $a) }}"><button type="button"
                        class="btn btn-outline-secondary px-1 mt-1">{{ $a++ }}</button></a>
            @endif
        @endwhile

        {{-- @foreach ($count as $con)
            <button type="button" class="btn btn-outline-secondary">{{ $a++ }}</button>
        @endforeach --}}
    </div>
    <div class="container mt-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-10 col-lg-10">
                <div class="border">
                    <div class="question bg-white p-3 border-bottom">
                        <div class="d-flex flex-row justify-content-between align-items-center mcq">
                            <h4>GR-1776</h4><span>( {{ $id }} / 100 )</span>
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
                            <img class="img-thumbnail rounded mx-auto d-block" src="{{ asset('storage/' . $image) }}"
                                alt="" />
                        </div>
                        <br>
                        <div class="ans ml-2">
                            <label class="radio"> <input type="radio" name="brazil" value="brazil">
                                <span>A</span>
                            </label>
                        </div>
                        <div class="ans ml-2">
                            <label class="radio"> <input type="radio" name="brazil" value="brazil">
                                <span>B</span>
                            </label>
                        </div>
                        <div class="ans ml-2">
                            <label class="radio"> <input type="radio" name="brazil" value="brazil">
                                <span>C</span>
                            </label>
                        </div>
                        <div class="ans ml-2">
                            <label class="radio"> <input type="radio" name="brazil" value="brazil">
                                <span>D</span>
                            </label>
                        </div>
                        <div class="ans ml-2">
                            <label class="radio"> <input type="radio" name="brazil" value="brazil">
                                <span>E</span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex flex-row justify-content-between align-items-center p-3 bg-white">
                        <div class="text-center"><a class="btn btn-primary d-flex align-items-center btn-danger"
                                href="{{ route('previousQuestion', ['id' => $id, 'count' => $count]) }}">Oldingi</a>
                        </div>
                        <div class="text-center"><a class="btn btn-primary d-flex align-items-center btn-success"
                                href="{{ route('nextQuestion', ['id' => $id, 'count' => $count]) }}">Keyingi</a>
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
