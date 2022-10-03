<?php

namespace App\Http\Livewire;

use App\Models\Orders;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PaymentOrder extends Component
{


    // use AuthorizesRequests;
    public $order;

    protected $listeners = ['payOrder'];

    public function mount(Orders $order)
    {

        $this->order = $order;
    }

    public function payOrder()
    {

        $this->order->status = 2;

        $this->order->save();

        return redirect()->route('orders.show', $this->order);
    }


    public function render()
    {

        //$this->authorize('author', $this->order);
        //$this->authorize('payment', $this->order);

        $items = json_decode($this->order->content);
        $envio = json_decode($this->order->envio);

        return view('livewire.payment-order', compact('items', 'envio'));
    }
}
