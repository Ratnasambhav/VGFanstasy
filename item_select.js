$( document ).ready(function() {
  $('.button-collapse').sideNav();
  $('.tooltipped').tooltip({delay: 50});
  $('ul.tabs').tabs({
      swipeable: true
  });
});

function slotOne(item) {
  const slot1 = document.querySelector('body > div.row.container.selected-items.center-align > div.col.m2.s6.slot1 > img');
  slot1.src = `Images/VGPics/VG Items/${item}.png`;
}

function slotTwo(item) {
  const slot2 = document.querySelector('body > div.row.container.selected-items.center-align > div.col.m2.s6.slot2 > img');
  slot2.src = `Images/VGPics/VG Items/${item}.png`;
}

function slotThree(item) {
  const slot3 = document.querySelector('body > div.row.container.selected-items.center-align > div.col.m2.s6.slot3 > img');
  slot3.src = `Images/VGPics/VG Items/${item}.png`;
}
function slotFour(item) {
  const slot4 = document.querySelector('body > div.row.container.selected-items.center-align > div.col.m2.s6.slot4 > img');
  slot4.src = `Images/VGPics/VG Items/${item}.png`;
}

function slotFive(item) {
  const slot5 = document.querySelector('body > div.row.container.selected-items.center-align > div.col.m2.s6.slot5 > img');
  slot5.src = `Images/VGPics/VG Items/${item}.png`;
}

function slotSix(item) {
  const slot6 = document.querySelector('body > div.row.container.selected-items.center-align > div.col.m2.s6.slot6 > img');
  slot6.src = `Images/VGPics/VG Items/${item}.png`;
}
