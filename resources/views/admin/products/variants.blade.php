<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Productos',
        'route' => route('admin.products.index'),
    ],
    [
        'name' => $product->name,
        'route' => route('admin.products.edit', $product),
    ],
    [
        'name' => $variant->features->pluck('description')->implode(', '),
    ],
]">

<form action="{{route('admin.products.variantsUpdate', [$product, $variant])}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <x-validation-errors class="mb-4">

    </x-validation-errors>

    <div class="relative mb-6">
        <figure>
            <img src="{{ $variant->image }}" class="aspect-[16/9] w-full object-cover object-center" id="imgPreview"
                alt="">
        </figure>

        <div class="absolute top-8 right-8">
            <label class="flex items-center bg-white py-2 px-2 rounded-lg cursor-pointer">
                <i class="fas fa-camera mr-2"></i>
                Actualizar imagen

                <input type="file" onchange="previewImage(event, '#imgPreview')" class="hidden" accept="image/*"
                    name="image">
            </label>
        </div>
    </div>

    <div class="card">
        <div class="mb-4">
            <x-label class="mb-1">
                Código (SKU)
            </x-label>
            <x-input name="sku" value="{{old('sku', $variant->sku)}}" placeholder="Ingrese el código" class="w-full">

            </x-input>
        </div>
        <div class="mb-4">
            <x-label class="mb-1">
                Stock
            </x-label>
            <x-input name="stock" value="{{old('stock', $variant->stock)}}" placeholder="Ingrese el stock" class="w-full">

            </x-input>
        </div>
        <div class="flex justify-end">
            <x-button>
                Actualizar
            </x-button>
        </div>
    </div>
</form>
   

    @push('js')
        <script>
            function previewImage(event, querySelector) {

                //Recuperamos el input que desencadeno la acción
                const input = event.target;

                //Recuperamos la etiqueta img donde cargaremos la imagen
                $imgPreview = document.querySelector(querySelector);

                // Verificamos si existe una imagen seleccionada
                if (!input.files.length) return

                //Recuperamos el archivo subido
                file = input.files[0];

                //Creamos la url
                objectURL = URL.createObjectURL(file);

                //Modificamos el atributo src de la etiqueta img
                $imgPreview.src = objectURL;

            }
        </script>
    @endpush

</x-admin-layout>
