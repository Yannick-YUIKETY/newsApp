<x-app-layout>

    <h1 class="text-white">Liste des News</h1>
        <ul>
            @foreach ($categories as $itemCategory)

                <li class="text-white">
                    <a href="{{route('news.standard.category' , $itemCategory->id)}}">{{$itemCategory->name}}</a>
                </li>

            @endforeach

        </ul>

        @if (Gate::allows('admin'))
        <h1 class="text-white">Admin</h1>
        @else
        <h1 class="text-white">NADmin</h1>
        @endif

    @forelse ($actus as $itemActu)

        <h3 class="text-white">{{Str::limit($itemActu->titre , 30)}}</h3>
        <a href="{{route('news.standard.detail', $itemActu)}}" class="text-white">voir...</a>

@empty

    <h2>Pas de news</h2>

@endforelse

    {{$actus->links()}}

</x-app-layout>
