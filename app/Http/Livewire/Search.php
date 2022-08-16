<?php

namespace App\Http\Livewire;

use App\Models\products;
use Livewire\Component;

class Search extends Component
{

    public $search;


    public function render()
    {

        $products = products::where('name', 'LIKE'. "%" . $this->search . "%" )->get();

        return view('livewire.search', compact('products'));
    }
}
