<?php
// Vulnérabilité LFI (sans filtrage)
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
@include($page);

// Upload vulnérable
if (isset($_FILES['file'])) {
    $target = 'uploads/' . basename($_FILES['file']['name']);
    move_uploaded_file($_FILES['file']['tmp_name'], $target);
    echo "<p style='color: lime;'>Fichier uploadé dans <code>$target</code></p>";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Cyber-Espace | Infos & Dossiers</title>
  <style>
    body {
      background-color: #0d1117;
      color: #c9d1d9;
      font-family: monospace;
      margin: 0;
      padding: 20px;
    }
    header {
      background-color: #161b22;
      padding: 10px;
      text-align: center;
      border-bottom: 1px solid #30363d;
    }
    h1 {
      color: #58a6ff;
    }
    section {
      margin-top: 20px;
    }
    a {
      color: #58a6ff;
    }
    .note {
      background: #161b22;
      padding: 10px;
      border: 1px dashed #8b949e;
      margin-top: 10px;
    }
    .upload {
      margin-top: 30px;
      background: #161b22;
      padding: 15px;
      border: 1px solid #30363d;
    }
  </style>
</head>
<body>

<header>
  <h1>Cyber-Espace : Dossiers & Enquêtes</h1>
</header>

<section>
  <h2>Hackers, hacktivistes et cybersécurité</h2>
  <p>
    Le mot "hacker" est souvent mal compris. À l'origine, un hacker est une personne passionnée par les technologies, capable de contourner ou de comprendre profondément un système.
  </p>
  <p>
    Il existe plusieurs types de hackers :
    <ul>
      <li><strong>White Hat</strong> : Éthiques, ils aident à sécuriser les systèmes.</li>
      <li><strong>Black Hat</strong> : Criminels, ils exploitent les failles pour voler ou saboter.</li>
      <li><strong>Grey Hat</strong> : À la limite, ils révèlent des failles mais sans autorisation.</li>
    </ul>
  </p>

  <h3>Les hacktivistes</h3>
  <p>
    Un <strong>hacktiviste</strong> utilise ses compétences pour défendre une cause (liberté d’expression, lutte contre la censure, etc.). Des groupes comme Anonymous sont connus pour cela.
  </p>

  <div class="note">
    Astuce sécurité : Les fichiers inclus dynamiquement doivent être strictement validés et ne jamais contenir de chemins arbitraires transmis par les utilisateurs.
  </div>

  <h3>Explorez nos articles</h3>
  <p>
    <a href="?page=rce.php&cmd=id">remote cmd inject</a><br>
    <a href="?page=docs/cyberdefense.txt">Cyberdéfense et entreprises</a><br>
    <a href="?page=../../../../../../etc/passwd">/etc/passwd (exemple LFI)</a><br>
    <a href="?page=../../../../../../etc/hosts">/etc/hosts (exemple LFI)</a><br>
    <a href="?page=/etc/shadow">/etc/shadow (exemple LFI)</a><br>
    <a href="?page=uploads/shell.php">Tester un upload via LFI</a><br>
    <a href="?page=uploads/example.txt">Fichier exemple.txt (pour tests)</a>
  </p>

  <div class="upload">
    <h3>Uploader un fichier</h3>
    <form method="POST" enctype="multipart/form-data">
      <input type="file" name="file"><br><br>
      <input type="submit" value="Uploader le fichier">
    </form>
    <p style="font-size: 0.9em;">Vous pouvez uploader un fichier PHP (ex: shell) dans le dossier <code>uploads/</code>, puis y accéder via LFI.</p>
  </div>
</section>

</body>
</html>
