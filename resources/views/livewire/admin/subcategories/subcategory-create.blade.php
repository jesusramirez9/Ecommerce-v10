<div>
   <div class="card">

    <x-validation-errors class="mb-4">

    </x-validation-errors>

    <form wire:submit="save">
        <div class="mb-4">
            <x-label class="mb-2">
                Familias
            </x-label>
            <x-select class="w-full" wire:model.live="subcategory.family_id">
                <option value="" disabled>Seleccione una familia</option>
                @foreach ($families as $family)
                    <option value="{{$family->id}}">
                        {{$family->name}}
                    </option>
                @endforeach
            </x-select>
        </div>
      <div class="mb-4">
            <x-label class="mb-2">
                Categoría
            </x-label>
            <x-select name="family_id" class="w-full" id="" wire:model.live="subcategory.category_id">

                <option value="" disabled>Seleccione una categoria</option>
                @foreach ($this->categories as $category)
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
            <x-input class="w-full" placeholder="Ingrese el nombre" wire:model="subcategory.name" />

        </div>
        <div class="flex justify-end">
            <x-button>
                Guardar 
            </x-button>
        </div>
    </form>
    
</div>

</div>
