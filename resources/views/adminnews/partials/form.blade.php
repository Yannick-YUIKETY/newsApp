<form action="{{!empty($actu)? route('news.edit',$actu->id):route('news.add')}}" method="post" enctype="multipart/form-data">
    <!-- enctype pour envoyer des fichiers-->
    @csrf

    <div class="mb-5">

        <label for="titre" class="mb-3 block text-base font-medium text-white">
            Titre
        </label>

        <input type="text"
        name="titre"
        value ="{{!empty($actu)?$actu->titre:''}}"
         placeholder="Saisissez un titre"
            class="w-full rounded-md border border-orange-600 bg-white py-3 px-6 text-base font-medium text-black outline-none focus:border-purple-700 focus:shadow-md " />
        @error('titre')
            <div class="text-red-500">Vous devez saisir un titre !</div>
        @enderror

    </div>

    <div class="mb-5">

    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>

        <select name="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected>Choose a category</option>
            @foreach ($categories as $itemCategory )

                @if (!empty($actu) && $itemCategory->id == $actu->category_id)

                    <option value="{{$itemCategory->id}}"selected>{{$itemCategory->name}}</option>

                @else

                <option value="{{$itemCategory->id}}">{{$itemCategory->name}}</option>

                @endif



            @endforeach

        </select>

    </div>

    <div class="mb-5">

        <label for="image" class="mb-3 block text-base font-medium text-white">
            Image
        </label>

        @isset($actu)
            <img
            class="h-20 w-20 rounded-full object-cover object-center p-2"
            src="{{Storage::url($actu->image)}}"
            alt=""
            />
        @endisset


        <input
        type="file"
        name="image"
        placeholder="Insérer une image"
            class="w-full rounded-md border border-orange-600 bg-white py-3 px-6 text-base font-medium text-black outline-none focus:border-purple-700 focus:shadow-md " />
        @error('image')
            <div class="text-red-500">Ajoutez une image au bon format !</div>
        @enderror

    </div>
    <div class="mb-5">

        <label for="description" class="mb-3 block text-base font-medium text-white">
            Description
        </label>

        <textarea
        name="description"
        rows="4"
        placeholder="Saisissez une description"

            class="w-full rounded-md border border-orange-600 bg-white py-3 px-6 h-48 text-base font-medium text-black outline-none focus:border-purple-700 focus:shadow-md ">
            {{!empty($actu)?$actu->description:''}}
        </textarea>

        @error('description')
            <div class="text-red-500">Ajoutez une description !</div>
        @enderror

    </div>

    <div class="mb-5">
        <button class="bg-orange-600 px-8 py-3 text-white rounded-md font-bold">{{!empty($actu)?'Modifier' :'Ajouter'}}</button>
    </div>


</form>
