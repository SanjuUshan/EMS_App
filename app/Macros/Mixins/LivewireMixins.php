<?php

namespace App\Macros\Mixins;

class LivewireMixins
{
    public function showToastr($title = '', $msg = '', $type = 'success')
    {
        /** @var \Livewire\Component $this */
        static::dispatchBrowserEvent('toastr:show', ['type' => $type, 'title' => $title, 'msg' => $msg]);
    }
    public function showSweetAlert(
        $type = 'warning',
        $title = 'Are you sure ?',
        $text = '',
        $confirmButtonText = 'Yes',
        $lwevent = null,
        $lwdata = null
    ) {
        /** @var \Livewire\Component $this */
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => $type,
            'title' => $title,
            'text' => $text,
            'confirmButtonText' => $confirmButtonText,
            'lwevent' => $lwevent,
            'lwdata' => $lwdata,
        ]);
    }
}
