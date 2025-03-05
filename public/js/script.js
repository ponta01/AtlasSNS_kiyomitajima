// $(function () { // if document is ready
//   alert('hello world')
// });

document.addEventListener("DOMContentLoaded", function () {
  var accordionButtons = document.querySelectorAll(".accordion-button");

  accordionButtons.forEach(function (button) {
    button.addEventListener("click", function () {
      var accordionBody = button.parentElement.nextElementSibling;
      console.log('文字をかく');
      // クリックされたアコーディオンボディをトグル
      accordionBody.classList.toggle("show");

      // collapsed状態をトグル
      button.classList.toggle("collapsed");
    });
  });
});
