/*******************
  UTILITY FUNCTIONS
********************/
var rightArrow;
var leftArrow;
// day of week of month's first day
function getFirstDay(theYear, theMonth){
  debugger
    var firstDate = new Date(theYear,theMonth,1)
    return firstDate.getDay()
}
// number of days in the month
function getMonthLen(theYear, theMonth) {
    var oneDay = 1000 * 60 * 60 * 24
    var thisMonth = new Date(theYear, theMonth, 1)
    var nextMonth = new Date(theYear, theMonth + 1, 1)
    var len = Math.ceil((nextMonth.getTime() -
        thisMonth.getTime())/oneDay)
    return len
}
// create array of English month names
var theMonths = ["JAN","FEB","MAR","APR","MAY","JUN","JUL","AUG",
"SEP","OCT","NOV","DEC"]
// return IE4+ or W3C DOM reference for an ID
function getObject(obj) {
    var theObj
    if (document.all) {
        if (typeof obj == "string") {
            return document.all(obj)
        } else {
            return obj.style
        }
    }
    if (document.getElementById) {
        if (typeof obj == "string") {
            return document.getElementById(obj)
        } else {
            return obj.style
        }
    }
    return null
}

/************************
  DRAW CALENDAR CONTENTS
*************************/

// clear and re-populate table based on form's selections
function populateTable(form) {

    var theMonth = form.chooseMonth.selectedIndex
    var theYear = parseInt(form.chooseYear.options[form.chooseYear.selectedIndex].text)
    // initialize date-dependent variables
    var firstDay = getFirstDay(theYear, theMonth)
    var howMany = getMonthLen(theYear, theMonth)

    // fill in month/year in table header
    getObject("tableHeader").innerHTML = theMonths[theMonth] +
    " " + theYear
    var tableHeader = document.getElementById("tableHeader")

    tableHeader.appendChild(rightArrow)
    tableHeader.appendChild(leftArrow)


    // initialize vars for table creation
    var dayCounter = 1
    var TBody = getObject("tableBody")
    // clear any existing rows
    while (TBody.rows.length > 0) {
        TBody.deleteRow(0)
    }
    var newR, newC
    var done=false
    while (!done) {
        // create new row at end
        newR = TBody.insertRow(TBody.rows.length)
        for (var i = 0; i < 7; i++) {
            // create new cell at end of row
            newC = newR.insertCell(newR.cells.length)
            if (TBody.rows.length == 1 && i < firstDay) {
                // no content for boxes before first day
                newC.innerHTML = ""
                continue
            }
            if (dayCounter == howMany) {
                // no more rows after this one
                done = true
            }
            // plug in date (or empty for boxes after last day)
            newC.innerHTML = (dayCounter <= howMany) ?
                dayCounter++ : ""
        }

    }
}

function populateTablefromArrow(data) {
  debugger
    var theMonth = data.split("_")[0]
    var theYear = parseInt(data.split("_")[1])
    // initialize date-dependent variables
    var firstDay = getFirstDay(theYear, theMonth)
    var howMany = getMonthLen(theYear, theMonth)

    // fill in month/year in table header
    getObject("tableHeader").innerHTML = theMonths[theMonth] +
    " " + theYear
    var tableHeader = document.getElementById("tableHeader")

    tableHeader.appendChild(rightArrow)
    tableHeader.appendChild(leftArrow)


    // initialize vars for table creation
    var dayCounter = 1
    var TBody = getObject("tableBody")
    // clear any existing rows
    while (TBody.rows.length > 0) {
        TBody.deleteRow(0)
    }
    var newR, newC
    var done=false
    while (!done) {
        // create new row at end
        newR = TBody.insertRow(TBody.rows.length)
        for (var i = 0; i < 7; i++) {
            // create new cell at end of row
            newC = newR.insertCell(newR.cells.length)
            if (TBody.rows.length == 1 && i < firstDay) {
                // no content for boxes before first day
                newC.innerHTML = ""
                continue
            }
            if (dayCounter == howMany) {
                // no more rows after this one
                done = true
            }
            // plug in date (or empty for boxes after last day)
            newC.innerHTML = (dayCounter <= howMany) ?
                dayCounter++ : ""
        }

    }
}

/*******************
  INITIALIZATIONS
********************/
// create dynamic list of year choices
function fillYears() {

  rightArrow = document.createElement("IMG")
  leftArrow = document.createElement("IMG")

  rightArrow.id = "right-arrow"
  leftArrow.id = "left-arrow"
  rightArrow.src = "images/chevron-right-filled.png"
  leftArrow.src = "images/chevron-right-filled.png"
    var today = new Date()
    var thisYear = today.getFullYear()
    var yearChooser = document.dateChooser.chooseYear
    for (i = thisYear; i < thisYear + 5; i++) {
        yearChooser.options[yearChooser.options.length] = new Option(i, i)
    }
    rightArrow.addEventListener("click", nextMonth)
    leftArrow.addEventListener("click", prevMonth)
    setCurrMonth(today)
}
// set month choice to current month
function setCurrMonth(today) {
    document.dateChooser.chooseMonth.selectedIndex = today.getMonth()
}

nextMonth = () => {
  debugger
  var thisMonth = event.target.parentElement.innerText.split(" ")[0]
  var thisYear = event.target.parentElement.innerText.split(" ")[1]
  currentIndex = theMonths.findIndex(function(month){

    return month === thisMonth
  })
  var nexMonth = theMonths.find(function(month){
    if (theMonths[currentIndex + 1] > 11){
      return theMonths[0]
    } else {
      return month === theMonths[currentIndex + 1]
    }
  })
  var data = nexMonth + "_" + thisYear
  populateTablefromArrow(data)
}


prevMonth = () => {
  var thisMonth = event.target.parentElement.innerText.split(" ")[0]
  currentIndex = theMonths.findIndex(function(month){
    return month === thisMonth
  })
  var preMonth = theMonths.find(function(month){
    if (theMonths[currentIndex - 1] < 0){
      return theMonths[11]
    } else {
      return month === theMonths[currentIndex - 1]
    }
  })
  var data = preMonth + "_" + thisYear
  populateTablefromArrow(data)
}
