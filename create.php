<?php
require_once("header.php");

// get id 
$id = $_GET['id'];

include 'includes/mindset.inc.php';

$object = new Mindset;
$advantage = "Advantage";
$disadvantage = "Disadvantage";
$argument = "Argument";
$counterargument = "Counter-argument";
$thesis = "Thesis";
$antithesis = "Antithesis";

$answer = $_POST['answer'];
$fileupload = $_POST['file_upload'];
$mindset = $_REQUEST['mindset'];

?>

<div class="container col-sm-12">
    <div class="row">
        <div class="col-sm-offset-3 col-sm-6">
        <button type="button" onclick="location.href='/proj/proj7/read.php?id=<?php echo $id;?>';" 
                class="btn btn-danger">Go Back to Question <?php echo $id;?></button>
        <h1><?php $object->getQuestion($id); ?></h1>   
        
        <!--Frage neue Antworten hinzuzufügen-->
        <form id="send" method="POST" action="/proj/proj7/create.php?id=<?php echo $id;?>">
            <div>
                <input id="answer" type="text" name="answer" placeholder="new answer"/>
            </div>
            <div>
                <input id="file_upload" type="text" name="file_upload" placeholder="new file_upload"/>
            </div>
            <div>
                <select class="form-control" id="sel1" name="mindset" style="width:175px">
                    
                    <option value='<?php echo $mindset;?>' selected><?php echo $mindset;?></option>
                    
                    <?php
                        $object->getMindsets($mindset);
                    ?>
                    
                </select>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Create New Answer</button>
            </div>
        </form>
        
        <?php
        if(isset($answer) && !empty($answer) &&
            isset($fileupload) && !empty($fileupload) &&
            isset($mindset) && !empty($mindset))
        {
            $object->setAnswer($id, $answer, $fileupload, $mindset);
            echo "Antwort erstellt zu " . $id . "!";
        }
        ?>
        </div>
    </div> 
</div>

<?php require_once("footer.php");?>
