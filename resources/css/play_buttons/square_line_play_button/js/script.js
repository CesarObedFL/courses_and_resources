const checkbox = document.getElementById("checkbox");
checkbox.addEventListener("click",() => {
  setTimeout(() => {
    checkbox.checked = false;
  },11000)
})