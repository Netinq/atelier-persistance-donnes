@extends('layouts.app')

@section('content')
    <div class="mx-auto max-w-6xl relative overflow-x-auto shadow-md sm:rounded-lg mt-[150px]">
        @csrf
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
                        Actif/Inactif
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
                            <button id="{{$livre->id}}" type="button" class="bg-gray-200 relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2" role="switch" aria-checked="{{$livre->actif}}">
                                <span class="sr-only">Use setting</span>
                                <span class="translate-x-0 pointer-events-none relative inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out" id="id2">
    <span id="id3" class="opacity-100 duration-200 ease-in absolute inset-0 flex h-full w-full items-center justify-center transition-opacity" aria-hidden="true">
      <svg class="h-3 w-3 text-gray-400" fill="none" viewBox="0 0 12 12">
        <path d="M4 8l2-2m0 0l2-2M6 6L4 4m2 2l2 2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
      </svg>
    </span>
                                    <!-- Enabled: "opacity-100 duration-200 ease-in", Not Enabled: "opacity-0 duration-100 ease-out" -->
    <span id="id4" class="opacity-0 duration-100 ease-out absolute inset-0 flex h-full w-full items-center justify-center transition-opacity" aria-hidden="true">
      <svg class="h-3 w-3 text-indigo-600" fill="currentColor" viewBox="0 0 12 12">
        <path d="M3.707 5.293a1 1 0 00-1.414 1.414l1.414-1.414zM5 8l-.707.707a1 1 0 001.414 0L5 8zm4.707-3.293a1 1 0 00-1.414-1.414l1.414 1.414zm-7.414 2l2 2 1.414-1.414-2-2-1.414 1.414zm3.414 2l4-4-1.414-1.414-4 4 1.414 1.414z" />
      </svg>
    </span>
  </span>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        const switchEl = document.querySelectorAll('[role="switch"]');
        Array.from(switchEl).forEach((el) => {
            el.addEventListener('click', () => toggle(el, true));
            toggle(el)
        });

        function toggle(el, enableFetch = false) {
            const isChecked = el.getAttribute('aria-checked') === '0';
            el.setAttribute('aria-checked', isChecked ? '1' : '0');
            if (isChecked) {
                el.classList.add('bg-gray-200');
                el.classList.remove('bg-indigo-600');
                el.querySelector('#id2').classList.add('translate-x-0');
                el.querySelector('#id2').classList.remove('translate-x-6');
                el.querySelector('#id3').classList.add('duration-200');
                el.querySelector('#id3').classList.add('opacity-100');
                el.querySelector('#id3').classList.add('ease-in');
                el.querySelector('#id3').classList.remove('duration-100');
                el.querySelector('#id3').classList.remove('opacity-0');
                el.querySelector('#id3').classList.remove('ease-out');
                el.querySelector('#id4').classList.add('duration-100');
                el.querySelector('#id4').classList.add('opacity-0');
                el.querySelector('#id4').classList.add('ease-out');
                el.querySelector('#id4').classList.remove('duration-200');
                el.querySelector('#id4').classList.remove('opacity-100');
                el.querySelector('#id4').classList.remove('ease-in');
                if (enableFetch) {
                    fetch('/toggle/'+el.getAttribute('id'), {
                        method: 'POST',
                    }, {
                        headers: {
                            'Content-Type': 'application/json'
                        },
                    });
                }
            }
            else {
                el.classList.add('bg-indigo-600');
                el.classList.remove('bg-gray-200');
                el.querySelector('#id2').classList.add('translate-x-6');
                el.querySelector('#id2').classList.remove('translate-x-0');
                el.querySelector('#id3').classList.add('duration-100');
                el.querySelector('#id3').classList.add('opacity-0');
                el.querySelector('#id3').classList.add('ease-out');
                el.querySelector('#id3').classList.remove('duration-200');
                el.querySelector('#id3').classList.remove('opacity-100');
                el.querySelector('#id3').classList.remove('ease-in');
                el.querySelector('#id4').classList.add('duration-200');
                el.querySelector('#id4').classList.add('opacity-100');
                el.querySelector('#id4').classList.add('ease-in');
                el.querySelector('#id4').classList.remove('duration-100');
                el.querySelector('#id4').classList.remove('opacity-0');
                el.querySelector('#id4').classList.remove('ease-out');
                if (enableFetch) {
                    fetch('/toggle/'+el.getAttribute('id'), {
                        method: 'POST',
                    }, {
                        headers: {
                            'Content-Type': 'application/json'
                        },
                    });
                }
            }
        }

    </script>
@endsection
