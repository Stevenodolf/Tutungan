$(document).ready(function () {

    //Quill
    let toolbarOptions = [
        ['bold', 'italic', 'underline', 'strike'],
        [{ 'size': ['small', false , 'large', 'huge'] }, { 'header': [1, 2, 3, 4, 5, 6, false] }],
        [{ 'color': [] }, { 'background': [] }],
        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
        [{ 'align': [] }],
        ['blockquote'],
        ['image'],
        // ['blockquote', 'code-block'],
        // [{ 'header': 1 }, { 'header': 2 }],
        // [{ 'script': 'sub'}, { 'script': 'super' }],
        [{ 'indent': '-1'}, { 'indent': '+1' }]
        // [{ 'direction': 'rtl' }],
        // [{ 'font': [] }]
        // ['clean'],
    ];

    let options = {
        modules: {
            imageResize: {
                displaySize: true
            },
            imageDrop: true,
            toolbar: toolbarOptions
        },
        theme: 'snow'
    };

    let editor = new Quill('#description', options);

    //Filepond
    FilePond.registerPlugin(FilePondPluginFileValidateSize);
    FilePond.registerPlugin(FilePondPluginFileEncode);
    FilePond.registerPlugin(FilePondPluginImagePreview);
    FilePond.registerPlugin(FilePondPluginFileValidateType);
    //Attachment for Sub Ticket
    const inputElement = document.querySelector('input[id="wishPicture"]');
    const pond = FilePond.create(inputElement,{
        allowMultiple: true,
        credits:false,
        maxTotalFileSize:'10MB',
        allowFileEncode:true,
        // instantUpload: false,
        // allowProcess: false,
        maxFiles: 4,
        acceptedFileTypes: ['image/*'],
        storeAsFile: true,
        server:{
            url:'/upload',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        }
    });

    FilePond.setOptions({

    });
});


