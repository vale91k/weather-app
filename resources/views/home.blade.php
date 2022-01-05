@extends('layouts.main.app')

@section('content')
    <div class="container">
        <h3>{{$city->name}}</h3>
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
                            {{-- TODO сделать корректный вывод даты --}}
                            <td>{{$weatherRow->dt->format('d.m.Y')}}</td>
                            <td>{{$weatherRow->temp->day}}</td>
                            <td>{{$weatherRow->clouds}}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
