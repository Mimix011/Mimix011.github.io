

// Texte dynamique avec alternance de couleurs
const messages = [
  " print(''Bonjour / Welcome !'') ",
  " print(''Bienvenue sur le Cyberfolio de notre équipe 😀'') ",
  " print(''Bonne découverte ;)'') "
];

const dynamicText = document.getElementById('dynamic-text');
let messageIndex = 0;
let charIndex = 0;
let isDeleting = false;

function typeEffect() {
  const currentMessage = messages[messageIndex];
  const currentSlice = isDeleting
    ? currentMessage.substring(0, charIndex--)
    : currentMessage.substring(0, charIndex++);

  const coloredText = Array.from(currentSlice)
    .map((char, index) => {
      const color = index % 2 === 0 ? 'white' : 'CornflowerBlue';
      return `<span style="color: ${color};">${char}</span>`;
    })
    .join('');

  dynamicText.innerHTML = coloredText;

  if (!isDeleting && charIndex === currentMessage.length) {
    isDeleting = true;
    setTimeout(typeEffect, 1700);
  } else if (isDeleting && charIndex === 0) {
    isDeleting = false;
    messageIndex = (messageIndex + 1) % messages.length;
    setTimeout(typeEffect, 500);
  } else {
    setTimeout(typeEffect, isDeleting ? 50 : 100);
  }
}

typeEffect();
document.addEventListener("DOMContentLoaded", function() {
  const progressBar = document.querySelector('.progress_bar');

  if (progressBar) {
      progressBar.style.display = "none";

      window.addEventListener('scroll', handleScroll);

      function handleScroll() {
          progressBar.style.display = "block";
          const height = document.body.scrollHeight; // taille du site
          const windowHeight = window.innerHeight; // taille de l'affichage
          const position = window.pageYOffset; // la position en pixels du document

          const trackLength = height - windowHeight;
          
          const percentage = 
                Math.floor((position / trackLength) * 100);
          
          progressBar.style.right = (100 - percentage) + '%';
      }
  } else {
      console.error('Progress bar element not found');
  }
});
