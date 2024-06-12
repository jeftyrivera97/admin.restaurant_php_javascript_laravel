<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ingresar Nueva Compra') }}
        </h2>
    </x-slot>

    @if(session()->has('message'))
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-medium">{{ session('message') }}</span> 
                    </div>
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

    @if ($errors->any())
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    @endif


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="/compra">
                        @csrf
                        
                        <div class="relative z-0 w-full mb-6 group">
                            <input type="text" name="codigo_compra" id="codigo_compra" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                            <label for="codigo_compra" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6" required>*N° Factura/Comprobante</label>
                        </div>
                        <div class="grid md:grid-cols-4 md:gap-6">
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="date" name="fecha" id="fecha" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                <label for="fecha" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6" required>*Fecha Realizada</label>
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <select id="id_proveedor" name="id_proveedor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.0 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                  <option value=""> *Seleccione Proveedor</option>
                                  @foreach ($proveedores as $proveedor)
                                  <option value="{{$proveedor->id}}">{{ $proveedor->descripcion }} | R.T.N: {{ $proveedor->codigo_proveedor }}</option>
                                  @endforeach
                                </select>
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <select id="id_tipo_cuenta" onchange="getOption()" name="id_tipo_cuenta" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.0 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    <option value="0"> *Seleccione Tipo de Cuenta</option>
                                    <option value="1">Contado</option>
                                    <option value="2">Credito</option>
                                </select>
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="date" disabled name="fechaPago" id="fechaPago" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <label for="fecha" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6" >*Fecha de Pago</label>
                            </div>

                        </div>
                        <div class="grid md:grid-cols-4 md:gap-6">
                            <div class="relative z-0 w-full mb-6 group">
                                <select id="id_categoria" name="id_categoria" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.0 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    <option value=""> *Seleccione Categoria</option>
                                    @foreach ($categorias as $categoria)
                                    <option value="{{$categoria->id}}">{{ $categoria->descripcion }}</option>
                                    @endforeach
                                  </select>
                            </div>

                            <div class="relative z-0 w-full mb-6 group">
                                <input type="number" name="gravado15" id="gravado15" step="any" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  />
                                <label for="floating_phone" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">*Importe Gravado 15% L.</label>
                            </div>

                            <div class="relative z-0 w-full mb-6 group">
                                <input type="number" name="gravado18" id="gravado18" step="any"  class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  />
                                <label for="floating_phone" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">*Importe Gravado 18% L.</label>
                            </div>

                            <div class="relative z-0 w-full mb-6 group">
                                <input type="number" name="isv15" id="isv15" step="any"  class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  />
                                <label for="floating_phone" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">*15% I.S.V L.</label>
                            </div>

                        </div>
                        <div class="grid md:grid-cols-4 md:gap-6">
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="number" name="isv18" id="isv18" step="any"  class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  />
                                <label for="floating_phone" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">*18 I.S.V L.</label>
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="number" name="excento" id="excento" step="any"  class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  />
                                <label for="floating_phone" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">*Importe Excento L.</label>
                            </div>

                            <div class="relative z-0 w-full mb-6 group">
                                <input type="number" name="exonerado" id="exonerado" step="any"  class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  />
                                <label for="floating_phone" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">*Importe Exonerado L.</label>
                            </div>  
                            <div class="relative z-0 w-full mb-6 group">
                                <button type="button" id="calcular" name="calcular" class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Calcular Total</button>
                            </div>   
                                              
                        </div>

                        <div class="grid md:grid-cols-3 md:gap-6">
                           
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="number" name="total" id="total" step="any" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                <label for="floating_phone" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">*Total Compra L.</label>
                            </div>   
                        </div>
                       
                        <div class="col">
                            <button type="submit" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">GUARDAR</button>
                    </form>
                            <button type="button" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"> <a href="{{ route ('compra.index')}}"> REGRESAR </a></button>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function getOption() {
            var x= document.getElementById("id_tipo_cuenta").value;
            
            if(x==1) {
                
                document.getElementById("fechaPago").disabled = true;
                document.getElementById("fechaPago").required = false;
            }
            if (x==2) {
                document.getElementById("fechaPago").disabled = false;
                document.getElementById("fechaPago").required = true;
            }
            if(x==0) {
                document.getElementById("fechaPago").disabled = true;
                document.getElementById("fechaPago").required = false;
            }
        }

        $(document).ready(function() {
            $("#calcular").click(function(){
                var gravado15 = document.getElementById("gravado15").value;
                var gravado18 = document.getElementById("gravado18").value;
                var isv15 = document.getElementById("isv15").value;
                var isv18 = document.getElementById("isv18").value;
                var excento = document.getElementById("excento").value;
                var exonerado = document.getElementById("exonerado").value;
                
                if(gravado15==""){gravado15=0;}
                if(gravado18==""){gravado18=0;}
                if(isv15==""){isv15=0;}
                if(isv18==""){isv18=0;}
                if(excento==""){excento=0;}
                if(exonerado==""){exonerado=0;}

                gravado15= parseFloat(gravado15);
                gravado18= parseFloat(gravado18);
                isv15= parseFloat(isv15);
                isv18= parseFloat(isv18);
                excento= parseFloat(excento);
                exonerado= parseFloat(exonerado);
            

                var suma = gravado15+gravado18+isv15+isv18+excento+exonerado;
                let num = suma.toFixed(2);
                document.getElementById("total").value= num;

            }); 
        });
    </script>
</x-app-layout>
