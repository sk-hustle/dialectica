<?php
require_once("header.php");
include 'includes/model.inc.php';

$object = new Model;
$id = $_GET['id'];
$question = $_POST['question'];
$advantage = "Advantage";
$disadvantage = "Disadvantage";
$argument = "Argument";
$counterargument = "Counter-argument";
$thesis = "Thesis";
$antithesis = "Antithesis";

?>

<div class="container col-sm-12">

    <div class="row">
        <div class="col-sm-offset-3 col-sm-4">
            <h1>Update Question <?php echo $id;?></h1>
            <form id="send" method="POST" action="update.php?id=<?php echo $id;?>">
                <div class="form-group">
                    <input class="form-control" type='text' name='question' placeholder='<?php $object->getQuestion($id); ?>'/>
                </div>
                <button type="submit" class="btn btn-success">Speichern</button>
                <button type="button" class="btn btn-danger" onclick="location.href='/proj/proj7';">Go Back</button>
            </form>
            
            <?php
            if (isset($question) && !empty($question)){
                $object->updateQuestion($id, $question);
                echo "Fragetitel zu " . $id . " geaendert";
            }
            ?>
        </div>
    </div>
</div>

<?php require_once("footer.php");?>