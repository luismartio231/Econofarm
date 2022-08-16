<?php

namespace App\Http\Livewire;

<<<<<<< HEAD
use App\Models\products;
use Livewire\Component;
=======
>>>>>>> carrito

use Livewire\Component;
use App\Models\products;
class Search extends Component
{


public $search;
public $open = false;

    public function updatedSearch($value){
        if ($value) {
            $this->open = true;
        }else{
            $this->open = false;
        }
    }



    public function render()


    {

<<<<<<< HEAD
        $products = products::where('name', 'LIKE'. "%" . $this->search . "%" )->get();

        return view('livewire.search', compact('products'));
=======

        if ($this->search) {
            $products = Products::where('name', 'LIKE' ,'%' . $this->search . '%')
                                ->where('status', 2)
                                ->take(8)
                                ->get();
        } else {
            $products = [];
        }

        return view('livewire.search', compact('products'));

>>>>>>> carrito
    }
}
