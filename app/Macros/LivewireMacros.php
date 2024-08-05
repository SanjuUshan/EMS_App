<?php

namespace App\Macros;

use App\Macros\Mixins\LivewireMixins;
use Livewire\Component;

class LivewireMacros
{
    public function __invoke()
    {
        // Component::mixin(new LivewireMixins);
        /**
         * Show Toastr toast
         *
         * @param  string  $title toast title
         * @param  string  $msg toast text
         * @param  string  $type toast type : success, error, warning, info
         */
        Component::macro('toastr', function ($title = '', $msg = '', $type = 'success') {
            /** @var \Livewire\Component $this */
            $this->dispatch('toastr:show', ['type' => $type, 'title' => $title, 'msg' => $msg]);
        });
        /**
         * Show Sweet Alert toast
         *
         * @param  string  $title toast title
         * @param  string  $msg toast text
         * @param  string  $type toast type : success, error, warning, info, question
         */
        Component::macro('sweetToast', function ($title = '', $msg = '', $type = 'success') {
            /** @var \Livewire\Component $this */
            $this->dispatch('swal:toast:show', ['type' => $type, 'title' => $title, 'msg' => $msg]);
        });
        /**
         * Show Sweet Alert Popup
         *
         * @param  string  $type  success, error, warning, info, question
         * @param  string  $title popup title
         * @param  string  $text popup text
         * @param  string  $confirmButtonText OK button text
         * @param  string  $lwevent livewire component event
         * @param  string  $lwdata data pass to the triggered event
         */
        Component::macro('sweetAlert', function (
            $type = 'question',
            $title = 'Are you sure ?',
            $text = '',
            $confirmButtonText = '',
            $options = [],
            $lwevent = null,
            $lwdata = null
        ) {

            // $allOptions = [
            //     'title' => '', // as HTML
            //     'titleText' => '', // as Text
            //     'text' => '',
            //     'icon' => '',
            //     'showConfirmButton' => true,
            //     'showDenyButton' => false,
            //     'showCancelButton' => true,
            //     'confirmButtonColor' => '#d33',
            //     'cancelButtonColor' => '#3085d6',
            //     'confirmButtonText' => '',
            //     'denyButtonText' => '',
            //     'cancelButtonText' => '',
            //     'customClass' => [
            //         'container' => "...",
            //         'popup' => "...",
            //         'header' => "...",
            //         'title' => '',
            //         'closeButton' => "...",
            //         'icon' => "...",
            //         'image' => "...",
            //         'content' => '',
            //         'htmlContainer' => "",
            //         'input' => "",
            //         'inputLabel' => "",
            //         'validationMessage' => "",
            //         'actions' => "",
            //         'confirmButton' => "",
            //         'denyButton' => "",
            //         'cancelButton' => "",
            //         'loader' => "",
            //         'footer' => "",
            //     ]
            // ];

            $swalOptions = [
                'icon' => $type,
                'titleText' => $title,
                'text' => $text,
                'showCancelButton' => true,
                'customClass' => [
                    'title' => 'text-primary',
                    'content' => 'text-muted',
                    'confirmButton' => 'bg-primary',
                    'cancelButton' => 'bg-light text-dark',
                ],
            ];

            if (! empty($confirmButtonText)) {
                $swalOptions['confirmButtonText'] = $confirmButtonText;
            }

            $swalOptions = array_merge($swalOptions, $options);

            $alertData = [
                'options' => json_encode($swalOptions),
                'lwevent' => $lwevent,
                'lwdata' => $lwdata,
            ];

            /** @var \Livewire\Component $this */
            $this->dispatch('swal:alert:show', $alertData);
        });
    }
}
