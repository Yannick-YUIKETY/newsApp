<h1>Liste des News</h1>

@forelse ($actus as $itemActu)

    <h3>{{Str::limit($itemActu->titre , 30)}}</h3>
    <a href="{{route('news.standard.detail', $itemActu)}}">voir...</a>

@empty

<h2>Pas de news</h2>

@endforelse
