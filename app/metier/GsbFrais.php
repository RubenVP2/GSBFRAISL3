<?php

namespace App\metier;

use Illuminate\Support\Facades\DB;

/** 
 * Classe d'accès aux données. 
 */
class GsbFrais
{
	/**
	 * Retourne les informations d'un visiteur 
 
	 * @param $login 
	 * @param $mdp
	 * @return l'id, le nom et le prénom sous la forme d'un objet 
	 */
	public function getInfosVisiteur($login, $mdp)
	{
		$req = "select visiteur.id as id, visiteur.nom as nom, visiteur.prenom as prenom from visiteur 
        where visiteur.login=:login and visiteur.mdp=:mdp";
		$ligne = DB::select($req, ['login' => $login, 'mdp' => $mdp]);
		return $ligne;
	}
	/**
	 * Retourne sous forme d'un tableau d'objets toutes les lignes de frais hors forfait
	 * concernées par les deux arguments
 
	 * La boucle foreach ne peut être utilisée ici car on procède
	 * à une modification de la structure itérée - transformation du champ date-
 
	 * @param $idVisiteur 
	 * @param $mois sous la forme aaaamm
	 * @return un objet avec tous les champs des lignes de frais hors forfait 
	 */
	public function getLesFraisHorsForfait($idVisiteur, $mois)
	{
		$req = "select * from lignefraishorsforfait where lignefraishorsforfait.idvisiteur =:idVisiteur 
		and lignefraishorsforfait.mois = :mois ";
		$lesLignes = DB::select($req, ['idVisiteur' => $idVisiteur, 'mois' => $mois]);
		//            for ($i=0; $i<$nbLignes; $i++){
		//                    $date = $lesLignes[$i]['date'];
		//                    $lesLignes[$i]['date'] =  dateAnglaisVersFrancais($date);
		//            }
		return $lesLignes;
	}
	/**
	 * Retourne sous forme d'un tableau associatif toutes les lignes de frais au forfait
	 * concernées par les deux arguments
 
	 * @param $idVisiteur 
	 * @param $mois sous la forme aaaamm
	 * @return un objet contenant les frais forfait du mois
	 */
	public function getLesFraisForfait($idVisiteur, $mois)
	{
		$req = "select fraisforfait.id as idfrais, fraisforfait.libelle as libelle, ligneFraisForfait.mois as mois,
		lignefraisforfait.quantite as quantite from lignefraisforfait inner join fraisforfait 
		on fraisforfait.id = lignefraisforfait.idfraisforfait
		where lignefraisforfait.idvisiteur = :idVisiteur and lignefraisforfait.mois=:mois
		order by lignefraisforfait.idfraisforfait";
		//                echo $req;
		$lesLignes = DB::select($req, ['idVisiteur' => $idVisiteur, 'mois' => $mois]);
		return $lesLignes;
	}
	/**
	 * Retourne tous les id de la table FraisForfait
	 * @return un objet avec les données de la table frais forfait
	 */
	public function getLesIdFrais()
	{
		$req = "select fraisforfait.id as idfrais from fraisforfait order by fraisforfait.id";
		$lesLignes = DB::select($req);
		return $lesLignes;
	}
	/**
	 * Met à jour la table ligneFraisForfait
 
	 * Met à jour la table ligneFraisForfait pour un visiteur et
	 * un mois donné en enregistrant les nouveaux montants
 
	 * @param $idVisiteur 
	 * @param $mois sous la forme aaaamm
	 * @param $lesFrais tableau associatif de clé idFrais et de valeur la quantité pour ce frais
	 */
	public function majFraisForfait($idVisiteur, $mois, $lesFrais)
	{
		$lesCles = array_keys($lesFrais);
		//            print_r($lesFrais);
		foreach ($lesCles as $unIdFrais) {
			$qte = $lesFrais[$unIdFrais];
			$req = "update lignefraisforfait set lignefraisforfait.quantite = :qte
			where lignefraisforfait.idvisiteur = :idVisiteur and lignefraisforfait.mois = :mois
			and lignefraisforfait.idfraisforfait = :unIdFrais";
			DB::update($req, ['qte' => $qte, 'idVisiteur' => $idVisiteur, 'mois' => $mois, 'unIdFrais' => $unIdFrais]);
		}
	}
	/**
	 * met à jour le nombre de justificatifs de la table ficheFrais
	 * pour le mois et le visiteur concerné
 
	 * @param $idVisiteur 
	 * @param $mois sous la forme aaaamm
	 */
	public function majNbJustificatifs($idVisiteur, $mois, $nbJustificatifs)
	{
		$req = "update fichefrais set nbjustificatifs = :nbJustificatifs 
		where fichefrais.idvisiteur = :idVisiteur and fichefrais.mois = :mois";
		DB::update($req, ['nbJustificatifs' => $nbJustificatifs, 'idVisiteur' => $idVisiteur, 'mois' => $mois]);
	}
	/**
	 * Teste si un visiteur possède une fiche de frais pour le mois passé en argument
 
	 * @param $idVisiteur 
	 * @param $mois sous la forme aaaamm
	 * @return vrai ou faux 
	 */
	public function estPremierFraisMois($idVisiteur, $mois)
	{
		$ok = false;
		$req = "select count(*) as nblignesfrais from fichefrais 
		where fichefrais.mois = :mois and fichefrais.idvisiteur = :idVisiteur";
		$laLigne = DB::select($req, ['idVisiteur' => $idVisiteur, 'mois' => $mois]);
		$nb = $laLigne[0]->nblignesfrais;
		if ($nb == 0) {
			$ok = true;
		}
		return $ok;
	}
	/**
	 * Retourne le dernier mois en cours d'un visiteur
 
	 * @param $idVisiteur 
	 * @return le mois sous la forme aaaamm
	 */
	public function dernierMoisSaisi($idVisiteur)
	{
		$req = "select max(mois) as dernierMois from fichefrais where fichefrais.idvisiteur = :idVisiteur";
		$laLigne = DB::select($req, ['idVisiteur' => $idVisiteur]);
		$dernierMois = $laLigne[0]->dernierMois;
		return $dernierMois;
	}

