@extends ('layout')

@section ('content')

    <h1>Buy a {{ strtolower($animal->type) }}</h1>

    <table>
        <tr>
            <th>Type</th>
            <td> {{ $animal->type }} </td>
        </tr>
        <tr>
            <th>Habitats</th>
            <td> {{ $animal->habitats }} </td>
        </tr>
        <tr>
            <th>Cage size</th>
            <td> {{ $animal->cage_size }} m2 </td>
        </tr>
        <tr>
            <th>Price</th>
            <td> $ {{ $animal->price }} </td>
        </tr>
    </table>

    <a href={{ "buy/$animal->type" }} a>Buy</a>
@endsection