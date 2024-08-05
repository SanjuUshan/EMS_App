<?php

namespace App\Traits;

use Livewire\Attributes\On;
use Livewire\ImplicitlyBoundMethod;

/**
 * Add bootstrap modal behavior
 *
 * @property array $modalConfigs
 * @property string $modal_id
 */
trait AsModal
{
    private array $bsModalConfigs = [
        'resetBeforeShow' => true,
    ];

    public function bootedAsModal()
    {
        // $this->listeners = array_merge(['show' => 'showBSModal', 'close' => 'closeBSModal'], $this->listeners);

        if (isset($this->modalConfigs))
            $this->bsModalConfigs = \array_merge($this->bsModalConfigs, $this->modalConfigs);
    }
    public function fireShowModalEvent()
    {
        if (isset($this->modal_id))
            $this->dispatch('modal:show', ['modalName' => $this->modal_id]);
    }
    public function fireCloseModalEvent()
    {
        if (isset($this->modal_id))
            $this->dispatch('modal:close', ['modalName' => $this->modal_id]);
    }

    #[On('show')]
    public function showBSModal(...$data): void
    {
        if ($this->bsModalConfigs['resetBeforeShow']) {
            $this->reset();
        }

        if (method_exists($this, 'beforeShow')) {
            ImplicitlyBoundMethod::call(app(), [$this, 'beforeShow'], $data);
        }

        $this->fireShowModalEvent();
    }

    #[On('close')]
    public function closeBSModal()
    {
        if (method_exists($this, 'beforeClose')) {
            $this->beforeClose();
        }

        $this->fireCloseModalEvent();
    }
}
