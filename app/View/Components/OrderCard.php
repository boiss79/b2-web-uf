<?php

namespace App\View\Components;

use Illuminate\View\Component;

class OrderCard extends Component
{
    public $order;
    public $index;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($order, $index)
    {
        $this->order = $order;
        $this->index = $index;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.order-card');
    }
}
