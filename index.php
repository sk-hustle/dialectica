<?php
require_once("header.php");
include 'includes/model.inc.php';

$object = new Model;
$categorie = $_POST['categorie'];
$delete = $_GET['delete'];
$question = $_POST['question'];
$categorie_id = $_POST['categorie_id'];

?>

<div class="container col-sm-12">
    
    <!-- NEUE QUESTION ANLEGEN-->
    <div class="row">
        <div class="col-sm-offset-4 col-sm-3 text-center">
            <h1>Questions</h1>
            <form id="send" method="POST" action="index.php">
                
            <div class="form-group">    
                <input class="form-control" id="question" type="text" name="question" placeholder="add new question" required/>
            </div>

            <div class="form-group">  
                <select class="form-control" id="categorie_id" name="categorie_id">
                    <?php $object->getOptionCategories(); ?>
                </select>
            </div>   
                
            <button type="submit" class="btn btn-primary">Create New Question</button>
            </form>
            
            <?php
            if (isset($question) && isset($categorie_id)){
                
                $object->setQuestion($question, $categorie_id);
            }
            ?>
            
        </div>
    </div>
    <!-- NEUE QUESTION ANLEGEN-->
    
    
    <!-- QUESTIONS TABELLE ANZEIGEN-->
    <div class="row">
        <div class="col-sm-offset-3 col-sm-6">
            <!-- Tabelle um Datensätze anzuzeigen-->
            <table class="table table-bordered table-striped" style="width:800px">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Categorie</th>
                    <th>Read</th>
                    <th>Update</th>
                    <th>Delete</th>
                    <th>Wiki</th>
                </tr>
            </thead>
            <tbody>
                <?php $object->getQuestions(); ?>
            </tbody>
            </table>
            <?php 
            if(isset($delete) && !empty($delete)){
                
                $object->deleteQuestion($delete);
            }
            ?>
            
        </div>
    </div>
    <!-- QUESTIONS TABELLE ANZEIGEN-->

    <!-- NEUE CATEGORIES ANLEGEN-->
    <div class="row">
        <div class="col-sm-offset-4 col-sm-3 text-center">
            <h1>Categories</h1>
            <!--Formular um neue Kategorien hinzuzufügen-->
            <form id="send" method="POST" action="index.php">
                
                <div class="form-group">
                    <input class="form-control" id="categorie" type="text" name="categorie" placeholder="add new categorie" required/>
                </div>
                
                <button type="submit" class="btn btn-primary">Create New Categorie</button>
                
            </form>
            
            <?php
            if (isset($categorie)){
                
                $object->setCategorie($categorie);
            }
            ?>
        </div>
    </div>
    <!-- NEUE CATEGORIES ANLEGEN-->
    
    
    <!-- CATEGORIES TABELLE -->
    <div class="row">
        <div class="col-sm-offset-3 col-sm-6">
            <table class="table table-bordered table-striped" style="width:800px">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Categories</th>
                </tr>
            </thead>
            <tbody>
                <?php $object->getCategories(); ?>
            </tbody>
            </table>
        </div>
    </div>
    <!-- CATEGORIES TABELLE -->
    
    <!-- INFO -->
    <div class="row">
        <div class="col-sm-offset-3 col-sm-6">
             <?php include 'mindsetinfo.php' // Infos zu Mindset;?>
        </div>
    </div>
    <!-- INFO -->
    
</div>


<?php require_once("footer.php");?>
