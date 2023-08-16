  const audio = document.getElementById("mediaPlayer");
  const sources = audio.getElementsByTagName("source");

// Función para reproducir una canción al azar
    function playRandom() {
        audio.volume = 0.5;
        const randomIndex = Math.floor(Math.random() * sources.length); // Numero aleatorio según la cantidad de canciones
        audio.src = sources[randomIndex].src;
        audio.load();
    }

  // Reproducir una canción al azar al cargar la página
  playRandom();
  // Reproducir una nueva canción al azar al finalizar la pista
  audio.addEventListener("ended", playRandom);
