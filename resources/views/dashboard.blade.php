<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Inicio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                        <span class="font-large">  {{ __("Bienvenido") }}  {{ Auth::user()->name }}, hoy es {{ now()->locale('es')->isoFormat('dddd D \d\e MMMM \d\e\l Y') }}</span> 
                      </div>
                    <br>
                    <b><span> Balance Anual del 20{{ $año }}: </span></b>
                    <div class="grid grid-cols-4 gap-4">
                        <div class="mt-6 text-gray-500">
                            <label>Ingresos Anual: </label>
                            <input type="text" disabled value="L. {{$ingresosAnual}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="mt-6 text-gray-500">
                            <label>Compras Anual: </label>
                            <input type="text" disabled value="L.{{$comprasAnual}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="mt-6 text-gray-500">
                            <label>Gastos Anual: </label>
                            <input type="text" disabled value="L. {{$gastosAnual}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="mt-6 text-gray-500">
                            <label>Planillas Anual: </label>
                            <input type="text" disabled value="L. {{$planillasAnual}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-2">
                        <div class="mt-6 text-gray-500">
                            <label>Balance Anual: </label>
                            <input type="text" disabled value="L. {{$balanceAnual}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="mt-6 text-gray-500">
                            <label>Porcentaje de Balance: </label>
                            <input type="text" disabled value="L. {{$pBalanceAnual}}%" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                    </div>
                    <br><br>
                    <b><span> Balance Mensual de {{ $mes }} 20{{ $año }}: </span></b>
                    <div class="grid grid-cols-4 gap-4">
                        <div class="mt-6 text-gray-500">
                            <label>Ingresos Mes: </label>
                            <input type="text" disabled value="L. {{$ingresosMes}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="mt-6 text-gray-500">
                            <label>Compras Mes: </label>
                            <input type="text" disabled value="L. {{$comprasMes}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="mt-6 text-gray-500">
                            <label>Gastos Mes: </label>
                            <input type="text" disabled value="L. {{$gastosMes}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="mt-6 text-gray-500">
                            <label>Planillas Mes: </label>
                            <input type="text" disabled value="L. {{$planillasMes}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-2">
                        <div class="mt-6 text-gray-500">
                            <label>Balance del Mes: </label>
                            <input type="text" disabled value="L. {{$balanceMes}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="mt-6 text-gray-500">
                            <label>Porcentaje de Balance: </label>
                            <input type="text" disabled value="L. {{$pBalanceMes}}%" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
