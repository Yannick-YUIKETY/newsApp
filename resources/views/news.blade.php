@forelse ($newsModel as $itemNews )
    <!-- component -->
<!DOCTYPE html>
<html>
    <head>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-gray-200">
        <!-- AsuniiaLeVrai#4610 -->
        <div class="m-10">

        </div>

        <div class="flex justify-between grid grid-cols-3 gap-6 m-10 mb-10">
            <!-- START Card component -->
           <article class="container bg-white shadow-2xl rounded-2xl p-5">
                <h1 class="font-bold text-yellow-500">{{$itemNews->titre}}</h1>
                <p class="font-light text-gray-500 hover:font-bold">{{Str::limit($itemNews->description , 100)}}</p>
                <h6 class="text-sm text-gray-300 mb-5">{{$itemNews->created_at}}</h6>
                <img src="{{Storage::url($itemNews->image)}}" alt="">
                <a href="{{route('news.detail', $itemNews->id)}}" class="rounded-lg py-2 px-4 text-center text-white bg-yellow-400 hover:bg-yellow-500">voir plus</a>
            </article>
            <!-- END Card component -->
        </div>
    </body>
</html>


@empty

@endforelse


