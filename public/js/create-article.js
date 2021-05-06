/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!****************************************!*\
  !*** ./resources/js/create-article.js ***!
  \****************************************/
var ckeditors = document.querySelectorAll('.form-control.myckeditor');
console.log(ckeditors);
ckeditors.forEach(function (ckeditor) {
  ClassicEditor.create(ckeditor, {
    removePlugins: ['Title'],
    toolbar: {
      items: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'indent', 'outdent', '|', 'blockQuote', 'insertTable', 'mediaEmbed', 'undo', 'redo', 'alignment', 'fontBackgroundColor', 'fontColor', 'fontSize', 'highlight', 'fontFamily', 'horizontalLine', 'htmlEmbed', 'removeFormat', 'specialCharacters', 'strikethrough', 'underline', 'todoList']
    }
  }).then(function (editor) {})["catch"](function (error) {
    console.error(error);
  });
});
/******/ })()
;