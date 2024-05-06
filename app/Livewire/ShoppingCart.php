<?php

namespace App\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class ShoppingCart extends Component
{

    public function mount(){
        Cart::instance('shopping');
    }

    public function increase($rowId){
        Cart::instance('shopping');

        Cart::update($rowId, Cart::get($rowId)->qty + 1);

        if (auth()->check()) {
           
            Cart::store(auth()->user()->id);
            }

        $this->dispatch('cartUpdated', Cart::count());
    }

    public function decrease($rowId){
        Cart::instance('shopping');
        $item = Cart::get($rowId)->qty ;
         

        if ($item > 1) {
            Cart::update($rowId, Cart::get($rowId)->qty - 1);
        }else{
            Cart::remove($rowId);
        }

        if (auth()->check()) {
           
            Cart::store(auth()->user()->id);
            }

        $this->dispatch('cartUpdated', Cart::count());
    }

    public function remove($rowId){
        Cart::instance('shopping');
        Cart::remove($rowId);
        
        if (auth()->check()) {
           
            Cart::store(auth()->user()->id);
            }

        $this->dispatch('cartUpdated', Cart::count());
    }

    public function destroy(){
        Cart::instance('shopping');
        Cart::destroy();

        if (auth()->check()) {
           
            Cart::store(auth()->user()->id);
            }

        $this->dispatch('cartUpdated', Cart::count());
    }

    public function render()
    {
        return view('livewire.shopping-cart');
    }
}
