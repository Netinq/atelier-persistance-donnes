@extends('layouts.app')

@section('content')
    <div class="bg-white">
        <div class="relative isolate px-6 pt-14 lg:px-8">
            <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80"
                aria-hidden="true">
                <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                </div>
            </div>
            <div class="mx-auto max-w-2xl py-32 sm:py-48 lg:py-56">
                <div class="text-center">
                    <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">La Biblio Tech</h1>
                    <p class="mt-6 text-lg leading-8 text-gray-600">Venez découvre une collection de plus de
                        {{ $nb_livres }} livres étant écris par plus de {{ $nb_auteurs }} auteurs, disponible à
                        l'emprunt dès
                        maintenant.</p>
                    {{-- <div class="mt-10 flex items-center justify-center gap-x-6">
                        <a href="#"
                            class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Get
                            started</a>
                        <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Learn more <span
                                aria-hidden="true">→</span></a>
                    </div> --}}
                </div>
            </div>
            <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]"
                aria-hidden="true">
                <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                </div>
            </div>

        </div>

    </div>

{{--  Search By Author  --}}
    <form action="{{ route('searchByAuthor') }}" method="GET">
        @csrf
        <div class="flex justify-center mt-10">
            <div class="relative">
                <input type="text" name="search" placeholder="Rechercher un auteur"
                    class="w-96 px-4 py-2 text-sm text-gray-900 placeholder-gray-500 border border-gray-300 rounded-md shadow-sm appearance-none focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                <button type="submit"
                    class="absolute inset-y-0 right-0 flex items-center px-4 text-sm text-gray-700 bg-gray-100 rounded-r-md hover:bg-gray-200 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                    <svg class="w-4 h-4 text-gray-500 fill-current" viewBox="0 0 16 16" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M11.707 10.293a1 1 0 010 1.414l-2.5 2.5a1 1 0 01-1.414 0l-2.5-2.5a1 1 0 111.414-1.414l2.146 2.147 2.147-2.147a1 1 0 011.414 0z">
                        </path>
                        <path
                            d="M8 1a7 7 0 110 14A7 7 0 018 1zm0 1a6 6 0 100 12A6 6 0 008 2z">
                        </path>
                    </svg>
                </button>
            </div>
        </div>
    </form>

    <div class="mx-auto max-w-6xl relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 light:text-gray-400">
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
