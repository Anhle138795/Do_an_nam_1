<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $category_id;

    public function deleteProduct($category_id)
    {
        $this->category_id = $category_id;
    }

    public function destroyProduct()
    {
        $product = Product::find($this->category_id);
        $path = 'uploads/products/'.$product->image;
        if(File::exists($path)){
            File::delete($path);
        }
        $product->delete();
        session()->flash('message', 'Product Deleted Successfully');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {
        $products = Product::orderBy('id','DESC')->paginate(10);
        return view('livewire.admin.product.index',['products' => $products]);
    }
}
