let ckeditors = document.querySelectorAll('.form-control.myckeditor');
console.log(ckeditors);
 ckeditors.forEach(ckeditor => {
  
    ClassicEditor
    .create(  ckeditor  ,{
        removePlugins: [ 'Title' ],
    toolbar: {

        items: [

          'heading',
          '|',
          'bold',
          'italic',
          'link',
          'bulletedList',
          'numberedList',
          '|',
          'indent',
          'outdent',
          '|',
          'blockQuote',
          'insertTable',
          'mediaEmbed',
          'undo',
          'redo',
          'alignment',
          'fontBackgroundColor',
          'fontColor',
          'fontSize',
          'highlight',
          'fontFamily',
          'horizontalLine',
          'htmlEmbed',
          'removeFormat',
          'specialCharacters',
          'strikethrough',
          'underline',
          'todoList'
        ]
    }})
    .then( editor => {
   
    } )
    .catch( error => {
        console.error( error );
    } );
});

