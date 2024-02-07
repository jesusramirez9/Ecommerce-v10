<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Categorias',
        'route' => route('admin.categories.index'),
    ],
    [
        'name' => $category->name,
    ]
]">

<div class="card">
    <x-validation-errors class="mb-4">

    </x-validation-errors>
    
    <form action="{{route('admin.categories.update', $category)}}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <x-label class="mb-2">
                Familia
            </x-label>
            <x-select name="family_id" class="w-full" id="">
                @foreach ($families as $family)
                    <option value="{{$family->id}}" @selected(old('family_id', $category->family_id) == $family->id)>

                        {{$family->name}}
                    </option>
                @endforeach
            </x-select>
        </div>

        <div class="mb-4">
            <x-label class="mb-2">
                nombre
            </x-label>
            <x-input class="w-full" placeholder="Ingrese el nombre" name="name" value="{{old('name', $category->name)}}" />

        </div>
        <div class="flex justify-end space-x-2">
            <x-danger-button onclick="confirmDelete()" >
                Eliminar
            </x-danger-button>
            <x-button class="ml-2">
                Actualizar 
            </x-button>
        </div>
    </form>

</div>

    <form action="{{route('admin.categories.destroy', $category)}}" method="POST" id="delete-form">
    @csrf
    @method('DELETE')



    </form>

    @push('js')
        <script>
            function confirmDelete(){
                // document.getElementById('delete-form').submit();

                Swal.fire({
                    title: "Estas seguro?",
                    text: "No podras revertir esto!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Si, Borrelo!",
                    cancelButtonText: "Cancelar"
                    }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-form').submit();
                    }
                    });
            }
        </script>
    @endpush



</x-admin-layout>