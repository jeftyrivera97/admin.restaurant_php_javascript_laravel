<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Productos en Inventario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <x-nav-link :href="url('/producto/create')">
                    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Nuevo Registro</button>
                    </x-nav-link>
                    <br><br>
                    <p class="text-lg text-gray-900 dark:text-white">Inventario de {{ $mes }} del 20{{ $año }}</p>
                    <p class="text-sm text-gray-900 dark:text-white">{{count($productos)}} Registros</p>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Codigo Producto
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Descripcion
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Categoria
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Stock
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Costo
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Valor en Inventario
                                    </th>
                                     <th scope="col" class="px-6 py-3">
                                        
                                     </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($productos as $producto)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$producto->codigo_producto}}
                                    </th>
                                    <td class="px-6 py-4">
                                    {{$producto->descripcion}}
                                    </td>
                                    <td class="px-6 py-4">
                                    {{$producto->categoria->descripcion}}
                                    </td>
                                    <td class="px-6 py-4">
                                    {{$producto->stock}}
                                    </td>
                                    <td class="px-6 py-4">
                                    {{$producto->stock*$producto->costo }}
                                    </td>
                                    <td class="px-6 py-4">
                                        L. {{number_format($producto->costo, 2)}}
                                    </td>
                                    <td class="px-6 py-4 text-right"><a href= "{!! route('producto.edit', $producto->id)!!}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                                    </td> 
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
