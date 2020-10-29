<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar registro de unificacion') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-3">
                <form class="w-full" method="POST" action="{{ route('unification.update',$clientUnification->id) }}">
                    @method('PUT')
                    @csrf
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-first-name">
                                Descripcion
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="grid-first-name" type="text" value="{{ $clientUnification->descripcion }}"
                                name="descripcion">
                        </div>
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-first-name">
                                Asesor
                            </label>
                            <select
                                class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                name="asesor_id" id="asesor_id">
                                @foreach($asesores as $asesor)
                                    <option value="{{ $asesor->id }}" {{ $clientUnification->asesor_id === $asesor->id ? 'selected' : '' }}>{{ $asesor->name }}</option>
                                @endforeach
                            </select>
                            <input type="hidden" class="form-control" name="user_id" value="{{ auth()->id() }}">
                        </div>
                        <div class="w-full px-3 mb-6 md:mb-0 grid grid-cols-1 place-items-end">
                            <button class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded" type="submit">
                                Actualizar Registro
                            </button>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>
