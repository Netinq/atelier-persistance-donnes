@extends('layouts.app')

@section('content')
{{--  Liste des emprunts en cours  --}}
<div class="mx-auto max-w-6xl relative overflow-x-auto shadow-md sm:rounded-lg mt-[150px]">
        <h1 class="text-2xl text-center font-bold text-gray-700 light:text-gray-400">Liste des emprunts en cours</h1>
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
                        {{ \Carbon\Carbon::parse($emprunt->date_fin_prevue   )->format('d/m/Y') }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{--  Nombre d’emprunts sur une plage de dates donnée  --}}
<div class="mx-auto max-w-6xl relative overflow-x-auto shadow-md sm:rounded-lg mt-[150px]">
    <h1 class="text-2xl text-center font-bold text-gray-700 light:text-gray-400">Nombre d’emprunts sur une plage de dates donnée</h1>
    <form action="{{ route('searchEmprunt') }}" method="GET" class="flex flex-col items-center justify-center mt-4">
        @csrf
        <div class="flex flex-col items-center justify-center">
            <label for="date_debut" class="text-gray-700 light:text-gray-400">Date de début</label>
            <input type="date" name="date_debut" id="date_debut" class="border border-gray-300 light:border-gray-700 rounded-md p-2 mt-2">
        </div>
        <div class="flex flex-col items-center justify-center mt-4">
            <label for="date_fin" class="text-gray-700 light:text-gray-400">Date de fin</label>
            <input type="date" name="date_fin" id="date_fin" class="border border-gray-300 light:border-gray-700 rounded-md p-2 mt-2">
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">
            Rechercher
        </button>
    </form>
</div>
@endsection
