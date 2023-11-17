<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Tableau avec Tailwind CSS</title>
</head>

<body class="bg-gray-100 p-4 ">

    <div class="container mx-auto bg-white p-8 rounded-md shadow-md">
        <h1 class="text-2xl font-bold mb-4">Tableau des équipes</h1>

        <?php
        try {
            $conn = mysqli_connect('localhost', 'root', '', 'mohammed');

            if (!$conn) {
                throw new Exception('Erreur de connexion : ' . mysqli_connect_error());
            }

            // Exécution de la requête
            $contenuClient = mysqli_query($conn, 'SELECT * FROM equipes');

            if ($contenuClient === false) {
                throw new Exception('Erreur d\'exécution de la requête : ' . mysqli_error($conn));
            }

        } catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
        ?>

        <?php if ($contenuClient !== false) : ?>
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Nom de l'équipe</th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Date de création</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php while ($ligne = mysqli_fetch_assoc($contenuClient)) : ?>
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap"><?= $ligne['IDEquipe'] ?></td>
                            <td class="px-6 py-4 whitespace-no-wrap"><?= $ligne['NomEquipe'] ?></td>
                            <td class="px-6 py-4 whitespace-no-wrap"><?= $ligne['DateCreation'] ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php endif; ?>

    </div>
    <div class="container mx-auto bg-white p-8 rounded-md shadow-md">
        <h1 class="text-2xl font-bold mb-4">Tableau des membres</h1>

        <?php
        try {
            $conn = mysqli_connect('localhost', 'root', '', 'mohammed');

            if (!$conn) {
                throw new Exception('Erreur de connexion : ' . mysqli_connect_error());
            }

            // Exécution de la requête
            $contenuClient = mysqli_query($conn, 'SELECT * FROM personnel');

            if ($contenuClient === false) {
                throw new Exception('Erreur d\'exécution de la requête : ' . mysqli_error($conn));
            }

        } catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
        ?>

        <?php if ($contenuClient !== false) : ?>
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">IDPersonnel</th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Nom </th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Prenm</th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Telephone</th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Role</th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">id-equipe</th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                        
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php while ($ligne = mysqli_fetch_assoc($contenuClient)) : ?>
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap"><?= $ligne['IDPersonnel'] ?></td>
                            <td class="px-6 py-4 whitespace-no-wrap"><?= $ligne['Nom'] ?></td>
                            <td class="px-6 py-4 whitespace-no-wrap"><?= $ligne['Prenom'] ?></td>
                            <td class="px-6 py-4 whitespace-no-wrap"><?= $ligne['Email'] ?></td>
                            <td class="px-6 py-4 whitespace-no-wrap"><?= $ligne['Telephone'] ?></td>
                            <td class="px-6 py-4 whitespace-no-wrap"><?= $ligne['Role'] ?></td>
                            <td class="px-6 py-4 whitespace-no-wrap"><?= $ligne['IDEquipe'] ?></td>
                            <td class="px-6 py-4 whitespace-no-wrap"><?= $ligne['Statut'] ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php endif; ?>

    </div>
    <div class="container w-90/100 bg-white rounded-md shadow-md">
        <h1 class="text-2xl font-bold mb-4">Tableau des membres</h1>

        <?php
        try {
            $conn = mysqli_connect('localhost', 'root', '', 'mohammed');

            if (!$conn) {
                throw new Exception('Erreur de connexion : ' . mysqli_connect_error());
            }

            // Exécution de la requête
            $contenuClient = mysqli_query($conn, 'SELECT personnel.IDPersonnel, personnel.Nom, personnel.Prenom, personnel.Email,
                                                    personnel.Telephone, personnel.Role, personnel.IDEquipe, personnel.Statut, equipes.NomEquipe, equipes.DateCreation FROM personnel
                                                    INNER JOIN equipes ON personnel.IDEquipe = equipes.IDEquipe');

            if ($contenuClient === false) {
                throw new Exception('Erreur d\'exécution de la requête : ' . mysqli_error($conn));
            }

        } catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
        ?>

        <?php if ($contenuClient !== false) : ?>
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">IDPersonnel</th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Nom </th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Prenm</th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Telephone</th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Role</th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">id-equipe</th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Nome-equipe</th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">date de creation</th>
                        
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php while ($ligne = mysqli_fetch_assoc($contenuClient)) : ?>
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap"><?= $ligne['IDPersonnel'] ?></td>
                            <td class="px-6 py-4 whitespace-no-wrap"><?= $ligne['Nom'] ?></td>
                            <td class="px-6 py-4 whitespace-no-wrap"><?= $ligne['Prenom'] ?></td>
                            <td class="px-6 py-4 whitespace-no-wrap"><?= $ligne['Email'] ?></td>
                            <td class="px-6 py-4 whitespace-no-wrap"><?= $ligne['Telephone'] ?></td>
                            <td class="px-6 py-4 whitespace-no-wrap"><?= $ligne['Role'] ?></td>
                            <td class="px-6 py-4 whitespace-no-wrap"><?= $ligne['IDEquipe'] ?></td>
                            <td class="px-6 py-4 whitespace-no-wrap"><?= $ligne['Statut'] ?></td>
                            <td class="px-6 py-4 whitespace-no-wrap"><?= $ligne['NomEquipe'] ?></td>
                            <td class="px-6 py-4 whitespace-no-wrap"><?= $ligne['DateCreation'] ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php endif; ?>

    </div>
    

</body>

</html>
