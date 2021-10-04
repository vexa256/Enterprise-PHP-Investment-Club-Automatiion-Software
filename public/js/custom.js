function BootEditor()  {

    var useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;

tinymce.init({
    selector: 'textarea',
    mode : "exact",
    height: 200,
    plugins: 'print preview paste importcss searchreplace autolink autosave save directionality image code  visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
    imagetools_cors_hosts: ['picsum.photos'],
    menubar: 'file edit view insert format tools table help',
    toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
    toolbar_sticky: true,
    paste_data_images: true,

    autosave_ask_before_unload: true,
    autosave_interval: '30s',
    autosave_prefix: '{path}{query}-{id}-',
    autosave_restore_when_empty: false,
    autosave_retention: '2m',
    image_advtab: true,
    link_list: [
      { title: 'My page 1', value: 'https://www.tiny.cloud' },
      { title: 'My page 2', value: 'http://www.moxiecode.com' }
    ],
    image_list: [
      { title: 'My page 1', value: 'https://www.tiny.cloud' },
      { title: 'My page 2', value: 'http://www.moxiecode.com' }
    ],
    image_class_list: [
      { title: 'None', value: '' },
      { title: 'Some class', value: 'class-name' }
    ],
    importcss_append: true,
    file_picker_callback: function (callback, value, meta) {
      /* Provide file and text for the link dialog */
      if (meta.filetype === 'file') {
        callback('https://www.google.com/logos/google.jpg', { text: 'My text' });
      }

      /* Provide image and alt text for the image dialog */
      if (meta.filetype === 'image') {
        callback('https://www.google.com/logos/google.jpg', { alt: 'My alt text' });
      }

      /* Provide alternative source and posted for the media dialog */
      if (meta.filetype === 'media') {
        callback('movie.mp4', { source2: 'alt.ogg', poster: 'https://www.google.com/logos/google.jpg' });
      }
    },
    templates: [
          { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
      { title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
      { title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
    ],
    template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
    template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',

    image_caption: true,
    quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
    noneditable_noneditable_class: 'mceNonEditable',
    toolbar_mode: 'sliding',
    contextmenu: 'link image imagetools table',
    skin: useDarkMode ? 'oxide-dark' : 'oxide',
    content_css: useDarkMode ? 'dark' : 'default',
    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
   });



   }

$(function() {



    if ($("#kt_stepper_example_basic").length > 0){

            // Stepper lement
var element = document.querySelector("#kt_stepper_example_basic");

// Initialize Stepper
var stepper = new KTStepper(element);

// Handle next step
stepper.on("kt.stepper.next", function (stepper) {
    stepper.goNext(); // go next step
});

// Handle previous step
stepper.on("kt.stepper.previous", function (stepper) {
    stepper.goPrevious(); // go previous step
});

      }


    $(document).on("click", ".deleteConfirm", function() {


        var route = $(this).data('route');
        var msg = $(this).data('msg');


        Swal.fire({
         title: 'Are you sure?',
         text: msg,
         icon: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         confirmButtonText: 'Yes'
        }).then((result) => {
         if (result.isConfirmed) {

          window.location = route;
         }
        });
       });


    $('.mytable').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "pageLength" : 5,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
        dom: 'Bfrtip',

          buttons: [

           'excel', 'pdf', 'print'
          ]

      });

$(".tox-statusbar__branding").hide();

setInterval(function() {
    $(".paginate_button").addClass('bg-dark text-light shadow-lg');
}, 1000);


});





   /***Plugins  INtOnly INput*/

   (function(a){a.fn.extend({inputNumberFormat:function(c){this.defaultOptions={decimal:2,decimalAuto:2,separator:".",separatorAuthorized:[".",","],allowNegative:false};var e=a.extend({},this.defaultOptions,c);var d=function(i,f){var h=[];var g="^[0-9]+";if(f.allowNegative){g="^-{0,1}[0-9]*"}if(f.decimal){g+="["+f.separatorAuthorized.join("")+"]?[0-9]{0,"+f.decimal+"}";g=new RegExp(g+"$");h=i.match(g);if(!h){g="^["+f.separatorAuthorized.join("")+"][0-9]{0,"+f.decimal+"}";g=new RegExp(g+"$");h=i.match(g)}}else{g=new RegExp(g+"$");h=i.match(g)}return h};var b=function(k,f){var j=k;if(!j){return j}if(j=="-"){return""}j=j.replace(",",f.separator);if(f.decimal&&f.decimalAuto){j=Math.round(j*Math.pow(10,f.decimal))/(Math.pow(10,f.decimal))+"";if(j.indexOf(f.separator)===-1){j+=f.separator}var h=f.decimalAuto-j.split(f.separator)[1].length;for(var g=1;g<=h;g++){j+="0"}}return j};return this.each(function(){var f=a(this);f.on("keypress",function(j){if(j.ctrlKey){return}if(j.key.length>1){return}var i=a.extend({},e,a(this).data());var g=a(this).val().substr(0,j.target.selectionStart);var h=a(this).val().substr(j.target.selectionEnd,a(this).val().length-1);var k=g+j.key+h;if(!d(k,i)){j.preventDefault();return}});f.on("blur",function(h){var g=a.extend({},e,a(this).data());a(this).val(b(a(this).val(),g))});f.on("change",function(h){var g=a.extend({},e,a(this).data());a(this).val(b(a(this).val(),g))})})}})})(jQuery);
   /***Plugins */



   $(function() {

    $( "input[type='search']" ).removeClass('form-control-solid');

    $( ".table" ).addClass('table-bordered');


    if ($("#inputMonthlySalary").length > 0){


        $('#inputMonthlySalary').inputNumberFormat();

        $("#labelMonthlySalary").html('Monthly salary (UGX)')

    }

    if ($("#inputAmount").length > 0){
        $('#inputAmount').inputNumberFormat();
    }

    if ($(".IntOnlyNow").length > 0){

        $('.IntOnlyNow').inputNumberFormat();
    }


    if ($("#DinputAmount").length > 0){

        $('#DinputAmount').inputNumberFormat();
    }


    if ($("#BinputAmount").length > 0){

        $('#BinputAmount').inputNumberFormat();
    }



   });

   document.addEventListener("adobe_dc_view_sdk.ready", function(){

    $(document).on("click", ".PdfViewer", function() {

       var path = $(this).data('source');
       var doc = $(this).data('doc');

       var adobeDCView = new AdobeDC.View({clientId: "5e9f6777a0444462853a9bdb2d1bb3df", divId: "adobe-dc-view"});
       adobeDCView.previewFile({
           content:{location: {url: path}},
           metaData:{fileName: doc}
       }, {});




       });

   });
