@extends ('layout')

@section ('content')

    <h1>Buy a cage</h1>

    <form method="POST" action="/shop/cages">
        {{ csrf_field() }}

        <table>
            <tr>
                <th>Habitat</th>
                <td>
                    <select id="habitat" name="habitat">
                        @foreach ($habitats as $h)
                            <option
                                @if($h->name === $habitat)
                                    selected
                                @endif
                                value={{ $h->name }}>{{ $h->name }}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <th>Width</th>
                <td>
                    <input id="width" name="width" value = "{{ $width }}">
                </td>
            </tr>
            <tr>
                <th>Height</th>
                <td>
                    <input id="height" name="height" value = "{{ $height }}">
                </td>
            </tr>
        </table>

        <button type="submit">Buy</button>
    </form>

    <div>
        <a onclick="showAnimals()">Show animals that fit</a>
    </div>

    @if(!$animals->isEmpty())
        <table>
            @foreach($animals as $animal)
                <tr>
                    <td> {{ $animal->type }} </td>
                </tr>
            @endforeach
        </table>
    @endif


@endsection