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
                        {{-- <div class="question bg-white p-2">
                            Raw Scores: <br><br>
                            <h4>{{ $rawScores }}</h4>
                        </div> --}}
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

            <div class="col-md-5 col-lg-8">
                <table class="table table-bordered border-primary">
                    <thead>
                        <tr>
                            <th scope="col" colspan="8" class="text-center">Balni bilish jadvali</th>
                        </tr>
                        <tr>
                            <th scope="col" class="text-center">To'g'ri javoblar<br>(Total Correct)</th>
                            <th scope="col" class="text-center">Ball</th>
                            <th scope="col" class="text-center">To'g'ri javoblar<br>(Total Correct)</th>
                            <th scope="col" class="text-center">Ball</th>
                            <th scope="col" class="text-center">To'g'ri javoblar<br>(Total Correct)</th>
                            <th scope="col" class="text-center">Ball</th>
                            <th scope="col" class="text-center">To'g'ri javoblar<br>(Total Correct)</th>
                            <th scope="col" class="text-center">Ball</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <th scope="row">84-100</th>
                            <th><h4>990</h4></th>
                            <th scope="row">64</th>
                            <th><h4>790</h4></th>
                            <th scope="row">43</th>
                            <th><h4>590</h4></th>
                            <th scope="row">18-19</th>
                            <th><h4>390</h4></th>
                        </tr>
                        <tr>
                            <th scope="row">83</th>
                            <th><h4>980</h4></th>
                            <th scope="row">63</th>
                            <th><h4>780</h4></th>
                            <th scope="row">42</th>
                            <th><h4>580</h4></th>
                            <th scope="row">17</th>
                            <th><h4>380</h4></th>
                        </tr>
                        <tr>
                            <th scope="row">82</th>
                            <th><h4>970</h4></th>
                            <th scope="row">62</th>
                            <th><h4>770</h4></th>
                            <th scope="row">41</th>
                            <th><h4>570</h4></th>
                            <th scope="row">16</th>
                            <th><h4>370</h4></th>
                        </tr>
                        <tr>
                            <th scope="row">81</th>
                            <th><h4>960</h4></th>
                            <th scope="row">61</th>
                            <th><h4>760</h4></th>
                            <th scope="row">40</th>
                            <th><h4>560</h4></th>
                            <th scope="row">14-15</th>
                            <th><h4>360</h4></th>
                        </tr>
                        <tr>
                            <th scope="row">80</th>
                            <th><h4>950</h4></th>
                            <th scope="row">60</th>
                            <th><h4>750</h4></th>
                            <th scope="row">38-39</th>
                            <th><h4>550</h4></th>
                            <th scope="row">13</th>
                            <th><h4>350</h4></th>
                        </tr>
                        <tr>
                            <th scope="row">79</th>
                            <th><h4>940</h4></th>
                            <th scope="row">59</th>
                            <th><h4>740</h4></th>
                            <th scope="row">37</th>
                            <th><h4>540</h4></th>
                            <th scope="row">12</th>
                            <th><h4>340</h4></th>
                        </tr>
                        <tr>
                            <th scope="row">78</th>
                            <th><h4>930</h4></th>
                            <th scope="row">58</th>
                            <th><h4>730</h4></th>
                            <th scope="row">36</th>
                            <th><h4>530</h4></th>
                            <th scope="row">11</th>
                            <th><h4>330</h4></th>
                        </tr>
                        <tr>
                            <th scope="row">77</th>
                            <th><h4>920</h4></th>
                            <th scope="row">57</th>
                            <th><h4>720</h4></th>
                            <th scope="row">35</th>
                            <th><h4>520</h4></th>
                            <th scope="row">9-10</th>
                            <th><h4>320</h4></th>
                        </tr>
                        <tr>
                            <th scope="row">76</th>
                            <th><h4>910</h4></th>
                            <th scope="row">56</th>
                            <th><h4>710</h4></th>
                            <th scope="row">33-34</th>
                            <th><h4>510</h4></th>
                            <th scope="row">8</th>
                            <th><h4>310</h4></th>
                        </tr>
                        <tr>
                            <th scope="row">75</th>
                            <th><h4>900</h4></th>
                            <th scope="row">55</th>
                            <th><h4>700</h4></th>
                            <th scope="row">32</th>
                            <th><h4>500</h4></th>
                            <th scope="row">7</th>
                            <th><h4>300</h4></th>
                        </tr>
                        <tr>
                            <th scope="row">74</th>
                            <th><h4>890</h4></th>
                            <th scope="row">54</th>
                            <th><h4>690</h4></th>
                            <th scope="row">31</th>
                            <th><h4>490</h4></th>
                            <th scope="row">6</th>
                            <th><h4>290</h4></th>
                        </tr>
                        <tr>
                            <th scope="row">73</th>
                            <th><h4>880</h4></th>
                            <th scope="row">53</th>
                            <th><h4>680</h4></th>
                            <th scope="row">30</th>
                            <th><h4>480</h4></th>
                            <th scope="row">5</th>
                            <th><h4>280</h4></th>
                        </tr>
                        <tr>
                            <th scope="row">72</th>
                            <th><h4>870</h4></th>
                            <th scope="row">52</th>
                            <th><h4>670</h4></th>
                            <th scope="row">28-29</th>
                            <th><h4>470</h4></th>
                            <th scope="row">4</th>
                            <th><h4>270</h4></th>
                        </tr>
                        <tr>
                            <th scope="row">71</th>
                            <th><h4>860</h4></th>
                            <th scope="row">51</th>
                            <th><h4>660</h4></th>
                            <th scope="row">27</th>
                            <th><h4>460</h4></th>
                            <th scope="row">1-3</th>
                            <th><h4>260</h4></th>
                        </tr>
                        <tr>
                            <th scope="row">70</th>
                            <th><h4>850</h4></th>
                            <th scope="row">50</th>
                            <th><h4>650</h4></th>
                            <th scope="row">26</th>
                            <th><h4>450</h4></th>
                            <th scope="row">0</th>
                            <th><h4>250</h4></th>
                        </tr>
                        <tr>
                            <th scope="row">69</th>
                            <th><h4>840</h4></th>
                            <th scope="row">49</th>
                            <th><h4>640</h4></th>
                            <th scope="row">25</th>
                            <th><h4>440</h4></th>
                            <th scope="row"></th>
                            <th><h4></h4></th>
                        </tr>
                        <tr>
                            <th scope="row">68</th>
                            <th><h4>830</h4></th>
                            <th scope="row">48</th>
                            <th><h4>630</h4></th>
                            <th scope="row">23-24</th>
                            <th><h4>430</h4></th>
                            <th scope="row"></th>
                            <th><h4></h4></th>
                        </tr>
                        <tr>
                            <th scope="row">67</th>
                            <th><h4>820</h4></th>
                            <th scope="row">47</th>
                            <th><h4>620</h4></th>
                            <th scope="row">22</th>
                            <th><h4>420</h4></th>
                            <th scope="row"></th>
                            <th><h4></h4></th>
                        </tr>
                        <tr>
                            <th scope="row">66</th>
                            <th><h4>810</h4></th>
                            <th scope="row">46</th>
                            <th><h4>610</h4></th>
                            <th scope="row">21</th>
                            <th><h4>410</h4></th>
                            <th scope="row"></th>
                            <th><h4></h4></th>
                        </tr>
                        <tr>
                            <th scope="row">65</th>
                            <th><h4>800</h4></th>
                            <th scope="row">44-45</th>
                            <th><h4>600</h4></th>
                            <th scope="row">20</th>
                            <th><h4>400</h4></th>
                            <th scope="row"></th>
                            <th><h4></h4></th>
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
