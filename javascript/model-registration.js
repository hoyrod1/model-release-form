console.log(
  `==================== Sanity Check For model-registration.js ====================`
);
const clickMe = document.querySelector("#admin-div-button");
// console.log(clickMe);
clickMe.addEventListener("click", testButton);
function testButton(e) {
  alert("You have hit your model-registration page target");
}
