console.log(`==================== Sanity Check For model-login.js ====================`);
const clickMe = document.querySelector("#admin-div-button");
// console.log(clickMe);
clickMe.addEventListener("click", testButton);
function testButton(e) {
  alert("Please click to confirm that you want to register");
}
