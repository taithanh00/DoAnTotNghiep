<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithFileUploads;

class ProductMediaManager extends Component
{
    use WithFileUploads;
    public Product $product;
    public array $media = [];

    public function render()
    {
        return view('livewire.admin.product-media-manager');
    }
}
