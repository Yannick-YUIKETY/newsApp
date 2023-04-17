<form action="{{ route('news.add') }}" method="post" enctype="multipart/form-data">
    <!-- enctype pour envoyer des fichiers-->
    @csrf

    <div class="mb-5">

        <label for="titre" class="mb-3 block text-base font-medium text-white">
            Titre
        </label>

        <input type="text" name="titre" placeholder="Saisissez un titre"
            class="w-full rounded-md border border-orange-600 bg-white py-3 px-6 text-base font-medium text-black outline-none focus:border-purple-700 focus:shadow-md " />
        @error('titre')
            <div class="text-red-500">Vous devez saisir un titre !</div>
        @enderror

    </div>

    <div class="mb-5">

        <label for="image" class="mb-3 block text-base font-medium text-white">
            Image
        </label>

        <input type="file" name="image" placeholder="Insérer une image"
            class="w-full rounded-md border border-orange-600 bg-white py-3 px-6 text-base font-medium text-black outline-none focus:border-purple-700 focus:shadow-md " />
        @error('image')
            <div class="text-red-500">Ajoutez une image au bon format !</div>
        @enderror

    </div>
    <div class="mb-5">

        <label for="description" class="mb-3 block text-base font-medium text-white">
            Description
        </label>

        <textarea name="description" rows="4" placeholder="Saisissez une description"
            class="w-full rounded-md border border-orange-600 bg-white py-3 px-6 h-48 text-base font-medium text-black outline-none focus:border-purple-700 focus:shadow-md ">
        </textarea>
        @error('description')
            <div class="text-red-500">Ajoutez une description !</div>
        @enderror

    </div>

    <div class="mb-5">
        <button class="bg-orange-600 px-8 py-3 text-white rounded-md font-bold">Ajouter</button>
    </div>


</form>
