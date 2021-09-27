

        <!--begin::Javascript-->
        <!--begin::Global Javascript Bundle(used by all pages)-->

        <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>

        <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>

       <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>

       <script src="{{ asset('assets/plugins/custom/tinymce/tinymce.bundle.js') }}"></script>

       <script src="{{ asset('assets/plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>

       <script src="https://documentcloud.adobe.com/view-sdk/main.js"></script>
        <!--end::Global Javascript Bundle-->
        <script src="{{ asset('js/custom.js') }}"></script>
        @include('not.not')
        <script src="{{ asset('js/main.js') }}"></script>
        <!--end::Javascript-->
    </body>
    <!--end::Body-->

</html>
