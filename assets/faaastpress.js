window.addEventListener('load', function () {
  // store tabs variables
  var tabs = document.querySelectorAll('.nav-tab-wrapper > a')

  for (i = 0; i < tabs.length; i++) {
    tabs[i].addEventListener('click', switchTab)
  }

  function switchTab(event) {
    event.preventDefault()

    document.querySelector('.nav-tab.nav-tab-active').classList.remove('nav-tab-active')

    var allTabs = document.querySelectorAll('.tab-content')
    allTabs.forEach((tab) => {
      tab.classList.add('hidden')
    })

    var clickedTab = event.currentTarget
    var anchor = event.target
    var activePaneID = anchor.getAttribute('href')

    clickedTab.classList.add('nav-tab-active')
    document.querySelector(activePaneID).classList.remove('hidden')
  }
})
