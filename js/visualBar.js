let epicBar = localStorage.getItem('epic') === 'true' ? true : false;
let legendaryBar = localStorage.getItem('legendary') === 'true' ? true : false;
let mythicBar = localStorage.getItem('mythic') === 'true' ? true : false;

document.querySelector("[data-rarity='epic']").checked = epicBar
document.querySelector("[data-rarity='legendary']").checked = legendaryBar
updateBar(epicBar, 'epic');
updateBar(legendaryBar, 'legendary');

if (heroes.includes('kiriko')) {
    document.querySelector("[data-rarity='mythic']").checked = mythicBar
    updateBar(mythicBar, 'mythic');
}


function manageBar(event) {
    updateBar(event.target.checked, event.target.dataset.rarity)
}

function updateBar(show, rarity) {
    localStorage.setItem(rarity, show)
    let elmt = document.getElementsByClassName(rarity)
    for (let i = 0; i < elmt.length; i++) {
        if (show) {
            elmt[i].style.border = ''
        } else {
            elmt[i].style.border = 'none'
        }
    }
}