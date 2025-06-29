<div class="footer">
      <div class="bg-secondary">
        <div class="container">
          <div class="row">
            <div class="col text-center mt-4">
              <h4 class="pb-2">Demande de prise en charge</h4>
              <form class=" pb-3 align-items-center" method="POST" action="{{ route('store.newsletter') }}">
                  @csrf
                <div class="row">
                  <div class="col">
                    <input type="text" class="form-control w-100" name="nom_prenom_newsletter" placeholder="Nom prénom">
                  </div>
                  <div class="col">
                    <input type="email" class="form-control w-100" name="newsletter_email" placeholder="Adresse email">
                  </div>
                  
                </div>
                <div class="col mt-3">
                  <button type="submit" class="btn bg-white border border-success font-weight-bold w-50">FAIRE LA DEMANDE</button>
                </div>
              </form>
            </div>
          </div>
          <div class="row bg-white">
            <div class="col-md-3 ml-n3 pt-1">
              <a href="index.html"><img src="/assets/Images/Footer logo.png" alt=""></a>
              <p class="pl-4 h6 mt-2">Site Officiel sur l'enseignement supérieure en Côte d'Ivoire pour les etudiants</p>
              <p class="pl-4 mt-4">Copyright {{ date('Y') }} ©</p>
              <a href="#" target="_blank"> <i class="fa fa-facebook-square pl-4 mt-1"></i></a> <a href="#" target="_blank"><i class="fa fa-linkedin-square pl-4 mt-1"></i></a>
              <p class="pl-4 mt-3 h6">Nos Coordonnées</p>
              <p class="pl-4 mt-2 h6 mail">Email: infos@monuniversite.ci</p>
              <p class="pl-4 mt-2 h6 mail">Téléphone: (+225) 07 599 233 63</p>
            </div>
            <div class="col-md-3 pt-4 text-center font-weight-bold">
              <h6>FILIERES/FACULTES</h6>
              <ul class="list-unstyled text-left mt-4">
                  <ul>
                    <a href="#" class="footer_list"><li>Génie Logiciel & TIC</li></a>
                    <a href="#" class="footer_list"><li>Réseau Telecom</li></a>
                    <a href="#" class="footer_list"><li>Gestion Commerciale</li></a>
                    <a href="#" class="footer_list"><li>Transport Logistique</li></a>
                    <a href="#" class="footer_list"><li>GRH & Communication</li></a>
                    <a href="#" class="footer_list"><li>Finances/Comptabilité</li></a>
                    <a href="#" class="footer_list"><li>Marketing & Management</li></a>
                    <a href="#" class="footer_list"><li>Gestion des Projets</li></a>
                    <a href="#" class="footer_list"><li>Sécrétariat</li></a>
                  </ul>
              </ul>
            </div>
            <div class="col-md-3 pt-4 text-center font-weight-bold">
              <h6>ESPACE ETUDIANT</h6>
              <ul class="list-unstyled text-left mt-4">
                <ul>
                  <a href="connexion_etudiant.html" class="footer_list"><li>Mon Compte</li></a>
                  <a href="connexion_etudiant.html" class="footer_list"><li>Mes Favoris</li></a>
                  <a href="connexion_etudiant.html" class="footer_list"><li>Se Connecter</li></a>
                  <a href="connexion_etudiant.html" class="footer_list"><li>Inscription</li></a>
                  <a href="filieres.html" class="footer_list"><li>Etablissements</li></a>
                </ul>
            </ul>
            </div>
            <div class="col-md-3 pt-4 text-center font-weight-bold">
              <h6>LIENS UTILIES</h6>
              <ul class="list-unstyled text-left mt-4">
                <ul>
                  <a href="#" class="footer_list"><li>Filieres Industrielles</li></a>
                  <a href="#" class="footer_list"><li>Filieres Tertiaires</li></a>
                  <a href="#" class="footer_list"><li>Formations Qualifiantes</li></a>
                  <a href="all_article.html" class="footer_list"><li>Actualités</li></a>
                  <a href="#" class="footer_list"><li>FAQs</li></a>
                  <a href="#" class="footer_list"><li>Evènements</li></a>
                </ul>
            </ul>
            </div>
          </div>
        </div>
      </div>
    </div>