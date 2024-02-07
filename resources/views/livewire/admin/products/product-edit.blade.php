<div>

    <form wire:submit="store">





        <figure class="mb-4 relative">
            <div class="absolute top-8 right-8">
                <label class="flex items-center px-4 py2 rounded-lg bg-white cursor-pointer hover:text-gray-700">
                    <i class="fas fa-camera mr-2"></i>
                    Actualizar imagen

                    <input type="file" class="hidden" accept="image/*" wire:model="image" name="" id="">
                </label>
            </div>

            <img src="{{ $image ? $image->temporaryUrl() : Storage::url($productEdit['image_path']) }}"
                class="aspect-[16/9] object-cover object-center w-full" alt="">
        </figure>

        <x-validation-errors class="mb-4"></x-validation-errors>

        <div class="card">
            <div class="mb-4">
                <x-label class="mb-2">
                    Código
                </x-label>
                <x-input wire:model="productEdit.sku" class="w-full" placeholder="Ingrese el código del producto" />
            </div>
            <div class="mb-4">
                <x-label class="mb-2">
                    Nombre
                </x-label>
                <x-input wire:model="productEdit.name" class="w-full" placeholder="Ingrese el nombre del producto" />
            </div>
            <div class="mb-4">
                <x-label class="mb-2">
                    Descripcion
                </x-label>
                <x-textarea wire:model="productEdit.description" class="w-full"
                    placeholder="Ingrese la descripcion del producto"></x-textarea>
            </div>
            <div class="mb-4">
                <x-label class="mb-2">
                    Familias
                </x-label>
                <x-select class="w-full" wire:model.live="family_id">
                    <option value="" disabled>Seleccione una familia</option>
                    @foreach ($families as $family)
                        <option value="{{ $family->id }}">{{ $family->name }}</option>
                    @endforeach
                </x-select>

            </div>
            <div class="mb-4">
                <x-label class="mb-2">
                    Categoría
                </x-label>
                <x-select class="w-full" wire:model.live="category_id">
                    <option value="" disabled>Seleccione una categoría</option>
                    @foreach ($this->categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </x-select>

            </div>
            <div class="mb-4">
                <x-label class="mb-2">
                    Subcategoría
                </x-label>
                <x-select class="w-full" wire:model.live="productEdit.subcategory_id">
                    <option value="" disabled>Seleccione una subcategoria</option>
                    @foreach ($this->subcategories as $subcategory)
                        <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                    @endforeach
                </x-select>

            </div>

            <div class="mb-4">
                <x-label class="mb-2">
                    Precio
                </x-label>
                <x-input type="number" step="0.01" wire:model="productEdit.price" class="w-full"
                    placeholder="Ingrese el precio del producto" />
            </div>

            @empty($product->variants->count() > 0)
            <div class="mb-4">
                <x-label class="mb-2">
                    Stock
                </x-label>
                <x-input type="number" wire:model="productEdit.stock" class="w-full"
                    placeholder="Ingrese el stock del producto" />
            </div>
            @endempty

           
        </div>

        <div class="flex justify-end">

            <x-danger-button onclick="confirmDelete()">
                Eliminar
            </x-danger-button>
            <x-button class="ml-2">
                Actualizar
            </x-button>
        </div>

    </form>

</form>

<form action="{{ route('admin.products.destroy', $product) }}" method="POST" id="delete-form">
    @csrf
    @method('DELETE')



</form>

@push('js')
<script>
    function confirmDelete() {
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

</div>
