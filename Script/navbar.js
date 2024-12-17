function showSidebar() {
    const sidebar = document.querySelector ('.sidebar')
    sidebar.style.display = 'flex'
  }
  function hideSidebar() {
    const sidebar = document.querySelector ('.sidebar')
    sidebar.style.display = 'none'
  }

  var dropdown = document.getElementsByClassName("sidebar-dropbtn");
  var i;
  
  for (i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var dropdownContent = this.nextElementSibling;
      if (dropdownContent.style.display === "block") {
        dropdownContent.style.display = "none";
      } else {
        dropdownContent.style.display = "block";
      }
    });
  }

  
