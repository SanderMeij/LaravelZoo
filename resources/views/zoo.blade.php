
@extends ('layout')

@section ('content')
    @if ($cages->isEmpty())
        <h1>Welcome to the zoo!</h1>
    @else
        <h1>Cages</h1>
        <table>
            <tr class = 'unavailable'>
                <th>Habitat</th>
                <th>Width</th>
                <th>Height</th>
                <th>Animals</th>
            </tr>

            @foreach ($cages as $cage)
                <?php
                    $animals = $cage->getAnimals();
                    $animalCount = count($animals);
                    $animalType = "Animal";
                    if ($animalCount > 0) {
                        $animalType = $cage->animal_type;
                    }
                ?>
                <tr data-animalType="{{ $animalType }}">
                    <td> {{ $cage->habitat }} </td>
                    <td> {{ $cage->width }} </td>
                    <td> {{ $cage->height }} </td>
                    <td> {{ $animalCount . " " . $animalType }} </td>
                </tr>
            @endforeach
        </table>
    @endif
@endsection