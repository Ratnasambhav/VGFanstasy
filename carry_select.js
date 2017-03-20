$( document ).ready(function() {
  $('.button-collapse').sideNav();
  $('.tooltipped').tooltip({delay: 50});
  $('ul.tabs').tabs({
      swipeable: true
  });
});

function slotOne(item) {
  const slot1 = document.querySelector('body > div.row.container > div.col.s2.slot1 > img');
  slot1.src = `file:///Users/ratnasambhavpriyadarshi/Development/VGFantasy/Images/VGPics/VG%20Items/${item}.png`
}

function slotTwo(item) {
  const slot2 = document.querySelector('body > div.row.container > div.col.s2.slot2 > img');
  slot2.src = `file:///Users/ratnasambhavpriyadarshi/Development/VGFantasy/Images/VGPics/VG%20Items/${item}.png`
}

function slotThree(item) {
  const slot3 = document.querySelector('body > div.row.container > div.col.s2.slot3 > img');
  slot3.src = `file:///Users/ratnasambhavpriyadarshi/Development/VGFantasy/Images/VGPics/VG%20Items/${item}.png`
}

function slotFour(item) {
  const slot4 = document.querySelector('body > div.row.container > div.col.s2.slot4 > img');
  slot4.src = `file:///Users/ratnasambhavpriyadarshi/Development/VGFantasy/Images/VGPics/VG%20Items/${item}.png`
}

function slotFive(item) {
  const slot5 = document.querySelector('body > div.row.container > div.col.s2.slot5 > img');
  slot5.src = `file:///Users/ratnasambhavpriyadarshi/Development/VGFantasy/Images/VGPics/VG%20Items/${item}.png`
}

function slotSix(item) {
  const slot6 = document.querySelector('body > div.row.container > div.col.s2.slot6 > img');
  slot6.src = `file:///Users/ratnasambhavpriyadarshi/Development/VGFantasy/Images/VGPics/VG%20Items/${item}.png`
}