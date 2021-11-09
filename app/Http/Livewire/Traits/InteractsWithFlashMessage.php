<?php 

namespace App\Http\Livewire\Traits;

trait InteractsWithFlashMessage {

   public function message(string $message, string $style = 'success') {
        session()->flash('message',$message);
	session()->flash('style', $style);
	$this->dispatchBrowserEvent('flash-message', [
	    'message' => $message,
	    'style' => $style 
	]);
   }

}