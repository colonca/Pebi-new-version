<?php

namespace App\Http\Livewire\Traits;

trait InteractsWithModal
{
    protected function openModal(string $form, $params = [], ?string $modalSize = null)
    {
        $this->emitTo('components.modal', 'showModal', $form, $params, $modalSize);
    }

    protected function closeModal()
    {
        $this->emitTo('components.modal', 'closeModal');
        $this->closeDeleteModal();
    }

    public function closeDeleteModal()
    {
        $this->emitTo('components.delete-modal', 'closeModal');
    }

    public function deleteModal($model)
    {
        $params = [
            'id' => $model->id,
            'className' => get_class($model)
        ];
        $this->emitTo('components.delete-modal', 'showModal', $params);
    }
}
