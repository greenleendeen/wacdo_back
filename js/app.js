// On récupère l'élément à écouter
const selectCategorie = document.getElementById('categorie');
// On récupère la div qui va accueillir les produits
const divSelectProduits = document.getElementById('affiche-produits');

// on récupère la div qui va geger les quantités
const divQuantite = document.getElementById('affiche-quantite');
const addQuantite = document.getElementById('numberDisplay');


selectCategorie.addEventListener(`change`,(e)=>{
    //On appelle le controller nécessaire pour lster les produits de la catégorie
    fetch("selectionner_produits_categorie.php?idcategorie="+selectCategorie.value)
    .then(response => {return response.text()})
    .then(data => {
        console.log(data)
        divSelectProduits.innerHTML = data;
    })
    .catch(error => console.log("Erreur : " + error));
});

addQuantite.addEventListener(`change`,(e)=>{
    //On appelle le controller nécessaire pour rnseigner la quantité de produit
    fetch("div_saisie_quantite.php?numberDisplay="+numberDisplay.value)
    .then(response => {return response.text()})
    .then(data => {
        console.log(data)
        divQuantite.innerHTML = data;
    })
    .catch(error => console.log("Erreur : " + error));
});


// les boutons pour la quantité
document.addEventListener("DOMContentLoaded", function () {
  let number = 1;

  const numberDisplay = document.getElementById("numberDisplay");
  const addButton = document.getElementById("addButton");
  const removeButton = document.getElementById("removeButton");

  function updateDisplay() {
      numberDisplay.textContent = number;
  }

  addButton.addEventListener("click", function (e) {
    e.preventDefault();
      number++;
      updateDisplay();
  });

  removeButton.addEventListener("click", function (e) {
    e.preventDefault();
      if (number > 0) {
          number--;
          updateDisplay();
      }
  });

  updateDisplay(); // Initialiser l'affichage
});

