<?php

namespace App\Livewire\Destination;

use Livewire\Component;

class ShowDestination extends Component
{

    public $destination;
    public $urlPath;

    public function render()
    {
        return view('livewire.destination.show-destination');
    }
}
