<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agregar registro de unificacion') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-3">
                <form method="POST" action="{{ route('unification.store') }}">
                    @csrf
                    <div class="form-row">
                        <div class="col-7">
                            <input type="text" class="form-control" name="descripcion" placeholder="Descripcion de Unificacion">
                        </div>
                        <div class="col-3">
                            <input type="text" class="form-control" name="asesor_id" placeholder="Asesor">
                            <input type="hidden" class="form-control" name="user_id" value="{{ auth()->id() }}">
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-success btn-block">Agregar Registro</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
