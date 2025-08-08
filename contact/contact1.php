<?php
// Paramètres de connexion
$host = 'localhost';
$dbname = 'tazza';
$username = 'root';
$password = '';

$success = false;
$error = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nom_prenom = $_POST['nom_prenom'] ?? '';
        $email = $_POST['email'] ?? '';
        $adresse = $_POST['adresse'] ?? '';
        $telephone = $_POST['telephone'] ?? '';
        $message = $_POST['message'] ?? '';

        if ($nom_prenom && $email && $message) {
            $sql = "INSERT INTO contacts (nom_prenom, email, adresse, telephone, message)
                    VALUES (:nom_prenom, :email, :adresse, :telephone, :message)";

            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':nom_prenom' => $nom_prenom,
                ':email' => $email,
                ':adresse' => $adresse,
                ':telephone' => $telephone,
                ':message' => $message
            ]);

            $success = true;
        }
    }
} catch (PDOException $e) {
    $error = "Erreur de connexion : " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactez-nous</title>
    <link rel="shortcut icon" href="../principale/images/logotitre2.png" type="image/x-icon" />


    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome 5 CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <!-- Style CSS -->
    <link rel="stylesheet" href="../principale/style.css">
    <link rel="stylesheet" href="css/responsive-style.css">

</head>

<body class="contact">
    <!-- Navbar Section Start -->
    <header id="full_nav">
        <div class="header">
            <div class="container">
                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand" href="../principale/index.html">
                        <img decoding="async" src="../principale/images/logo.png" alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-nav"
                        aria-controls="main-nav" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-stream navbar-toggler-icon"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="main-nav">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#">thé</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#">tisane</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="../principale/accessoires.html">Accessoires</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button">
                                    Nos Produits
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="../Nos produits/produitnoir.html"><img
                                                src="../principale/tisathe/thes/noir/the-noir.svg" alt=""> &ensp;Thé
                                            noir</a>
                                    </li>
                                    <li><a class="dropdown-item" href="../Nos produits/produitvert.html"><img
                                                src="../principale/tisathe/thes/vert/the-vert.svg" alt=""> &ensp;Thé
                                            vert</a></li>
                                    <li><a class="dropdown-item" href="../Nos produits/produitblanc.html"><img
                                                src="../principale/tisathe/thes/blanc/the-blanc.svg" alt=""> &ensp;Thé
                                            blanc</a></li>
                                    <li><a class="dropdown-item" href="../Nos produits/produitmatcha.html"><img
                                                src="../principale/tisathe/thes/matcha/the-matcha.svg" alt=""> &ensp;Thé
                                            matcha</a></li>
                                    <li><a class="dropdown-item" href="../Nos produits/produitmatcha.html"><img
                                                src="../principale/tisathe/thes/fumer/the-fume.svg" alt=""> &ensp;Thé
                                            Fumé</a></li>
                                    <li><a class="dropdown-item" href="../Nos produits/produitaromatiser.html"><img
                                                src="../principale/tisathe/thes/noir/the-noir.svg" alt=""> &ensp;Thé
                                            Aromatisé</a></li>
                                    <li><a class="dropdown-item" href="../Nos produits/produitPuerh.html"><img
                                                src="../principale/tisathe/thes/PuErh/the-pu-erh.svg" alt=""> &ensp;Thé
                                            PuErh</a></li>
                                    <li><a class="dropdown-item" href="../Nos produits/produitOolong.html"><img
                                                src="../principale/tisathe/thes/Oolong/the-oollong.svg" alt="">
                                            &ensp;Thé
                                            Oolong</a></li>
                                    <li><a class="dropdown-item" href="../Nos produits/produitRooibos.html"><img
                                                src="../principale/tisathe/tisanes/Rooibos/Rooibos.svg" alt="">
                                            &ensp;Tisane
                                            Rooibos</a></li>
                                    <li><a class="dropdown-item" href="../Nos produits/produitThym.html"><img
                                                src="../principale/tisathe/tisanes/Thym/Thym.svg" alt=""> &ensp;Tisane
                                            Thym</a></li>
                                    <li><a class="dropdown-item" href="../Nos produits/produitCamomille.html"><img
                                                src="../principale/tisathe/tisanes/Camomille/Camomille.svg" alt="">
                                            &ensp;Tisane
                                            Camomille</a></li>
                                    <li><a class="dropdown-item" href="../Nos produits/produitVerveine.html"><img
                                                src="../principale/tisathe/tisanes/Verveine/Vervene.svg" alt="">
                                            &ensp;Tisane
                                            Verveine</a></li>
                                </ul>

                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="../contact/contact.html">Contact</a>
                            </li>
                        </ul>
                        <a href="#" class="cart-icon ms-lg-3" id="openCart">
                            <i class="fas fa-shopping-cart"></i> <span class="cart-count">0</span>
                        </a>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <style>
        /* Styles pour les items du panier */
        #cart-items .cart-item {
            font-size: 1.2rem;
            padding: 12px 0;
            border-bottom: 2px solid #ddd;
        }

        #cart-items .cart-item img {
            width: 80px;
            height: 80px;
            border-radius: 8px;
            object-fit: cover;
        }

        #cart-items .cart-item label {
            font-weight: 500;
            font-size: 15px;
        }

        #cart-items .cart-item .form-check-input {
            width: 20px;
            height: 20px;
            margin-right: 12px;
            cursor: pointer;
        }

        #cart-items .cart-item button.remove-item {
            font-size: 1.1rem;
            padding: 6px 10px;
        }
    </style>
    <section class="banner_section">
        <div class="container">
            <div class="banner-content">
                <h1>Contact</h1>
            </div>
        </div>
    </section>

    <section class="contact_section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center pb-5">
                    <h2 class="section-title">Besoin de nous contacter ?</h2>
                    <b>
                        <p>Vous souhaitez nous contacter ? Vous avez remarqué une erreur sur un article ? </p>
                    </b>
                </div>
                <div class="col-12 contact-form">
                    <div class="row">
                        <div class="col-lg-7 mb-5">
                            <form class="row g-3" action="" method="POST">
                                <div class="col-md-6 mb-4">
                                    <input type="text" name="nom_prenom" class="form-control"
                                        placeholder="Votre nom et prénom" required="">
                                </div>
                                <div class="col-md-6 mb-4">
                                    <input type="email" name="email" class="form-control" placeholder="Votre email"
                                        required="">
                                </div>
                                <div class="col-md-6 mb-4">
                                    <input type="text" name="adresse" class="form-control" placeholder="Votre adresse"
                                        required="">
                                </div>
                                <div class="col-md-6 mb-4">
                                    <input type="number" name="telephone" class="form-control"
                                        placeholder="Votre telephone" required="">
                                </div>
                                <div class="col-12 mb-4">
                                    <input name="message" class="form-control" placeholder="Votre Message">
                                </div>
                                <div class="col-12">
                                    <button name="envoyer" type="submit" class="btn main-btn">Envoyer</button>
                                </div>
                            </form>
                            <?php if ($success): ?>
                                <p class="product-detail">
                                <div
                                    style="margin-top: 20px; padding: 24px; color: #3c763d; font-size: 24px;  font-weight: bold; text-align: center;">
                                    ✔ Merci, votre message a été envoyé avec succès ! </div>
                                </p>
                            <?php elseif ($error): ?>
                                <p class="error">
                                    <?= htmlspecialchars($error) ?>
                                </p>
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-5 mb-5">
                            <div class="content-box ms-sm-5">
                                <ul class="info-box clearfix">
                                    <li>

                                        <h2><b>
                                                <p>On vous répond au plus vite</p>
                                            </b></h2>
                                        <p>TaZza est un site d'information, pour des corrections sur le contenu, des
                                            partenariats ou tout autres demandes, veuillez passer par ce formulaire.</p>
                                        <p>Nous recevrons votre message et vous répondrons dans les meilleurs délais.
                                        </p>
                                        <p>À très vite autour d'une tasse de thé !</p>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Panier Modal -->
            <div class="modal fade" id="cartModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-lg"><!-- plus large -->
                    <div class="modal-content">
                        <div class="modal-header"
                            style="background: linear-gradient(to right, #0f7404, #5cb917); color: white;">
                            <h5 class="modal-title" style="font-size: 1.7rem;">🛒 Votre Panier</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body" id="cart-items" style="font-size: 1.2rem;">
                            <!-- Les articles du panier s'affichent ici dynamiquement -->
                        </div>
                        <div class="me-auto" style="font-size: 1.6rem; font-weight: bold; margin-left: 10px; ">
                            Total : <span id="cart-total-price">0.00</span> €
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-sm main-btn px-3 py-2" id="orderSelected"
                                style="font-size: 14px;">
                                <i class="fas fa-check" style="font-size: 1rem;"></i> FINALISER MA COMMANDE
                            </button>
                            <button type="button" class="btn btn-sm main-btn px-3 py-2"
                                style="background: #ccc; color: #333; font-size: 14px;" data-bs-dismiss="modal">
                                CONTINUER MES ACHATS
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Formulaire Client Modal -->
            <div class="modal fade" id="clientModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-md"><!-- taille moyenne -->
                    <form id="client-form" class="modal-content" style="font-size: 1.5rem;">
                        <div class="modal-header"
                            style="background: linear-gradient(to right, #0f7404, #5cb917); color: white;">
                            <h5 class="modal-title" style="font-size: 1.6rem;">Finaliser la commande</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Produit sélectionné -->
                            <input type="hidden" id="selected-product-name" name="produit" required>

                            <!-- Infos client -->
                            <div class="mb-3">
                                <label for="nom" class="form-label">Nom complet</label>
                                <input type="text" class="form-control form-control-lg" id="nom" name="nom" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control form-control-lg" id="email" name="email"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label for="telephone" class="form-label">Numéro de téléphone</label>
                                <input type="tel" class="form-control form-control-lg" id="telephone" name="telephone"
                                    required pattern="[0-9]{8,15}" placeholder="Ex: 0600000000">
                            </div>

                            <div class="mb-3">
                                <label for="adresse" class="form-label">Adresse</label>
                                <input type="text" class="form-control form-control-lg" id="adresse" name="adresse"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label for="codepostal" class="form-label">Code Postal</label>
                                <input type="text" class="form-control form-control-lg" id="codepostal"
                                    name="codepostal" required pattern="\d{4,5}">
                            </div>

                            <div class="mb-3">
                                <label for="ville" class="form-label">Ville</label>
                                <input type="text" class="form-control form-control-lg" id="ville" name="ville"
                                    required>
                            </div>

                            <!-- Choix de livraison -->
                            <div class="mb-3" style="font-size: 1.5rem;">
                                <label class="form-label">Mode de réception :</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="livraison" id="livraison"
                                        value="livraison" required>
                                    <label class="form-check-label" for="livraison">Livraison</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="livraison" id="retrait"
                                        value="retrait">
                                    <label class="form-check-label" for="retrait">Retrait</label>
                                </div>
                            </div>

                            <!-- Accepter les conditions -->
                            <div class="form-check mb-3" style="font-size: 1.rem;">
                                <input class="form-check-input" type="checkbox" id="conditions" required>
                                <label class="form-check-label" for="conditions">
                                    J'accepte les conditions générales de vente
                                </label>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn main-btn btn-lg" style="font-size: 1.2rem;">Valider la
                                commande</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--Contact Section Exit -->

    <!-- Footer section Start-->
    <section class="footer_wrapper mt-3 mt-md-0">
        <div class="container px-5 px-lg-0">
            <div class="row">
                <div class="col-lg-3 col-sm-6 mb-5 mb-lg-0">
                    <h5>Tout savoir sur le thé</h5>
                    <ul class="link-widget p-0">
                        <li><a href="../thes/noir.html">Thé Noir</a></li>
                        <li><a href="../thes/blanc.html">Thé Blanc</a></li>
                        <li><a href="../thes/vert.html">Thé Vert</a></li>
                        <li><a href="../thes/aromatise.html">Thé Aromatisé</a></li>
                        <li><a href="../thes/fumer.html">Thé Fumé</a></li>
                        <li><a href="../thes/matcha.html">Thé Matcha</a></li>
                        <li><a href="../thes/Oolong.html">Thé Oolong</a></li>
                        <li><a href="../thes/PuErh.html">Thé PuErh</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-sm-6 mb-5 mb-lg-0">
                    <h5>Tout savoir sur le Tisane</h5>
                    <ul class="link-widget p-0">
                        <li><a href="../tisanes/Camomille.html">Camomille</a></li>
                        <li><a href="../tisanes/Rooibos.html">Rooibos</a></li>
                        <li><a href="../tisanes/thym.html">Thym</a></li>
                        <li><a href="../tisanes/Verveine.html">Verveine</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-sm-6 mb-5 mb-lg-0">
                    <h5>Tous nos conseils</h5>
                    <ul class="link-widget p-0">
                        <li><a href="#">Astuces</a></li>
                        <li><a href="#">Santé</a></li>
                        <li><a href="#">Gastronomie</a></li>
                        <li><a href="#">Comparaison</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-sm-6 mb-5 mb-lg-0">
                    <h5>Rechercher</h5>
                    <div class="form-group mb-4">
                        <input type="search" class="form-control bg-transparent" placeholder="recherchcer...">
                        <button type="submit" class="btn main-btn">Entrer</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid copyright-section">
            <p>TAZZA</p>
        </div>
    </section>
    <!-- Footer Section Exit  -->

    <!-- Bootstrap 5 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

    <!-- Custom JS -->
    <script src="../principale/script.js"></script>

    <!-- Script Panier et Formulaire -->
    <script>
        // Charger le panier depuis localStorage ou initialiser vide
        const cart = JSON.parse(localStorage.getItem("cart")) || [];

        function saveCart() {
            localStorage.setItem("cart", JSON.stringify(cart));
        }

        function updateCartDisplay() {
            const cartItems = document.getElementById("cart-items");
            cartItems.innerHTML = "";

            if (cart.length === 0) {
                cartItems.innerHTML = "<p>Votre panier est vide.</p>";
            } else {
                cart.forEach((item, i) => {
                    const row = document.createElement("div");
                    row.className = "cart-item d-flex align-items-center border-bottom pb-2 mb-2";

                    row.innerHTML = `
        <input class="form-check-input me-2 cart-checkbox" type="checkbox" value="${i}" id="check-${i}">
        <img src="${item.image}" alt="${item.name}" class="me-2" style="width: 80px; height: 80px; object-fit: cover; border-radius: 6px;">
        <div class="flex-grow-1">
            <label class="form-check-label" for="check-${i}">
                <strong>${item.name}</strong> (${item.quantity})<br><small>${item.price}</small>
            </label>
        </div>
        <button class="btn btn-sm btn-outline-danger remove-item ms-2" data-index="${i}">
            <i class="fas fa-trash"></i>
        </button>
    `;

                    // 👉 Ajouter l'écouteur pour recalculer le total à chaque sélection
                    row.querySelector(".cart-checkbox").addEventListener("change", updateCartTotal);

                    cartItems.appendChild(row);
                });

            }

            const countElem = document.querySelector(".cart-count");
            if (countElem) countElem.textContent = cart.length;
            updateCartTotal();


            saveCart(); // Sauvegarder chaque fois qu'on met à jour l'affichage
        }

        // Ajouter au panier
        document.querySelectorAll(".add-to-cart").forEach(btn => {
            btn.addEventListener("click", e => {
                e.preventDefault();
                const name = btn.getAttribute("data-product");
                const price = btn.getAttribute("data-price");
                const image = btn.getAttribute("data-image");

                const existing = cart.find(item => item.name === name);
                if (existing) {
                    existing.quantity++;
                } else {
                    cart.push({
                        name,
                        price,
                        image,
                        quantity: 1
                    });
                }

                updateCartDisplay();
            });
        });

        // Ouvrir modal panier
        const openCartBtn = document.getElementById("openCart");
        if (openCartBtn) {
            openCartBtn.addEventListener("click", e => {
                e.preventDefault();
                updateCartDisplay();
                const cartModal = new bootstrap.Modal(document.getElementById("cartModal"));
                cartModal.show();
            });
        }

        // Supprimer un article du panier
        document.getElementById("cart-items").addEventListener("click", function(e) {
            const btnRemove = e.target.closest(".remove-item");
            if (btnRemove) {
                const idx = parseInt(btnRemove.getAttribute("data-index"));
                if (!isNaN(idx)) {
                    cart.splice(idx, 1);
                    updateCartDisplay();
                }
            }
        });

        // Commander la sélection
        document.getElementById("orderSelected").addEventListener("click", () => {
            const selectedIndexes = Array.from(document.querySelectorAll(".cart-checkbox:checked"))
                .map(cb => parseInt(cb.value))
                .filter(i => !isNaN(i) && cart[i]);

            if (selectedIndexes.length === 0) {
                return alert("Veuillez sélectionner au moins un produit à commander.");
            }

            // On envoie un JSON détaillé (nom, image, prix, quantité)
            const selectedItems = selectedIndexes.map(i => ({
                name: cart[i].name,
                price: cart[i].price,
                image: cart[i].image,
                quantity: cart[i].quantity
            }));
            document.getElementById("selected-product-name").value = JSON.stringify(selectedItems);

            const clientModal = new bootstrap.Modal(document.getElementById("clientModal"));
            clientModal.show();
        });


        // compteur des prix
        function updateCartTotal() {
            let total = 0;
            const checkboxes = document.querySelectorAll(".cart-checkbox:checked");
            checkboxes.forEach(cb => {
                const index = parseInt(cb.value);
                if (!isNaN(index) && cart[index]) {
                    const item = cart[index];
                    total += parseFloat(item.price) * item.quantity;
                }
            });

            document.getElementById("cart-total-price").textContent = total.toFixed(2);
        }




        // Soumission du formulaire client
        document.getElementById("client-form").addEventListener("submit", function(e) {
            e.preventDefault();
            const data = new FormData(e.target);

            const nom = data.get("nom");
            const email = data.get("email");
            const telephone = data.get("telephone");
            const adresse = data.get("adresse");
            const codepostal = data.get("codepostal");
            const ville = data.get("ville");
            const livraison = data.get("livraison");
            const produit = data.get("produit");

            const payload = {
                nom,
                email,
                telephone,
                adresse,
                codepostal,
                ville,
                livraison,
                produit
            };

            fetch("http://localhost/Test/projet-pfe/backend/commande.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify(payload)
                })
                .then(response => {
                    if (!response.ok) throw new Error(`HTTP error ${response.status}`);
                    return response.json();
                })
                .then(result => {
                    if (result.success) {
                        alert(`Merci ${nom} !\nVotre commande a bien été enregistrée.\nProduits : ${produit}\nLivraison : ${livraison}\nAdresse : ${adresse}, ${codepostal} ${ville}\nTéléphone : ${telephone}`);
                        const clientModal = bootstrap.Modal.getInstance(document.getElementById("clientModal"));
                        clientModal.hide();
                        e.target.reset();
                        // Vider le panier et localStorage après commande
                        cart.length = 0; // vider array
                        saveCart();
                        updateCartDisplay();
                    } else {
                        alert("Erreur lors de la commande: " + (result.message || "Erreur inconnue"));
                    }
                })
                .catch(error => {
                    alert("Erreur réseau ou serveur : " + error.message);
                });
        });

        // Initialiser l'affichage du panier au chargement de la page
        document.addEventListener("DOMContentLoaded", updateCartDisplay);
    </script>



</body>

</html>