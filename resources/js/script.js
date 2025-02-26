$(function () { // if document is ready
  alert('hello world')
});


document.addEventListener('DOMContentLoaded', function () {
  var items = document.querySelectorAll('.accordion-item a');

  items.forEach(function (item) {
    item.addEventListener('click', function (event) {
      var currentItem = document.querySelector('.accordion-item.active');

      if (currentItem && currentItem !== item.parentNode) {
        currentItem.classList.remove('active');
      }

      item.parentNode.classList.toggle('active');
      event.preventDefault();
    });
  });
});
