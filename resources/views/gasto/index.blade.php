<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gastos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <x-nav-link :href="url('/gasto/create')">
                    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Nuevo Registro</button>
                    </x-nav-link>
                    <br><br>
                    <b><span> Balance General de Gastos {{ $mes }} 20{{ $año }}: </span></b>
                    <div class="grid grid-cols-4 gap-4">
                        <div class="mt-6 text-gray-500">
                            <label>Total Año: </label>
                            <input type="text" disabled value="{{$gastosAnual}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="mt-6 text-gray-500">
                            <label>Total Mes: </label>
                            <input type="text" disabled value="{{$totalMes}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="mt-6 text-gray-500">
                            <label>Promedio Semanal: </label>
                            <input type="text" disabled value="{{$promedioSemanal}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="mt-6 text-gray-500">
                            <label>Mes anterior: </label>
                            <input type="text" disabled value="{{$mesAnterior}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                    </div>
                    <br>
                    <p class="text-lg text-gray-900 dark:text-white">Gastos de {{ $mes }} del 20{{ $año }}</p>
                    <p class="text-sm text-gray-900 dark:text-white">{{count($gastos)}} Registros</p>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Fecha
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Codigo Gasto
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Descripcion
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Categoria
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Total
                                    </th>
                                    <th scope="col" class="px-6 py-3">

                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($gastos as $gasto)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$gasto->fecha}}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{$gasto->codigo_gasto}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$gasto->descripcion}}
                                    </td>

                                    <td class="px-6 py-4">
                                        {{$gasto->categoria->descripcion}}
                                    </td>

                                    <td class="px-6 py-4">
                                        L. {{number_format($gasto->total, 2)}}
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <a href="{{ route('gasto.edit', $gasto->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <br><br>
                    <p class="text-lg text-gray-900 dark:text-white">Gastos del 20{{ $año }}</p>
                    <p class="text-sm text-gray-900 dark:text-white">{{count($registros)}} Registros</p>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Fecha
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Codigo Gasto
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Descripcion
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Categoria
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Total
                                    </th>
                                    <th scope="col" class="px-6 py-3">

                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($registros as $registro)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$registro->fecha}}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{$registro->codigo_gasto}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$registro->descripcion}}
                                    </td>

                                    <td class="px-6 py-4">
                                        {{$registro->categoria->descripcion}}
                                    </td>

                                    <td class="px-6 py-4">
                                        L. {{number_format($registro->total, 2)}}
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <a href="{{ route('gasto.edit', $registro->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