	/**
	 * Crée une nouvelle fiche de frais et les lignes de frais au forfait pour un visiteur et un mois donnés
 
	 * récupère le dernier mois en cours de traitement, met à 'CL' son champs idEtat, crée une nouvelle fiche de frais
	 * avec un idEtat à 'CR' et crée les lignes de frais forfait de quantités nulles 
	 * @param $idVisiteur 
	 * @param $mois sous la forme aaaamm
	 */
	public function creeNouvellesLignesFrais($idVisiteur, $mois)
	{
		$dernierMois = $this->dernierMoisSaisi($idVisiteur);
		$laDerniereFiche = $this->getLesInfosFicheFrais($idVisiteur, $dernierMois);
		if ($laDerniereFiche->idEtat == 'CR') {
			$this->majEtatFicheFrais($idVisiteur, $dernierMois, 'CL');
		}
		$req = "insert into fichefrais(idvisiteur,mois,nbJustificatifs,montantValide,dateModif,idEtat) 
		values(:idVisiteur,:mois,0,0,now(),'CR')";
		DB::insert($req, ['idVisiteur' => $idVisiteur, 'mois' => $mois]);
		$lesIdFrais = $this->getLesIdFrais();
		foreach ($lesIdFrais as $uneLigneIdFrais) {
			$unIdFrais = $uneLigneIdFrais->idfrais;
			$req = "insert into lignefraisforfait(idvisiteur,mois,idFraisForfait,quantite) 
			values(:idVisiteur,:mois,:unIdFrais,0)";
			DB::insert($req, ['idVisiteur' => $idVisiteur, 'mois' => $mois, 'unIdFrais' => $unIdFrais]);
		}
	}
	/**
	 * Crée un nouveau frais hors forfait pour un visiteur un mois donné
	 * à partir des informations fournies en paramètre
 
	 * @param $idVisiteur 
	 * @param $mois sous la forme aaaamm
	 * @param $libelle : le libelle du frais
	 * @param $date : la date du frais au format français jj//mm/aaaa
	 * @param $montant : le montant
	 */
	public function creeNouveauFraisHorsForfait($idVisiteur, $mois, $libelle, $date, $montant)
	{
		//		$dateFr = dateFrancaisVersAnglais($date);
		$req = "insert into lignefraishorsforfait(idVisiteur, mois, libelle, date, montant) 
		values(:idVisiteur,:mois,:libelle,:date,:montant)";
		DB::insert($req, ['idVisiteur' => $idVisiteur, 'mois' => $mois, 'libelle' => $libelle, 'date' => $date, 'montant' => $montant]);
	}

