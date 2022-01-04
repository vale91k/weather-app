@extends('layouts.main.app')
@dump($weatherData)
@section('content')
    <div class="container">
        <h3>{{$cityName}}</h3>
        <div class="row justify-content-center">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Дата</th>
                    <th scope="col">Температура</th>
                    <th scope="col">Облачность</th>
                </tr>
                </thead>
                <tbody>
                @if (!empty($weatherData))
                    @foreach($weatherData as $weatherRow)
                        <tr>
                            <td>{{$weatherRow['date']}}</td>
                            <td>{{$weatherRow['temp']}}</td>
                            <td>{{$weatherRow['cloudy']}}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
