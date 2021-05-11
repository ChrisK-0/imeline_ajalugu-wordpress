// get the modal
let modal = document.getElementById("policyModal");
// get the anchor text that opens the modal
let openModal = document.getElementById("policyOpen");
// get the <span> element that closes the modal
let closeModalBtn = document.getElementById("closeModal");
// modal closing function
closeModal = () => {
  modal.style.display = "none";

};

// when the user clicks on the anchor text, open the modal
openModal.onclick = () => {
  modal.style.display = "block";

}

// when the user clicks on <span> (x), close the modal
closeModalBtn.onclick = closeModal;

// when the user clicks ESC on their keyboard, close the modal
window.addEventListener('keydown', function (event) {
  if (event.key === 'Escape') {
    closeModal();

  }

});

// when the user clicks anywhere outside of the modal, close it (also added ESC key)
window.onclick = function (event) {
  if (event.target == modal) {
    closeModal();

  }

}
