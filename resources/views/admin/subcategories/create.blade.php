<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Subcategorias',
        'route' => route('admin.subcategories.index'),
    ],
    [
        'name' => 'Nueva subcategoria'
    ]
]">




{{-- <div class="card">

    <x-validation-errors class="mb-4">

    </x-validation-errors>

    <form action="{{route('admin.subcategories.store')}}" method="POST">
        @csrf
        <div class="mb-4">
            <x-label class="mb-2">
                Categoría
            </x-label>
            <x-select name="family_id" class="w-full" id="">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}" @selected(old('category_id') == $category->id)>
                        {{$category->name}}
                    </option>
                @endforeach
            </x-select>
        </div>
        <div class="mb-4">
            <x-label class="mb-2">
                nombre
            </x-label>
            <x-input class="w-full" placeholder="Ingrese el nombre" name="name" value="{{old('name')}}" />

        </div>
        <div class="flex justify-end">
            <x-button>
                Guardar 
            </x-button>
        </div>
    </form>

</div> --}}

@livewire('admin.subcategories.subcategory-create')

</x-admin-layout>