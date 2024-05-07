<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detalle de Compra') }}
        </h2>
    </x-slot>
    @if(session()->has('message'))
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                <span class="font-medium">{{ session('message') }}</span>
            </div>
        </div>
    </div>
    @endif
    @if ($errors->any())
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
            </div>
        </div>
    </div>
    @endif
    @if(session()->has('validacionTotal'))
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex items-center p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300" role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">{{ session('validacionTotal') }}</span> 
                </div>
            </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    </div>
    @endif  

    <div class="py-12">
    <form method="POST" action="/storeDetalle">
    @csrf
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 text-gray-900 dark:text-gray-100">
               
                    <input type="input" name="id" id="id" value="{{$compra->id}}" hidden/>

                        <div class="grid md:grid-cols-4 md:gap-6">
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="input" name="codigo_compra" id="codigo_compra" value="{{$compra->codigo_compra}}" disabled class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  />
                                <label for="fecha" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6" >*Codigo Factura</label>
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="date" name="fecha" id="fecha" value="{{$compra->fecha}}" disabled class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  />
                                <label for="fecha" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6" >*Fecha Realizada</label>
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="input" name="proveedor" id="proveedor" value="{{$compra->proveedor->descripcion}}" disabled class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  />
                                <label for="fecha" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6" >*Proveedor</label>
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="input" name="total" id="total" value="L .{{$compra->total}}" disabled class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  />
                                <label for="total" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6" >*Total Factura</label>
                            </div>
                        </div>

                        <div class="grid md:grid-cols-4 md:gap-6">
                        <div class="relative z-0 w-full mb-6 group">
                                <select id="id_producto" onchange="productoDescripcion()" name="id_producto" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.0 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                  <option value=""> *Seleccione Producto</option>
                                  @foreach ($productos as $producto)
                                  <option value="{{$producto->id}}">{{ $producto->descripcion }}</option>
                                  @endforeach
                                </select>
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="input" name="producto_descripcion" id="producto_descripcion" disabled class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  />
                                <label for="producto_descripcion" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6" >*Producto</label>
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="number" name="cantidad" id="cantidad" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  />
                                <label for="cantidad" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6" >*Cantidad</label>
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="number" name="costo" id="costo" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  />
                                <label for="costo" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6" >*Costo L.</label>
                            </div>
                           
                        </div>
                        <div class="col">
                            <button class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">+ Agregar</button>
                        </div>
                    <br>
                    <div class="grid md:grid-cols-3 md:gap-6">
                        <div class="relative z-0 w-full mb-6 group">
                            <input type="number" name="total_detalle" id="total_detalle" value="{{$contador}}" disabled class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  />
                            <label for="total_detalle" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6" >*Total Detalle Compra L.</label>
                        </div>
                        
                    </div>
                    

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400" id="t1">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                <th scope="col" class="px-6 py-3">
                                        Linea
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Producto
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Cantidad
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Costo
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Total Linea
                                    </th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($detalles as $detalle)
                            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$detalle->linea}}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{$detalle->producto->descripcion}}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{$detalle->cantidad}} un.
                                    </td>
                                    <td class="px-6 py-4">
                                        L. {{$detalle->costo}}
                                    </td>
                                    <td class="px-6 py-4">
                                    L .{{$detalle->costo*$detalle->cantidad }}
                                    </td>
                                    
                                </tr>
                             @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>

    <script>
        function insertData() {
            var id_producto = document.getElementById("id_producto").value;
            var descripcion = document.getElementById("producto_descripcion").value;
            var cantidad = parseFloat(document.getElementById("cantidad").value);
            var costo = parseFloat(document.getElementById("costo").value);
            var totalTemp = parseFloat(document.getElementById("total_detalle").value);
            var totalLinea = cantidad*costo;

            var total= totalTemp+totalLinea;

            if(id_producto =="" || cantidad=="" || costo==""){
                alert("Debe seleccionar todos los campos");
            }else{
                document.getElementById("insertionPoint").innerHTML += "<tr class='odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700'><td class='px-6 py-4'>" + id_producto + "</td><td class='px-6 py-4'>" + descripcion + "</td><td class='px-6 py-4'>" + cantidad +"</td><td class='px-6 py-4'>" + costo +  "</td><td class='px-6 py-4'>" + totalLinea +  "</td><td class='px-6 py-4'>" +  "<button onclick='eliminar(this)' class='focus:outline-none text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:ring-red-200 font-medium rounded-lg text-sm px-4 py-2.0 mr-2 mb-2 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-700'>-</button>" + "</td></tr>";
            
                document.getElementById("id_producto").value = "";
                document.getElementById("producto_descripcion").value = "";
                document.getElementById("cantidad").value = "";
                document.getElementById("costo").value = "";

                document.getElementById("total_detalle").value = total;
            }
            
        }

        function eliminar(Id) {
            document.getElementById("insertionPoint").deleteRow(Id);
        };

        function productoDescripcion(){
            var e = document.getElementById("id_producto");
            var descripcion = e.options[e.selectedIndex].text;

            document.getElementById("producto_descripcion").value= descripcion;
            document.getElementById("cantidad").focus();

        }

        function guardar(){

            var array = [];
            var headers = [];
            var arrayItem = {};
            $('#t1 th').each(function(index, item) {
                headers[index] = $(item).html();
            });
            $('#t1 tr').has('td').each(function() {
                $('td', $(this)).each(function(index, item) {
                    arrayItem[headers[index]] = $(item).html();
                });
                array.push(arrayItem);
            });

            var id_compra =  document.getElementById("id").value;
            console.log(array);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

             $.ajax({
                 type: 'POST',
                 url: "/storeDetalle",
                 data: {data : array},
                 dataType: "json",
                 success: function (data) {
                   console.log(data);
                 },
                 error: function (data) {
                     console.log('Error:', data);
                 }
             });

        }


    </script>


</x-app-layout>
