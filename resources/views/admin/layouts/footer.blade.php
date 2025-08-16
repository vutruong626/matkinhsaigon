@php

$routeCheckKey = Route::current()->getName();
@endphp

<script src="{{asset('backend/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('backend/ckfinder/ckfinder.js')}}"></script>
<script type="text/javascript">
    CKEDITOR.replace( 'editorDescription' ,{
        filebrowserUploadUrl: "{{route('upload.uploadImage', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form',
        uiColor : '#9AB8F3',
        language:'en',
        height: 300,
        filebrowserBrowseUrl : "{{ asset('backend/ckfinder/ckfinder.html') }}",
        filebrowserImageBrowseUrl : "{{ asset('backend/ckfinder/ckfinder.html?Type=Images') }}",
        filebrowserFlashBrowseUrl : "{{ asset('backend/ckfinder/ckfinder.html?Type=Flash') }}",
        filebrowserLinkBrowseUrl : "{{ asset('backend/ckfinder/ckfinder.html') }}",
        filebrowserImageUploadUrl : "{{ asset('backend/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}",
        filebrowserFlashUploadUrl : "{{ asset('backend/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}",
        filebrowserLinkUploadUrl : "{{ asset('backend/ckfinder/core/connector/php/connector.php?command=QuickUpload') }}",
    });
    CKEDITOR.replace( 'editorContent' ,{
        filebrowserUploadUrl: "{{route('upload.uploadImage', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form',
        uiColor : '#9AB8F3',
        language:'en',
        height: 300,
        filebrowserBrowseUrl : '{{ asset('backend/ckfinder/ckfinder.html') }}',
        filebrowserImageBrowseUrl : '{{ asset('backend/ckfinder/ckfinder.html?Type=Images') }}',
        filebrowserFlashBrowseUrl : '{{ asset('backend/ckfinder/ckfinder.html?Type=Flash') }}',
        filebrowserLinkBrowseUrl : '{{ asset('backend/ckfinder/ckfinder.html') }}',
        filebrowserImageUploadUrl : '{{ asset('backend/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
        filebrowserFlashUploadUrl : '{{ asset('backend/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}',
        filebrowserLinkUploadUrl : '{{ asset('backend/ckfinder/core/connector/php/connector.php?command=QuickUpload') }}',
    });
    CKEDITOR.replace( 'editorNameSpecifications' ,{
        filebrowserUploadUrl: "{{route('upload.uploadImage', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form',
        uiColor : '#9AB8F3',
        language:'en',
        height: 300,
        filebrowserBrowseUrl : '{{ asset('backend/ckfinder/ckfinder.html') }}',
        filebrowserImageBrowseUrl : '{{ asset('backend/ckfinder/ckfinder.html?Type=Images') }}',
        filebrowserFlashBrowseUrl : '{{ asset('backend/ckfinder/ckfinder.html?Type=Flash') }}',
        filebrowserLinkBrowseUrl : '{{ asset('backend/ckfinder/ckfinder.html') }}',
        filebrowserImageUploadUrl : '{{ asset('backend/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
        filebrowserFlashUploadUrl : '{{ asset('backend/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}',
        filebrowserLinkUploadUrl : '{{ asset('backend/ckfinder/core/connector/php/connector.php?command=QuickUpload') }}',
    });
    CKEDITOR.replace( 'editorNameConsultingService' ,{
        filebrowserUploadUrl: "{{route('upload.uploadImage', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form',
        uiColor : '#9AB8F3',
        language:'en',
        height: 300,
        filebrowserBrowseUrl : '{{ asset('backend/ckfinder/ckfinder.html') }}',
        filebrowserImageBrowseUrl : '{{ asset('backend/ckfinder/ckfinder.html?Type=Images') }}',
        filebrowserFlashBrowseUrl : '{{ asset('backend/ckfinder/ckfinder.html?Type=Flash') }}',
        filebrowserLinkBrowseUrl : '{{ asset('backend/ckfinder/ckfinder.html') }}',
        filebrowserImageUploadUrl : '{{ asset('backend/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
        filebrowserFlashUploadUrl : '{{ asset('backend/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}',
        filebrowserLinkUploadUrl : '{{ asset('backend/ckfinder/core/connector/php/connector.php?command=QuickUpload') }}',
    });
    CKEDITOR.replace( 'editorNameShoppingGuide' ,{
        filebrowserUploadUrl: "{{route('upload.uploadImage', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form',
        uiColor : '#9AB8F3',
        language:'en',
        height: 300,
        filebrowserBrowseUrl : '{{ asset('backend/ckfinder/ckfinder.html') }}',
        filebrowserImageBrowseUrl : '{{ asset('backend/ckfinder/ckfinder.html?Type=Images') }}',
        filebrowserFlashBrowseUrl : '{{ asset('backend/ckfinder/ckfinder.html?Type=Flash') }}',
        filebrowserLinkBrowseUrl : '{{ asset('backend/ckfinder/ckfinder.html') }}',
        filebrowserImageUploadUrl : '{{ asset('backend/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
        filebrowserFlashUploadUrl : '{{ asset('backend/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}',
        filebrowserLinkUploadUrl : '{{ asset('backend/ckfinder/core/connector/php/connector.php?command=QuickUpload') }}',
    });
    CKEDITOR.replace( 'editorNameAddresse' ,{
        filebrowserUploadUrl: "{{route('upload.uploadImage', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form',
        uiColor : '#9AB8F3',
        language:'en',
        height: 300,
        filebrowserBrowseUrl : '{{ asset('backend/ckfinder/ckfinder.html') }}',
        filebrowserImageBrowseUrl : '{{ asset('backend/ckfinder/ckfinder.html?Type=Images') }}',
        filebrowserFlashBrowseUrl : '{{ asset('backend/ckfinder/ckfinder.html?Type=Flash') }}',
        filebrowserLinkBrowseUrl : '{{ asset('backend/ckfinder/ckfinder.html') }}',
        filebrowserImageUploadUrl : '{{ asset('backend/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
        filebrowserFlashUploadUrl : '{{ asset('backend/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}',
        filebrowserLinkUploadUrl : '{{ asset('backend/ckfinder/core/connector/php/connector.php?command=QuickUpload') }}',
    });
    CKEDITOR.replace( 'editorNameOpenTime' ,{
        filebrowserUploadUrl: "{{route('upload.uploadImage', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form',
        uiColor : '#9AB8F3',
        language:'en',
        height: 300,
        filebrowserBrowseUrl : '{{ asset('backend/ckfinder/ckfinder.html') }}',
        filebrowserImageBrowseUrl : '{{ asset('backend/ckfinder/ckfinder.html?Type=Images') }}',
        filebrowserFlashBrowseUrl : '{{ asset('backend/ckfinder/ckfinder.html?Type=Flash') }}',
        filebrowserLinkBrowseUrl : '{{ asset('backend/ckfinder/ckfinder.html') }}',
        filebrowserImageUploadUrl : '{{ asset('backend/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
        filebrowserFlashUploadUrl : '{{ asset('backend/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}',
        filebrowserLinkUploadUrl : '{{ asset('backend/ckfinder/core/connector/php/connector.php?command=QuickUpload') }}',
    });
    CKEDITOR.replace( 'editorEditContent' ,{
        filebrowserUploadUrl: "{{route('upload.uploadImage', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form',
        uiColor : '#9AB8F3',
        language:'en',
        height: 300,
        filebrowserBrowseUrl : '{{ asset('backend/ckfinder/ckfinder.html') }}',
        filebrowserImageBrowseUrl : '{{ asset('backend/ckfinder/ckfinder.html?Type=Images') }}',
        filebrowserFlashBrowseUrl : '{{ asset('backend/ckfinder/ckfinder.html?Type=Flash') }}',
        filebrowserLinkBrowseUrl : '{{ asset('backend/ckfinder/ckfinder.html') }}',
        filebrowserImageUploadUrl : '{{ asset('backend/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
        filebrowserFlashUploadUrl : '{{ asset('backend/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}',
        filebrowserLinkUploadUrl : '{{ asset('backend/ckfinder/core/connector/php/connector.php?command=QuickUpload') }}',
    });
    CKEDITOR.replace( 'editorInfo' ,{
        filebrowserUploadUrl: "{{route('upload.uploadImage', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form',
        uiColor : '#9AB8F3',
        language:'en',
        height: 300,
        filebrowserBrowseUrl : '{{ asset('backend/ckfinder/ckfinder.html') }}',
        filebrowserImageBrowseUrl : '{{ asset('backend/ckfinder/ckfinder.html?Type=Images') }}',
        filebrowserFlashBrowseUrl : '{{ asset('backend/ckfinder/ckfinder.html?Type=Flash') }}',
        filebrowserLinkBrowseUrl : '{{ asset('backend/ckfinder/ckfinder.html') }}',
        filebrowserImageUploadUrl : '{{ asset('backend/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
        filebrowserFlashUploadUrl : '{{ asset('backend/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}',
        filebrowserLinkUploadUrl : '{{ asset('backend/ckfinder/core/connector/php/connector.php?command=QuickUpload') }}',
    });
    
