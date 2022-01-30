@extends('layouts.main.app')

@section('content')
    <div class="container">
        <h3>{{$city->name ?? ''}}</h3>
        <div class="row justify-content-center">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Дата</th>
                    <th scope="col">Температура (°C)</th>
                    <th scope="col">Облачность (%)</th>
                </tr>
                </thead>
                <tbody>
                @if (!empty($weatherData))
                    @foreach($weatherData as $weatherRow)
                        <tr>
                            <td>{{date('d-m-Y', strtotime($weatherRow->date))}}</td>
                            <td>{{$weatherRow->temp}}</td>
                            <td>{{$weatherRow->clouds}}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
