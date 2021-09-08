<?php 

namespace App\Support\Concerns;

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