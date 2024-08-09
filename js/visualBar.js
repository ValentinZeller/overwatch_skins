// Get Local storage data
let rareBar = localStorage.getItem('rare') === 'true' ? true : false;
let epicBar = localStorage.getItem('epic') === 'true' ? true : false;
let legendaryBar = localStorage.getItem('legendary') === 'true' ? true : false;
let mythicBar = localStorage.getItem('mythic') === 'true' ? true : false;

// Apply data
document.querySelector("[data-rarity='rare']").checked = rareBar
document.querySelector("[data-rarity='epic']").checked = epicBar
document.querySelector("[data-rarity='legendary']").checked = legendaryBar
updateBar(rareBar, 'rare');
updateBar(epicBar, 'epic');
updateBar(legendaryBar, 'legendary');

// Mythic skin (overwatch 2)
if (heroes.includes('kiriko')) {
    document.querySelector("[data-rarity='mythic']").checked = mythicBar
    updateBar(mythicBar, 'mythic');
}


// Change bar visibility from a checkbox
function manageBar(event) {
    updateBar(event.target.checked, event.target.dataset.rarity)
}

//Change bar visibility
function updateBar(show, rarity) {
    localStorage.setItem(rarity, show)
    let elmt = document.getElementsByClassName(rarity)
    for (let i = 0; i < elmt.length; i++) {
        if (show) {
            // Normal bar
            elmt[i].style.border = ''
        } else {
            // No bar
            elmt[i].style.border = 'none'
        }
    }
}