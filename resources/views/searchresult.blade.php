@extends('layouts.app')

@section('content')
    <div class="mx-auto max-w-6xl relative overflow-x-auto shadow-md sm:rounded-lg mt-[150px]">
        <h1 class="text-2xl text-center font-bold text-gray-700 light:text-gray-400">Résultats de la recherche</h1>
        <table class="w-full text-sm text-left text-gray-500 light:text-gray-400 mt-4">
            <thead class="text-xs text-gray-700 uppercase light:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 bg-gray-50 light:bg-gray-800">
                        Nom des livres
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Date de parution
                    </th>
                    <th scope="col" class="px-6 py-3 bg-gray-50 light:bg-gray-800">
                        Auteur
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nombre de pages
                    </th>
                    <th scope="col" class="px-6 py-3 bg-gray-50 light:bg-gray-800">
                        Emprunts
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($livres as $livre)
                    <tr class="border-b border-gray-200 light:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 light:text-white light:bg-gray-800">
                            {{ $livre->titre }}
                        </th>
                        <td class="px-6 py-4">
                            {{ \Carbon\Carbon::parse($livre->date_de_parution)->format('d/m/Y') }}
                        </td>
                        <td class="px-6 py-4 bg-gray-50 light:bg-gray-800">
                            {{ $livre->auteur->nom }} {{ $livre->auteur->prenom }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $livre->nombre_de_pages }}
                        </td>
                        <td class="px-6 py-4 bg-gray-50 light:bg-gray-800">
                            {{ $livre->emprunts->count() }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
