/* Lazy loading */
document.addEventListener("DOMContentLoaded", function () {
    var lazyBackgrounds = [].slice.call(document.querySelectorAll(".lazy-background"));
    if ("IntersectionObserver" in window) {
        let lazyBackgroundObserver = new IntersectionObserver(function (entries, observer) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.style.backgroundImage = entry.target.dataset.bg;
                    lazyBackgroundObserver.unobserve(entry.target);
                }
            });
        });

        lazyBackgrounds.forEach(function (lazyBackground) {
            lazyBackgroundObserver.observe(lazyBackground);
        });
    }
});

/* Open when someone clicks on the span element */
function openSettings() {
    document.getElementById("mySettings").style.width = "100%";
}

/* Close when someone clicks on the "x" symbol inside the overlay */
function closeSettings() {
    document.getElementById("mySettings").style.width = "0%";
}

// Get Local storage data
let commonBar = localStorage.getItem('common') === 'true' ? true : false;
let rareBar = localStorage.getItem('rare') === 'true' ? true : false;
let epicBar = localStorage.getItem('epic') === 'true' ? true : false;
let legendaryBar = localStorage.getItem('legendary') === 'true' ? true : false;
let mythicBar = localStorage.getItem('mythic') === 'true' ? true : false;
let categoriesColor = localStorage.getItem('categoriesColor') === 'true' ? true : false;

// Apply data
if (document.querySelector('[data-rarity="common"]') != null) {
    document.querySelector('[data-rarity="common"]').checked = commonBar
    updateBarVisibility(commonBar, 'common');
}
if (document.querySelector('[data-rarity="rare"]') != null) {
    document.querySelector('[data-rarity="rare"]').checked = rareBar
    updateBarVisibility(rareBar, 'rare');
}
if (document.querySelector('[data-rarity="mythic"]') != null) {
    document.querySelector('[data-rarity="mythic"]').checked = mythicBar
    updateBarVisibility(mythicBar, 'mythic');
}

document.getElementById('categoriesColors').checked = categoriesColor
document.querySelector('[data-rarity="epic"]').checked = epicBar
document.querySelector('[data-rarity="legendary"]').checked = legendaryBar
updateCategoryColor(categoriesColor);
updateBarVisibility(epicBar, 'epic');
updateBarVisibility(legendaryBar, 'legendary');

function updateCategoryColor(show) {
    localStorage.setItem('categoriesColor', show);
    document.querySelectorAll('[data-category]').forEach(function (element) {
        element.style.backgroundColor = show ? '' : 'unset';
    });
}

// Change bar visibility from a checkbox
function checkBarVisibility(event) {
    updateBarVisibility(event.target.checked, event.target.dataset.rarity)
}

//Change bar visibility
function updateBarVisibility(show, rarity) {
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

function unselectHeroes() {
    let elmt = document.querySelectorAll('input[name="hero[]"]')
    for (let i = 0; i < elmt.length; i++) {
        elmt[i].checked = false
    }
}

function selectRole(role) {
    unselectHeroes();
    let elmt = document.querySelectorAll('input[name="hero[]"][data-role="' + role + '"]')
    for (let i = 0; i < elmt.length; i++) {
        elmt[i].checked = true
    }
}

function sortHeroesAlphabetically(event) {
    console.log(event);
    let container = document.getElementById('container');
    let category = document.getElementById('category');
    let total = document.getElementById('total');
    let heroes = document.querySelectorAll('[data-count]');
    heroes = Array.from(heroes).sort((a, b) => a.id.localeCompare(b.id));
    container.innerHTML = '';
    container.append(category);
    heroes.forEach(hero => {
        container.append(hero);
    });
    container.append(total);
    closeSettings();
}

function sortHeroesBySkinsAmount() {
    let container = document.getElementById('container');
    let category = document.getElementById('category');
    let total = document.getElementById('total');
    let heroes = document.querySelectorAll('[data-count]');
    heroes = Array.from(heroes).sort((a, b) => b.getAttribute('data-count') - a.getAttribute('data-count'));
    container.innerHTML = '';
    container.append(category);
    heroes.forEach(hero => {
        container.append(hero);
    });
    container.append(total);
    closeSettings();
}

function sortHeroesByReleaseDate() {
    let container = document.getElementById('container');
    let category = document.getElementById('category');
    let total = document.getElementById('total');
    let heroes = document.querySelectorAll('[data-release-date]');
    heroes = Array.from(heroes).sort((a, b) => new Date(a.getAttribute('data-release-date')) - new Date(b.getAttribute('data-release-date')));
    container.innerHTML = '';
    container.append(category);
    heroes.forEach(hero => {
        container.append(hero);
    });
    container.append(total);
    closeSettings();
}

function sortHeroes(parameter) {
    let container = document.getElementById('container');
    let category = document.getElementById('category');
    let total = document.getElementById('total');
    let heroes = document.querySelectorAll('[data-' + parameter + ']');
    let button = document.getElementById('sort-' + parameter);
    let order = button.getAttribute('data-sort');
    order = order === 'asc' ? 'desc' : 'asc';
    button.setAttribute('data-sort', order);

    if (parameter === 'name') {
        heroes = Array.from(heroes).sort((a, b) => { return order === 'asc' ? a.id.localeCompare(b.id) : b.id.localeCompare(a.id); });
    } else {
        heroes = Array.from(heroes).sort((a, b) => {
            let aValue = a.getAttribute('data-' + parameter);
            let bValue = b.getAttribute('data-' + parameter);
            if (parameter === 'release-date') {
                aValue = new Date(aValue);
                bValue = new Date(bValue);
            }
            if (order === 'asc') {
                return aValue - bValue;
            } else {
                return bValue - aValue;
            }
        });
    }
    container.innerHTML = '';
    container.append(category);
    heroes.forEach(hero => {
        container.append(hero);
    });
    container.append(total);
    closeSettings();
}