</script>



<!-- BEGIN: GLOBAL-->

    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('admin/js/asset-app/vendors.min.js') }}"></script>
    
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('admin/js/asset-app/app-menu.js') }}"></script>
    <script src="{{ asset('admin/js/asset-app/app.js') }}"></script>
    <script src="{{ asset('admin/js/asset-app/components.js') }}"></script>
    <!-- END: Theme JS-->
    
    <script src="{{ asset('admin/js/asset-app/bootstrap-toast.js') }}"></script>
    <script src="{{ asset('admin/js/asset-app/jquery.MultiFile.min.js') }}"></script>
<!-- END: GLOBAL-->

@if(str_contains($routeCheckKey, 'customer.') || str_contains($routeCheckKey, 'user.'))    
    <!-- BEGIN: Page Customer-->
    <script src="{{ asset('admin/js/asset-app/datatables.min.js') }}"></script>
    <script src="{{ asset('admin/js/asset-app/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin/js/asset-app/datatables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/js/asset-app/buttons.bootstrap.min.js') }}"></script>
    
    <script src="{{ asset('admin/js/asset-app/data-list-view-dev_tr.js') }}"></script>
    <!-- END: Page Customer-->

@endif

<!-- dashboard -->
<script src="{{ asset('admin/js/asset-app/apexcharts.min.js') }}"></script>
<script src="{{ asset('admin/js/asset-app/dashboard-ecommerce.js') }}"></script>
<!-- dashboard -->


// iput number
<script src="{{ asset('admin/js/asset-app/datatables.min.js') }}"></script>
<script src="{{ asset('admin/js/asset-app/datatables.buttons.min.js') }}"></script>
<script src="{{ asset('admin/js/asset-app/datatables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/js/asset-app/buttons.bootstrap.min.js') }}"></script>
<script src="{{asset('admin/js/asset-app/jquery.bootstrap-touchspin.js')}}"></script>   
<script src="{{asset('admin/js/asset-app/number-input.js')}}"></script>

<script src="{{ asset('admin/js/asset-app/data-list-view-dev_truong.js') }}"></script>

<script src="{{ asset('admin/js/custom/global.js') }}"></script>
<script src="{{ asset('admin/js/main.js') }}"></script>
<script src="{{ asset('admin/js/dev_truong.js') }}"></script>