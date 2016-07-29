<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/styles.css" rel="stylesheet">
        <title>Mon site MVC</title>
    </head>

    <body class="container-fluid">
        
        <div class="row">
            <header class="col-md-12 well">
                <h1>Chapitre</h1>
                
                <nav class="col-md-12">
                    <ul class="nav nav-pills">
                        <li><?php echo linkToController('mainController', 'Accueil')?></li>
                        <li><?php echo linkToController('testController', 'Test')?></li>
                        <li><?php echo linkToController('catalogue', 'Catalogue')?></li>
                    </ul>
                </nav>
            </header>

            <div class="col-md-12">
                <?php echo $viewContent ?>
            </div>
        </div>
    </body>
</html>


