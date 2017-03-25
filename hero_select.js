$(document).ready(function () {
  $('.button-collapse').sideNav();
  $('.tooltipped').tooltip({
    delay: 50
  });
});

function heroCheck(name) {
  const captainName = document.querySelector('body > div.selected_hero > div > div:nth-child(1) > div.col.s12.captain-name > h5').innerHTML.toLowerCase();
  const carryName = document.querySelector('body > div.selected_hero > div > div:nth-child(2) > div.col.s12.carry-name > h5').innerHTML.toLowerCase();
  const junglerName = document.querySelector('body > div.selected_hero > div > div:nth-child(3) > div.col.s12.jungler-name > h5').innerHTML.toLowerCase();
  if (name === captainName || name === carryName || name === junglerName) {
    Materialize.toast('Hero already selected', 4000);
    return false;
  } else {
    return true;
  }
}

function toTitleCase(str) {
  return str.replace(/\w\S*/g, function (txt) {
    return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
  });
}

function captain(hero) {
  if (heroCheck(hero)) {
    const img = document.querySelector('.captain-img');
    const name = document.querySelector('.captain-name');
    const phpCaptain = document.querySelector('#cap-n');
    phpCaptain.innerHTML = hero;
    img.src = `Images/VGPics/VG Hero Portraits/${hero}.png`;
    name.innerHTML = `<h5>${toTitleCase(hero)}</h5>`;
  }
}

function carry(hero) {
  if (heroCheck(hero)) {
    const img = document.querySelector('.carry-img');
    const name = document.querySelector('.carry-name');
    const phpCarry = document.querySelector('#car-n');
    phpCarry.innerHTML = hero;
    img.src = `Images/VGPics/VG Hero Portraits/${hero}.png`;
    name.innerHTML = `<h5>${toTitleCase(hero)}</h5>`;
  }
}

function jungler(hero) {
  if (heroCheck(hero)) {
    const img = document.querySelector('.jungler-img');
    const name = document.querySelector('.jungler-name');
    const phpJungler = document.querySelector('#jung-n');
    phpJungler.innerHTML = hero;
    img.src = `Images/VGPics/VG Hero Portraits/${hero}.png`;
    name.innerHTML = `<h5>${toTitleCase(hero)}</h5>`;
  }
}