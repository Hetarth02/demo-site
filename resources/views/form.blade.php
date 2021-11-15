<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('css/styles.css') }}" />
    <title>Form</title>
</head>
<body>
    @php
        use Carbon\Carbon;
        $start = new Carbon();
        $date = new Carbon();
        $start->setTime(9,40);
        $date->setTime(9,40);
        $cond = [Carbon::now()->setTime(1,00)->format('h:i'), Carbon::now()->setTime(1,20)->format('h:i'), Carbon::now()->setTime(1,40)->format('h:i')];
        $today = Carbon::now('Asia/Kolkata');
    @endphp
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Book Application
    </button>
    <div id="exampleModal" class="modal fade">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="form">
                    <form id="form" action="/submit" method="POST">
                        @csrf
                        <input
                            type="text"
                            name="fname"
                            placeholder="Full Name"
                            required
                        />
                        <br>
                        <input
                            type="email"
                            name="email"
                            placeholder="email"
                            required
                        />
                        <br>
                        <input
                            type="number"
                            name="number"
                            placeholder="phone"
                            required
                        />
                        <br>
                        <input
                            type="date"
                            name="date"
                            id="date"
                            min={{$today->format('Y-m-d')}}
                            max={{$today->addMonth(1)->format('Y-m-d')}}
                            required
                        />
                        <br>
                        <div class="radiobuttons">
                            @for ($i = 1; $i < 31; $i++)
                                <p hidden>{{$temp = $start->addMinutes(20)->format('h:i');}}</p>
                                @if (in_array($temp, $cond))
                                    <input
                                        type="radio"
                                        class="btn-check"
                                        name="time"
                                        id="button{{$i}}"
                                        value = {{$date->addMinutes(20)->format('g:i')}}
                                        disabled
                                        required
                                    />
                                    <label class="btn btn-outline-danger radio" for="button{{$i}}">{{$temp}}</label>
                                @else
                                    <input
                                        type="radio"
                                        class="btn-check"
                                        name="time"
                                        id="button{{$i}}"
                                        value = {{$date->addMinutes(20)->format('g:i')}}
                                        required
                                    />
                                    <label class="btn btn-outline-danger radio" for="button{{$i}}">{{$temp}}</label>
                                @endif
                            @endfor
                        </div>
                        <br>
                        <button type="submit" class="btn btn-secondary">Submit</button>
                        <button type="button" id="close_button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script type="text/javascript" src="{{ URL::asset('js/form.js') }}"></script>
</html>