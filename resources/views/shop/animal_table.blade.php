<table>
    <tr class = 'unavailable'>
        <th>Type</th>
        <th>Habitats</th>
        <th>Cage size</th>
        <th>Price</th>
    </tr>
    @foreach ($animals as $animal)
        @if(!$fitting[$animal->type])
            <tr class = 'unavailable'>
        @else
            <tr data-animalType="{{ $animal->type }}">
        @endif
            <td> {{ $animal->type }} </td>
            <td> {{ $animal->habitats }} </td>
            <td> {{ $animal->cage_size }} m2 </td>
            <td> $ {{ $animal->price }} </td>
        </tr>
    @endforeach
</table>