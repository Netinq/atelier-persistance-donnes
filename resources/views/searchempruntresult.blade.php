@extends('layouts.app')

@section('content')
<div class="mx-auto max-w-6xl relative overflow-x-auto shadow-md sm:rounded-lg mt-[150px]">
        <h1 class="text-2xl text-center font-bold text-gray-700 light:text-gray-400">Résultats</h1>
    <table class="w-full text-sm text-left text-gray-500 light:text-gray-400 mt-4">
        <thead class="text-xs text-gray-700 uppercase light:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 bg-gray-50 light:bg-gray-800">
                    Nom
                </th>
                <th scope="col" class="px-6 py-3 bg-gray-50 light:bg-gray-800">
                    Prénom
                </th>
                <th scope="col" class="px-6 py-3 bg-gray-50 light:bg-gray-800">
                    Nombre d'emprunts
                </th>
                <th scope="col" class="px-6 py-3 bg-gray-50 light:bg-gray-800">
                    Date début
                </th>
                <th scope="col" class="px-6 py-3 bg-gray-50 light:bg-gray-800">
                    Date fin
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($emprunts as $emprunt)
                <tr class="border-b border-gray-200 light:border-gray-700">
                    <th scope="row"
                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 light:text-white light:bg-gray-800">
                        {{ $emprunt->adherent->nom }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $emprunt->adherent->prenom }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $emprunt->livre->titre }}
                    </td>
                    <td class="px-6 py-4">
                        {{ \Carbon\Carbon::parse($emprunt->date_emprunt)->format('d/m/Y') }}
                    </td>
                    <td class="px-6 py-4">
                        {{ \Carbon\Carbon::parse($emprunt->date_fin_prevue)->format('d/m/Y') }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
