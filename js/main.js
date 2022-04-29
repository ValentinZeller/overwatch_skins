let container = document.getElementById('container');

let totalEpic = 0;
let totalLegendary = 0;
let heroes = 0;

async function fetchSkins() {
  let test = await fetch("https://api.jsonbin.io/b/6269619738be296761f8fbb8/2");
  let json = await test.json();
  heroes = json;
  generateCategoryRow();
  generateContent();
}

fetchSkins();

function generateContent() {
  for (let hero in heroes) {
    let row = generateDiv('row',hero);
    container.appendChild(row);

    /* First column : hero picture */
    let rowHeader = generateDiv('rowHeader');
    row.appendChild(rowHeader);
    rowHeader.style.background = "url('./images/" + hero + "/character.png') no-repeat scroll 50% 0% / cover";

    let skinLegendaryCount = 0;
    let skinEpicCount = 0;

    if(hero === "total") {
      /* Last row : count */
      for(category in heroes.total) {
        row.appendChild(generateRowCount(heroes.total[category].epic,heroes.total[category].legendary));
        skinEpicCount += heroes.total[category].epic;
        skinLegendaryCount += heroes.total[category].legendary;
      }
    } else {
        for(let category in heroes[hero]) {
          let cell = generateDiv('cell',category);
          row.appendChild(cell);

          for (var i = 0; i < heroes[hero][category].length; i++) {
              let skin = heroes[hero][category][i];
              let item = generateDiv('item',skin.name);
              item.setAttribute('data-tooltip',skin.name);
              if (skin.display) {
                item.setAttribute('data-tooltip',skin.display);
              }
              /* Skins per cell : split the width/height of each */
              if (heroes[hero][category].length == 1) { // 1
                item.setAttribute('class','item');
              } else if (heroes[hero][category].length <= 2) { // 2
                item.setAttribute('class','item half');
              } else if (heroes[hero][category].length <= 4) { // 3-4
                item.setAttribute('class','item quarter');
              } else if (heroes[hero][category].length <= 8) { // 5-8
                item.setAttribute('class','item eigth');
              } else if (heroes[hero][category].length <= 16) { // 9-16
                item.setAttribute('class','item sixteenth');
              }

              /* Add epic border and count epic/legendary skins */
              if (skin.rarity === 0) {
                item.classList.add('epic');
                skinEpicCount++;
                heroes.total[category].epic++;
              } else {
                skinLegendaryCount++;
                heroes.total[category].legendary++;
              }
              cell.appendChild(item);
              item.style.background = "url('./images/" + hero + "/" + skin.name + ".png') no-repeat scroll 50% 0% / cover";
          }
        }
    }
    row.appendChild(generateRowCount(skinEpicCount,skinLegendaryCount));
  }
}

function generateCategoryRow() {
  let row = generateDiv('row rowCategory','category');
  let rowHeader = generateDiv('rowHeader');
  row.appendChild(rowHeader);

  container.appendChild(row);
  for (let category in heroes.total) {
    let item = generateDiv('item category',category);
    row.appendChild(item);
    item.style.background = "url('./images/categories/" + category + ".png') no-repeat scroll 50% 0% / contain";
  }
  let item = generateDiv('item category','total');
  row.appendChild(item);
  item.style.background = "url('./images/categories/total.png') no-repeat scroll 50% 0% / contain";
}

/* Generate a div with class and id */
function generateDiv(classes,id) {
  let div = document.createElement('div');
  div.setAttribute('class',classes);
  if (id) {
    div.setAttribute('id',id);
  }
  return div;
}

/* Generate the row count */
function generateRowCount(epicCount, legendaryCount) {
  let rowCount = generateDiv('rowCount');
  rowCount.innerHTML = "<p class='count epicSkin'>" + epicCount + "</p><p class='count legendarySkin'>" + legendaryCount + "</p><p class='count allSkin'>" + (epicCount + legendaryCount);
  return rowCount;
}
