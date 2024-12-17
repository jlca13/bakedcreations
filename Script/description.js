function toggleDropdown() {
    const dropdown = document.getElementById(productDescriptionDropdown);
    if (dropdown.classList.contains('open')) {
      dropdown.classList.remove('open');
    } else {
      dropdown.classList.add('open');
    }
  }
  function toggleDropdown() {
    const sidebar = document.querySelector ('.sidebar')
    sidebar.style.display = 'flex'
  }

  var dropdown = document.getElementsByClassName("product-description");
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
