@extends('layouts.app')

@section('content')
    <div class="mx-auto max-w-6xl relative overflow-x-auto shadow-md sm:rounded-lg mt-[150px]">
        @csrf
                <tr class="border-b border-gray-200 light:border-gray-700">
                    <th scope="row"
                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 light:text-white light:bg-gray-800">
                        <form action="{{ route('createCategorie') }}" method="POST">
                            @csrf
                            <input type="text" name="nom" placeholder="Nom de la catégorie">
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                Ajouter
                            </button>
                        </form>
                    </th>
                    <td class="px-6 py-4">
                    </td>
                </tr>
        <table class="w-full text-sm text-left text-gray-500 light:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase light:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 bg-gray-50 light:bg-gray-800">
                        Nom
                    </th>
                    <th scope="col" class="px-6 py-3 bg-gray-50 light:bg-gray-800">
                        Suppression
                    </th>
                </tr>
            </thead>
            <tbody>

                @foreach($categories as $category)
                    <tr class="border-b border-gray-200 light:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 light:text-white light:bg-gray-800">
                            {{ $category->nom }}
                        </th>
                        <td class="px-6 py-4">
                            <form action="{{ route('deleteCategorie', $category->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                    Supprimer
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
