let container = document.getElementById('container')

/* search bar modifies content */
const queryString = window.location.search
if (queryString) {
  const urlParams = new URLSearchParams(queryString)
  if (urlParams.has('heroes')) {
    heroes = urlParams.getAll('heroes')
  }
  if (urlParams.has('categories')) {
    categories = urlParams.getAll('categories')
  }
}

createContent()

/* Generate content */
function createContent() {
  createCategoryRow()
  for (let i = 0; i < heroes.length; i++) {
    if (heroes[i] == 'total') {
      container.appendChild(createTotalRow())
    } else {
      container.appendChild(createHeroRow(heroes[i]))
    }
  }


}

/* Generate hero row */
function createHeroRow(hero) {
  let row = createDiv('row', hero)
  row.appendChild(createHeroHeader(hero))

  for (let i = 0; i < categories.length; i++) {
    if (categories[i] == 'total') {
      let skinsFlat = skins[heroesID.indexOf(hero)].flat(1)

      let rare = skinsFlat.filter((skin) => skin.rarity == -1).length
      let epic = skinsFlat.filter((skin) => skin.rarity == 0).length
      let legendary = skinsFlat.filter((skin) => skin.rarity == 1).length
      let mythic = skinsFlat.filter((skin) => skin.rarity == 2).length

      let total = [rare, epic, legendary, mythic]

      row.appendChild(createTotalCell(total))
    } else {
      row.appendChild(createHeroCell(hero, categories[i]))
    }
  }

  return row
}

/* Generate hero header */
function createHeroHeader(hero) {
  let rowHeader = createDiv('rowHeader')
  let fileName = "character"
  if (heroes.includes('kiriko')) {
    fileName = "character2"
  }
  rowHeader.style.background = "url('./images/" + hero + "/" + fileName + ".webp') no-repeat scroll 50% 0% / cover"

  rowHeader.addEventListener('click', function () {
    window.open("./images/" + hero + "/" + fileName + ".webp", "_blank")
  });

  rowHeader.setAttribute('data-tooltip', hero)
  return rowHeader
}

/* Generate hero cell */
function createHeroCell(hero, category) {
  let cell = createDiv('cell', category)

  let heroIndex = heroesID.indexOf(hero)
  let categoryIndex = categoriesID.indexOf(category)
  let skinsCell = ""

  if (heroIndex > -1 && categoryIndex > -1) {
    skinsCell = skins[heroIndex][categoryIndex]
  }

  if (skinsCell) {
    for (let i = 0; i < skinsCell.length; i++) {
      cell.appendChild(createHeroSkin(skinsCell[i], skinsCell.length, hero))
    }
  }

  return cell
}

/* Generate hero skin */
function createHeroSkin(skin, length, hero) {
  let item = createDiv('item', skin.name)
  item.setAttribute('data-tooltip', skin.name)
  if (skin.display) {
    item.setAttribute('data-tooltip', skin.display)
  }
  item.setAttribute('data-bg', "url('./images/" + hero + "/" + skin.name + ".webp') no-repeat scroll 50% 0% / cover")
  item.setAttribute('class', splitSkin(length))

  item.addEventListener('click', function () {
    window.open("./images/" + hero + "/" + skin.name + ".webp", "_blank")
  });

  if (skin.rarity === 0) {
    item.classList.add('epic')
  } else if (skin.rarity === 1) {
    item.classList.add('legendary')
  } else if (skin.rarity === 2) {
    item.classList.add('mythic')
  } else if (skin.rarity === -1) {
    item.classList.add('rare')
  }
  return item
}

/* Generate category row */
function createCategoryRow() {
  let row = createDiv('row rowCategory', 'category')
  let rowHeader = createDiv('rowHeader')
  row.appendChild(rowHeader)

  container.appendChild(row)
  for (let category of categories) {
    let item = createDiv('item category', category)
    row.appendChild(item)
    item.style.background = "url('./images/categories/" + category + ".webp') no-repeat scroll 50% 0% / contain"
    item.addEventListener('click', function () {
      window.open("./images/categories/" + category + ".webp", "_blank")
    });
    item.setAttribute('data-tooltip', category)
  }
}

/* Generate total row */
function createTotalRow() {
  let row = createDiv('row', 'total')
  row.appendChild(createHeroHeader('total'))

  for (let i = 0; i < categories.length; i++) {
    let rare = 0
    let epic = 0
    let legendary = 0
    let mythic = 0

    // Category total
    for (let j = 0; j < heroes.filter((hero) => hero != 'total').length; j++) {
      if (skins[j] && skins[j][i]) {
        let skinsFlat = skins[j][i].flat(1)
        rare += skinsFlat.filter((skin) => skin.rarity == -1).length
        epic += skinsFlat.filter((skin) => skin.rarity == 0).length
        legendary += skinsFlat.filter((skin) => skin.rarity == 1).length
        mythic += skinsFlat.filter((skin) => skin.rarity == 2).length
      }
    }

    // Complete total
    if (i == categories.length - 1) {
      let skinsFlat = skins.flat(2)
      rare = skinsFlat.filter((skin) => skin.rarity == -1).length
      epic = skinsFlat.filter((skin) => skin.rarity == 0).length
      legendary = skinsFlat.filter((skin) => skin.rarity == 1).length
      mythic = mythic += skinsFlat.filter((skin) => skin.rarity == 2).length
    }
    let total = [rare, epic, legendary, mythic]
    row.appendChild(createTotalCell(total))
  }

  return row
}

/* Generate total cell */
function createTotalCell(total) {
  let totalCell = createDiv('rowCount')
  let totalCount = total[0] + total[1] + total[2]

  totalCell.innerHTML += "<p class='count rareSkin'>" + total[0] + "</p>"
  totalCell.innerHTML += "<p class='count epicSkin'>" + total[1] + "</p>"
  totalCell.innerHTML += "<p class='count legendarySkin'>" + total[2] + "</p>"
  if (heroes.includes('kiriko')) {
    totalCell.innerHTML += "<p class='count mythicSkin'>" + total[3] + "</p>"
  }
  totalCell.innerHTML += "<p class='count allSkin'>" + totalCount

  return totalCell
}

/* Generate a div with class and id */
function createDiv(classes, id) {
  let div = document.createElement('div')
  div.setAttribute('class', classes)
  if (id) {
    div.setAttribute('id', id)
  }
  return div
}

/* Split skin width/height */
function splitSkin(length) {
  let splitClass = "item lazy-background"
  switch (length) {
    case 2:
      splitClass += " half"
      break
    case 3: case 4:
      splitClass += " quarter"
      break
    case 5: case 6: case 7: case 8:
      splitClass += " eigth"
      break
    case 9: case 10: case 11: case 12:
      splitClass += " twelve"
      break
    case 9: case 10: case 11: case 12: case 13: case 14: case 15: case 16:
      splitClass += " sixteenth"
      break
  }
  return splitClass
}
/* Lazy loading */
document.addEventListener("DOMContentLoaded", function () {
  var lazyBackgrounds = [].slice.call(document.querySelectorAll(".lazy-background"));
  if ("IntersectionObserver" in window) {
    let lazyBackgroundObserver = new IntersectionObserver(function (entries, observer) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.style.background = entry.target.dataset.bg;
          lazyBackgroundObserver.unobserve(entry.target);
        }
      });
    });

    lazyBackgrounds.forEach(function (lazyBackground) {
      lazyBackgroundObserver.observe(lazyBackground);
    });
  }
});