	/**
	 * Récupère le frais hors forfait dont l'id est passé en argument
	 * @param $idFrais 
	 * @return un objet avec les données du frais hors forfait
	 */
	public function getUnFraisHorsForfait($idFrais)
	{
		$req = "select * from lignefraishorsforfait where lignefraishorsforfait.id = :idFrais ";
		$fraisHF = DB::select($req, ['idFrais' => $idFrais]);
		//                print_r($unfraisHF);
		$unFraisHF = $fraisHF[0];
		return $unFraisHF;
	}
	/**
	 * Modifie frais hors forfait à partir de son id
	 * à partir des informations fournies en paramètre
	 * @param $id 
	 * @param $libelle : le libelle du frais
	 * @param $date : la date du frais au format français jj//mm/aaaa
	 * @param $montant : le montant
	 */
	public function modifierFraisHorsForfait($id, $libelle, $date, $montant)
	{
		//		$dateFr = dateFrancaisVersAnglais($date);
		$req = "update lignefraishorsforfait set libelle = :libelle, date = :date, montant = :montant
		where id = :id";
		DB::update($req, ['libelle' => $libelle, 'date' => $date, 'montant' => $montant, 'id' => $id]);
	}

	/**
	 * Supprime le frais hors forfait dont l'id est passé en argument
	 * @param $idFrais 
	 */
	public function supprimerFraisHorsForfait($idFrais)
	{
		$req = "delete from lignefraishorsforfait where lignefraishorsforfait.id = :idFrais ";
		DB::delete($req, ['idFrais' => $idFrais]);
	}
	/**
	 * Retourne les fiches de frais d'un visiteur à partir d'un certain mois
	 * @param $idVisiteur 
	 * @param $mois mois début
	 * @return un objet avec les fiches de frais de la dernière année
	 */
	public function getLesFrais($idVisiteur, $mois)
	{
		$req = "select * from  fichefrais where idvisiteur = :idVisiteur
                and  mois >= :mois   
		order by fichefrais.mois desc ";
		$lesLignes = DB::select($req, ['idVisiteur' => $idVisiteur, 'mois' => $mois]);
		return $lesLignes;
	}
	/**
	 * Retourne les informations d'une fiche de frais d'un visiteur pour un mois donné
	 * @param $idVisiteur 
	 * @param $mois sous la forme aaaamm
	 * @return un objet avec des champs de jointure entre une fiche de frais et la ligne d'état 
	 */
	public function getLesInfosFicheFrais($idVisiteur, $mois)
	{
		$req = "select ficheFrais.idEtat as idEtat, ficheFrais.dateModif as dateModif, ficheFrais.nbJustificatifs as nbJustificatifs, 
			ficheFrais.montantValide as montantValide, etat.libelle as libEtat from  fichefrais inner join Etat on ficheFrais.idEtat = Etat.id 
			where fichefrais.idvisiteur = :idVisiteur and fichefrais.mois = :mois";
		$lesLignes = DB::select($req, ['idVisiteur' => $idVisiteur, 'mois' => $mois]);
		return $lesLignes[0];
	}
	/** 
	 * Modifie l'état et la date de modification d'une fiche de frais
	 * Modifie le champ idEtat et met la date de modif à aujourd'hui
	 * @param $idVisiteur 
	 * @param $mois sous la forme aaaamm
	 */

