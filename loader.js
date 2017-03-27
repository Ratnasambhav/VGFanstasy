const messages = ['Enemy Hero Killed', 'Ally Hero Killed', 'The Kraken has Awakned', 'Enemy team collected from Gold Mine', 'Enemy is Impressive', 'You are a Nightmare', 'Triple Kill', 'Double Kill', 'Allied Turret Destroyed', 'Enemy Turret Destroyed', 'Kraken Unleashed'];

function toasta() {
    var num = Math.floor((Math.random() * 10) + 1);
    Materialize.toast(messages[num], 4000);
}