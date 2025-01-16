UserController

    index() : Affiche tous les utilisateurs.
    create() : Affiche le formulaire pour créer un utilisateur.
    store(Request $request) : Enregistre un nouvel utilisateur.
    update(Request $request, $id) : Modifie les informations d'un utilisateur.
    destroy($id) : Supprime un utilisateur.

TacheController

    index() : Affiche la liste des tâches, triées et paginées.
    create() : Affiche le formulaire pour créer une tâche.
    store(Request $request) : Enregistre une nouvelle tâche.
    edit($id) : Affiche le formulaire pour modifier une tâche.
    update(Request $request, $id) : Modifie les informations d'une tâche.
    destroy($id) : Supprime une tâche.

AuthController

    login() : Affiche le formulaire de connexion.
    logout() : Déconnecte l'utilisateur actuellement connecté.
    doLogin(Request $request) : Gère l'authentification d'un utilisateur en vérifiant son email et son mot de passe. Si les informations sont correctes, l'utilisateur est redirigé vers la page des tâches.




    J'ai décidé de séparer la logique des utilisateurs, des tâches et de l'authentification dans des contrôleurs différents. Cela rend le code plus organisé et plus lisible
    J'ai utilisé le middleware auth pour protéger les routes sensibles comme la création ou la modification de tâches. Cela permet de garantir que seules les personnes connectées peuvent y accéder.
    Pour l'authentification, j'ai mis en place une logique simple qui vérifie l'email et le mot de passe d'un utilisateur. Si les informations sont correctes, l'utilisateur est redirigé vers la page des tâches. Sinon, il reçoit un message d'erreur.
    Le bouton de déconnexion permet de fermer la session de l'utilisateur.
    J'ai ajouté des règles de validation pour vérifier que les données soumises sont correctes. Par exemple, je vérifie que l'email est unique et valide.
    Le design est simple et facile à comprendre pour l'utilisateur. Il peut facilement ajouter ou modifier des tâches et gérer ses informations.
    Messages d'erreur clairs : Si l'utilisateur oublie de remplir un champ ou fait une erreur, des messages d'erreur lui expliquent ce qu'il faut corriger.
   
    