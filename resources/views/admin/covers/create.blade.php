<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Portadas',
        'route' => route('admin.covers.index'),
    ],
    [
        'name' => 'Nuevo',
    ],
]">

<form action="{{route('admin.covers.store')}}" method="POST" enctype="multipart/form-data">
    @csrf

    <figure class="relative mb-4">
        <div class="absolute top-8 right-8">
            <label class="flex items-center px-4 py2 rounded-lg bg-white cursor-pointer hover:text-gray-700">
                <i class="fas fa-camera mr-2"></i>
                Actualizar imagen

                <input type="file" class="hidden" accept="image/*" name="image"  onchange="previewImage(event, '#imgPreview')" id="">
            </label>
     </div>
        <img id="imgPreview" src="{{asset('img/noProduct.jpg')}}" alt="Portada" class="aspect-[3/1] w-full  object-cover object-center">
    </figure>
    <x-validation-errors class="mb-4"> 

    </x-validation-errors>
    <div class="mb-4">
        <x-label>
            Titulo
        </x-label>
        <x-input name="title" value="{{old('title')}}" class="w-full" placeholder="Ingrese el título de la portada"></x-input>
    </div>

    
    <div class="mb-4">
        <x-label>
            Fecha inicio
        </x-label>
        <x-input type="date" name="start_at" value="{{old('start_at', now()->format('Y-m-d'))}}" class="w-full"></x-input>
    </div>

    <div class="mb-4">
        <x-label>
            Fecha Fin(opcional)
        </x-label>
        <x-input type="date" name="end_at" value="{{old('end_at')}}" class="w-full" ></x-input>
    </div>
    <div class="mb-4 flex space-x-2">
    
        <label>
            <x-input type="radio" name="is_active" value="1" checked/>
            Activo
        </label>

        <label>
            <x-input type="radio" name="is_active" value="0"/>
            Inactivo
        </label>
    </div>

    <div class="flex justify-end ">
        <x-button>
            Crear Portada
        </x-button>
    </div>

</form>

@push('js')
    <script>
                function previewImage(event, querySelector){

        //Recuperamos el input que desencadeno la acción
        const input = event.target;

        //Recuperamos la etiqueta img donde cargaremos la imagen
        $imgPreview = document.querySelector(querySelector);

        // Verificamos si existe una imagen seleccionada
        if(!input.files.length) return

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