<?php

// Get DB connection info
require_once("db_connection.php");

// Make the PDO query
$query = $dbcon->prepare('SELECT * FROM cool_websites');
$query->execute();

// Put all of the results into an array
$cool_websites = $query->fetchAll();


// Cool way to look at arrays
// echo ('<pre>');
// print_r($cool_websites);
// echo ('</pre>');

// Prints 'uccs.edu'. Notice the [0]
// echo($cool_websites[0]['name']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Playground</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <h1>PHP Playground</h1>
        </div>

        <div class="row mt-5">
            <div class="col">
                <div class="d-flex justify-content-between">
                    <h2>Super Cool Websites</h2>
                    <a href="/add.php" class="btn btn-primary mb-2">Add new cool website</a>
                </div>
                
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Link</th>
                        <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $counter = 1;

                        foreach($cool_websites as $website) 
                        {
                        ?>

                            <tr>
                            <th scope="row"><?php echo $counter; ?></th>
                            <td><?php echo($website['name']); ?></td>
                            <td><a href="https://<?php echo($website['link']); ?>" target="_blank"><?php echo($website['link']); ?></a></td>
                            <td><?php echo($website['description']); ?></td>
                            </tr>

                        <?php
                            $counter++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row mt-5">
            <!-- Vue JS instance -->
            <div class="col" id="cool-sites">
                <form action="">
                    <input v-model="exampleText" placeholder="edit me">
                </form>
                <p>{{ exampleText }}</p>
                <div class="d-flex justify-content-between">
                    <h2>VueJS Example</h2>
                    <button class="btn btn-primary mb-2 live-updates-button" 
                          v-on:click="(liveUpdates ? liveUpdates = false : liveUpdates = true); (liveUpdates ? isLoading = true : isLoading = false); getSitesAjax(); "
                          v-bind:class="{ 'btn-danger live-pulse': liveUpdates, 'spinner-grow': isLoading } ">
                          {{ buttonText }}
                  </button>
                </div>
    
                <div>
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Link</th>
                            <th scope="col">Description</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr v-for="site in coolSiteList">
                            <th scope="row"></th>
                            <td>{{ site.name }}</td>
                            <td><a v-bind:href="'https://' + site.link" target="_blank">{{ site.link }}</a></td>
                            <td>{{ site.description }}</td>
                            </tr>

                        </tbody>
                    </table>
                
                </div>
            </div>

            
        </div>

        <div class="row button-example">
            <p>{{ buttonText }}</p>
            <button v-on:click="changeButtonText();" class="btn btn-primary">Change text</button>
        </div>
        
    </div>

    <!-- Get VueJS -->
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script> 

    <!-- Get the Almighty -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>

    <!-- Get out script -->
    <script src="scripts.js"></script>
    
</body>
</html>

