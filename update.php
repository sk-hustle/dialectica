<?php
require_once("header.php");

// get id 
$id = $_GET['id'];
$question = $_POST['question'];

include 'includes/mindset.inc.php';

$object = new Mindset;
$advantage = "Advantage";
$disadvantage = "Disadvantage";
$argument = "Argument";
$counterargument = "Counter-argument";
$thesis = "Thesis";
$antithesis = "Antithesis";

?>


<div class="container col-sm-12">

    <div class="row">
        <div class="col-sm-12">
        <form id="send" method="POST" action="update.php?id=<?php echo $id;?>">
            
            <input type='text' name='question' placeholder='<?php $object->getQuestion($id); ?>'/>
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