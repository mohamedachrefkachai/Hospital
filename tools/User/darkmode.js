function switchTheme() {
    console.log("Switching theme");
    const theme = document.getElementById("theme").value;
    document.getElementById("theme-meta").content = theme; // Updated to use the ID
  }
  