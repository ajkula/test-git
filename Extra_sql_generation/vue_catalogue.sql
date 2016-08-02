CREATE
OR REPLACE VIEW vue_catalogue AS SELECT
	livres.id,
	livres.isbn,
	livres.titre,
	livres.sous_titre,
	livres.description,
	YEAR (livres.date_publication) AS annee_publication,
	livres.nb_pages,
	livres.image,
	livres.lien,
	livres.id_editeur,
	livres.prix,
	livres.id_langue,
	editeurs.nom AS editeur,
	langues.libelle_langue AS langue,
	GROUP_CONCAT(auteurs.nom_complet) AS liste_auteurs,
	GROUP_CONCAT(DISTINCT categories.categorie) AS liste_categories
FROM
	livres
INNER JOIN langues ON livres.id_langue = langues.id
INNER JOIN editeurs ON livres.id_editeur = editeurs.id
INNER JOIN auteurs_livres ON livres.id = auteurs_livres.id_livre
INNER JOIN livres_categories ON livres.id = livres_categories.id_livre
INNER JOIN categories ON livres_categories.id_categorie = categories.id
INNER JOIN auteurs ON auteurs_livres.id_auteur = auteurs.id
GROUP BY
	livres.id