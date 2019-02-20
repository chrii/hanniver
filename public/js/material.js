

console.log('yes');
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems);
});
$(document).ready(function() {
    $('input#input_text, textarea#textarea2').characterCounter();
  });