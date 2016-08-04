// Liste des mots du dictionnaire
var mots = [
    {
        terme: "Procrastination",
        definition: "Tendance pathologique à remettre systématiquement au lendemain"
    },
    {
        terme: "Tautologie",
        definition: "Phrase dont la formulation ne peut être que vraie"
    },
    {
        terme: "Oxymore",
        definition: "Figure de style qui réunit dans un même syntagme deux termes sémantiquement opposés"
    }
];

// TODO : créer le dictionnaire sur la page web, dans la div "contenu"

// Modification du contenu HTML du body : ajout d'un lien
for (var i = 0 ; i < mots.length; i ++ ){
    document.getElementById("contenu").innerHTML += 
        '<dt id="definition">'+
        '<strong>' + mots[i].terme + '</strong>'
         document.getElementById("contenu").innerHTML += '<dd id="definition">' + mots[i].definition + '</dd>';
        +'</dt>';
}
for (var i = 0 ; i < mots.length; i ++ ){
   
}