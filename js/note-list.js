$(document).ready(function () {
  var noteList = function () {
    var $notepad = $(' .notepad')

    var $noteList = $(' .notepad__list')

    var $noteListItem = $('.notepad__list-item')

    var $noteForm = $('.notepad__form')

    var $noteFormInput = $('.notepad__form-input')

    var $clearList = $('.notepad__clear')

    var clearListDisplay = 'notepad__clear--display'

    var noteCount = 0
    function displayNotes () {
      for (noteCount = 0; noteCount < localStorage.length; noteCount++) {
        var noteID = 'task-' + noteCount
        // Build note list
        $noteList.append("<li class='notepad__list-item' id='" + noteID + "'>" + localStorage.getItem(noteID) + '</li>')
        // Show reset button
        $clearList.addClass(clearListDisplay)
      }
    }
    function storeNote () {
      if ($noteFormInput.val() !== '') {
        var noteID = 'task-' + noteCount

        var task = $('#' + noteID)

        var taskMessage = $noteFormInput.val()
        localStorage.setItem(noteID, taskMessage)
        // Add to note list
        $noteList.append("<li class='notepad__list-item' id='" + noteID + "'>" + taskMessage + '</li>')
        // Display reset button
        if (!$clearList.hasClass(clearListDisplay)) {
          $clearList.addClass(clearListDisplay)
        }
        // Reset
        $noteFormInput.val('')
        noteCount++
      }
    }
    function clearNotes () {
      // Update DOM
      $noteList.empty()
      $clearList.removeClass(clearListDisplay)
      // Clear storage
      localStorage.clear()
      noteCount = 0
    }
    function bindEvents () {
      // Show any existing notes from localStorage
      displayNotes()
      // Create new note
      $noteForm.on('submit', function () {
        storeNote()
        return false
      })
      // Reset notes
      $clearList.on('click', function () {
        clearNotes()
      })
    }
    bindEvents()
  }
  noteList()
})