	public function majEtatFicheFrais($idVisiteur, $mois, $etat)
	{
		$req = "update ficheFrais set idEtat = :etat, dateModif = now() 
		where fichefrais.idvisiteur = :idVisiteur and fichefrais.mois = :mois";
		DB::update($req, ['etat' => $etat, 'idVisiteur' => $idVisiteur, 'mois' => $mois]);
	}

	/**
	 * Retourne les informations personnelles d'un visiteur
 
	 * @param $id 
	 * @return la ville et le cp sous la forme d'un objet 
	 */
	public function getInfosPerso($id)
	{
		$req = "select cp, ville from visiteur where visiteur.id=:id";
		$ligne = DB::select($req, ['id' => $id]);
		return $ligne[0];
	}

	
/**
 * @author Ruben Veloso Paulos
 * 	Met à jour les informations saisies
 * @param $idVisiteur, $cp, $ville
 */
	public function majInfos($idVisiteur, $cp, $ville){

		$req = "update visiteur set cp = :cp, ville = :ville where id = :id";

		DB::update($req, ['cp' => $cp, 'ville' => $ville, 'id' => $idVisiteur]);
	}
	/**
	 * Récupère la liste des utilisateurs dans le même secteur que le responsable
	 * 
	 * @param $idResponsable
	 */
	public function getListUsers($idResponsable)
	{
		$req = "SELECT nom, prenom, tra_role, tra_reg
			FROM visiteur 
			INNER JOIN travailler ON visiteur.id = idVisiteur 
			INNER JOIN region ON region.id = tra_reg 
			WHERE sec_code = ( SELECT sec_code FROM region INNER JOIN travailler ON region.id = travailler.tra_reg WHERE travailler.idVisiteur = :idResponsable ORDER BY tra_date DESC LIMIT 1)";
		$lesLignes = DB::select($req, ['idResponsable' => $idResponsable]);
		return $lesLignes;
	}
	/**
	 * Récupère le rôle de l'utilisateur
	 * 
	 * @param $idVisiteur
	 */
	public function getVisiteurRole($idVisiteur) {
		$req = "SELECT tra_role FROM travailler WHERE idVisiteur = :idVisiteur ORDER BY tra_date DESC LIMIT 1";
		$lesLignes = DB::select($req, ['idVisiteur' => $idVisiteur]);
		return $lesLignes[0];
	}

/**
 * @author Ruben Veloso Paulos
 * Affiche les listes de frais en fonction du rôle du visiteur
 * @param $idVisiteur
 *@return les fiches de frais
 */

 public function getLesFichesFraisVisiteur($idVisiteur) {
	 // Récupère le role
	$role = $this->getVisiteurRole($idVisiteur);
	// Test la valeur du rôle 
	if ($role == 'Délégué') {
		// Requête pour récupérer les visiteur pour 1 délégué
		$req = "SELECT idVisiteur, mois, nbJustificatifs, montantValide, dateModif 
		from fichefrais f inner join travailler t on f.idVisiteur = t.idVisiteur
		where f.idEtat like 'CL' AND t.tra_reg = ANY (SELECT tra_reg from travailler where idVisiteur = :id)  AND t.tra_role like 'visiteur' ORDER BY 1, 2";
		$ligne = DB::select($req, ['id'=>$idVisiteur]);
		return $ligne;
	} else {
		// Requête pour récupérer les visiteur pour 1 délégué
		$req = "SELECT f.idVisiteur, mois, nbJustificatifs, montantValide, dateModif 
		from fichefrais f inner join travailler t on f.idVisiteur = t.idVisiteur inner join region r ON t.tra_reg = r.id
		where f.idEtat like 'CL' 
		AND r.sec_code = ANY (SELECT r.sec_code from travailler t INNER JOIN region r ON t.tra_reg = r.id where t.idVisiteur = :id) AND t.tra_role like 'Délégué'";
		$ligne = DB::select($req, ['id'=>$idVisiteur]);
		return $ligne;
	}
 }

}
