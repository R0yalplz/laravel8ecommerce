<?php

namespace App\Http\Livewire\Admin;

use App\Models\Livewire\Admin;
use App\Models\HomeSlider;
use Livewire\Component;
use Carbon\Carbon;
use Livewire\WithFileUploads; 

class AdminAddHomesliderComponent extends Component
{ 

        use WithFileUploads;
        public $title;
        public $subtitle;
        public $price;
        public $link;
        public $image;
        public $status;

        public function mount()
        {
            $this->status = 0;
        }


        public function addSlide(){
            $slider = new HomeSlider();
            $slider->title = $this->title;
            $slider->subtitle = $this->subtitle;
            $slider->price = $this->price;
            $slider->link = $this->link;
            $imagename = Carbon::now()->timestamp.'.'.$this->image->extension();
            $this->image->storeAs('sliders',$imagename); 
            $slider->image = $imagename;
            $slider->status = $this->status;
            $slider->save();
            session()->flash('message','Slide has been created sucessfully!');
        }


         public function render()
    {

        return view('livewire.admin.admin-add-homeslider-component')->layout('layouts.base');
    }
}
