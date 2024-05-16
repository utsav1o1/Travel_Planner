<?php

namespace App\Livewire\Destination;

use Livewire\Component;

class ShowDestination extends Component
{

    public $destination;

    public function render()
    {
        return view('livewire.destination.show-destination');
    }
}
