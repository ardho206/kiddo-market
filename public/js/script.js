const passwordInput = document.getElementById('password'),
      toggleIcon = document.querySelector('.toggle-password');

      function togglePassword() {
          if (passwordInput.type === "password") {
              passwordInput.type = "text";
              toggleIcon.classList.remove("bi-eye");
              toggleIcon.classList.add("bi-eye-slash");
          } else {
              passwordInput.type = "password";
              toggleIcon.classList.remove("bi-eye-slash");
              toggleIcon.classList.add("bi-eye");
          }
      }

      function checkPassword() {
          if (passwordInput.value.trim() !== '') {
              toggleIcon.style.display = "block";
          } else {
              toggleIcon.style.display = "none";
          }
      }

function addedOnWishlist() {
    alert('Added On Wishlist!');
}

const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

// const toastTriggers = document.querySelectorAll('#addToFavorite');

// if (toastTriggers) {
//     toastTriggers.forEach((trigger) => {
//         const toastLiveExample = document.getElementById('liveToast');
//         const toastBootstrap = new bootstrap.Toast(toastLiveExample);

//         trigger.addEventListener('click', () => {
//             toastBootstrap.show();
//         });
//     });
// }

var decreaseButton = document.getElementById("decreaseButton");
var increaseButton = document.getElementById("increaseButton");
var quantityInput = document.getElementById("quantity");

decreaseButton.addEventListener("click", function () {
    var currentValue = parseInt(quantityInput.value);
    if (currentValue > 1) {
        quantityInput.value = currentValue - 1;
    }
});

increaseButton.addEventListener("click", function () {
    var currentValue = parseInt(quantityInput.value);
    quantityInput.value = currentValue + 1;
});
