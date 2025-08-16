@php 

    if(!isset($arrayDataFormModalScroll)) {
        
        $arrayDataFormModalScroll = [
                'title_modal' => 'Title Default',
                'button_text_modal' => 'Tie',
                'button_class_modal' => 'btn btn-primary',
                'id_modal' => 'modalScrollable',
                'form_route' => null,
        ];
    }

    /* html Using
    @extends('admin.layouts.modal.modal-scroll')
    @php
            $arrayDataFormModalScroll = [
                    'title_modal' => 'Thêm khách hàng mới',
                    'button_text_modal' => 'Thêm',
                    'button_class_modal' => 'btn btn-primary',
                    'id_modal' => 'modalScrollable',
                    'form_route' => route('customer.postAddCustomer'),
            ];
    @endphp

    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#{{$arrayDataFormModalScroll['id_modal']}}">
        Thêm khách hàng mới
    </button>
    @section('content-ModalScroll-body')
    <p class="mb-1">Khách hàng</p>
    @endsection
    */
@endphp

<!-- Form and scrolling Components start -->

<!-- Modal -->
<div class="modal fade" id="{{$arrayDataFormModalScroll['id_modal']}}" tabindex="-1" role="dialog" aria-labelledby="{{$arrayDataFormModalScroll['id_modal']}}" aria-hidden="true">
    @if($arrayDataFormModalScroll['form_route']) 
        <form method="post" id="{{$arrayDataFormModalScroll['id_modal']}}_form" action="{{$arrayDataFormModalScroll['form_route']}}">
    @endif
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="{{$arrayDataFormModalScroll['id_modal']}}Title">{{$arrayDataFormModalScroll['title_modal']}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @yield('content-ModalScroll-body')
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="{{$arrayDataFormModalScroll['button_class_modal']}} me-1 data-submit waves-effect waves-float waves-light">Submit</button>
                        <button type="reset" class="btn btn-outline-secondary waves-effect" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
    @if($arrayDataFormModalScroll['form_route']) 
        </form>
    @endif
</div>
<!-- Form and scrolling Components end -->