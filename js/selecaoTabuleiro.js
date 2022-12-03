function selectGame() {
    localStorage.setItem("boardSize", this.document.activeElement.innerHTML.slice(-1));

    window.location.href = "jogo.php";
}