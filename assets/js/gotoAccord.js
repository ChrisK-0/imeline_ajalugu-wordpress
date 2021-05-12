// scrolls to accordion on red anchor text click
const scrollAnchor = document.getElementById("accordionTitle");
function scrollToAccord() {
  scrollAnchor.scrollIntoView({ behavior: "smooth", block: "start" });

}

document.getElementById("gotoAccordionAnchor").onclick = scrollToAccord;
