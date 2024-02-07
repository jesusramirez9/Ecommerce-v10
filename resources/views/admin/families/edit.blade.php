<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Familias',
        'route' => route('admin.families.index'),
    ],
    [
        'name' => $family->name,
    ]
]">

<div class="card">
    <x-validation-errors class="mb-4">

    </x-validation-errors>
    
    <form action="{{route('admin.families.update', $family)}}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <x-label class="mb-2">
                nombre
            </x-label>
            <x-input class="w-full" placeholder="Ingrese el nombre" name="name" value="{{old('name', $family->name)}}" />

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

    <form action="{{route('admin.families.destroy', $family)}}" method="POST" id="delete-form">
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