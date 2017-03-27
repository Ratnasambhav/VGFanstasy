$( document ).ready(function() {
  $('.button-collapse').sideNav();
  $('.tooltipped').tooltip({delay: 50});
});

function slotSelect(item, id) {
  const slot = document.querySelector(id);
  const php = document.querySelector(`${id}-php`);
  php.value= item;
//test
  php.innerHTML= item;
  slot.src = `Images/VGPics/VG Items/${item}.png`;
}