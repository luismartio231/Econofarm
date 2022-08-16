<?php

namespace App\Http\Livewire;


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


        if ($this->search) {
            $products = Products::where('name', 'LIKE' ,'%' . $this->search . '%')
                                ->where('status', 2)
                                ->take(8)
                                ->get();
        } else {
            $products = [];
        }

        return view('livewire.search', compact('products'));

    }
}
