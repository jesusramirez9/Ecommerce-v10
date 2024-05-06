<div>
    <x-container>
        <div class="card">
            <div class="grid md:grid-cols-2 gap-6">
                <div class="col-span-1">
                    <figure class="mb-2">
                        <img src="{{$product->image}}" class="aspect-[1/1] w-full object-cover object-center" alt="">
                    </figure>
                </div>
                <div class="col-span-1">
                    <h1 class="text-xl text-gray-600 mb-2">
                        {{$product->name}}
                    </h1>
                    <div class="flex space-x-2 items-center mb-4">
                        <ul class="flex space-x-1 text-sm">
                            <li>
                                <i class="fa-solid fa-star text-yellow-500"></i>
                            </li>
                            <li>
                                <i class="fa-solid fa-star text-yellow-500"></i>
                            </li>
                            <li>
                                <i class="fa-solid fa-star text-yellow-500"></i>
                            </li>
                            <li>
                                <i class="fa-solid fa-star text-yellow-500"></i>
                            </li>
                            <li>
                                <i class="fa-solid fa-star text-yellow-500"></i>
                            </li>
                        </ul>
                        <p class="text-sm text-gray-600">4.7 (55)</p>
                    </div> 
                    
                    <p class="font-semibold text-2xl text-gray-600 mb-4">
                        S/ {{$product->price}}
                    </p>

                    <div class="flex space-x-6 items-center mb-6" x-data="{
                        qty: @entangle('qty'),
                    }">
                        <button class="btn btn-gray" x-on:click="qty--" x-bind:disabled="qty == 1">
                            -
                        </button>
                       <span class="inline-block w-2 text-center" x-text="qty">
                        
                       </span>
                        <button class="btn btn-gray" x-on:click="qty++">
                            +
                        </button>
                    </div>

                    <button class="btn btn-purple w-full mb-6" wire:click="add_to_cart" wire:loading.attr="disabled" >
                        Agregar al carrito
                    </button>
                    
                    <div class="text-sm mb-4">
                        {{$product->description}}
                    </div>

                    <div class="flex items-center space-x-4 text-gray-700">
                        <i class="fa-solid fa-truck-fast text-2xl"></i>
                        <p>Despacho a dominicilio</p>
                    </div>
                    
                </div>
            </div>
        </div>
    </x-container>
</div>
