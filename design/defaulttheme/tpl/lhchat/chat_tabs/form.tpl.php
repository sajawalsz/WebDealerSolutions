<div class="form-group">
    <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('lhchat/chat_tabs','Name');?></label>
    <input type="text" id="txt" class="form-control" name="Name"  value="" />
</div>

<div class="form-group">
    <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('lhchat/chat_tabs','E-mail');?></label>
    <input type="text" id="txt1" class="form-control" name="Email"  value="" />
</div>

<div class="form-group">
    <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('lhchat/chat_tabst','Phone');?></label>
    <input type="text" id="txt2" class="form-control" name="Phone"  value="" />
</div>

<div class="form-group">
    <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('lhchat/chat_tabst','Comments');?></label>
    <input type="text" id="txt3" class="form-control" name="Comments"  value="" />
</div>

<div class="form-group">
    <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('lhchat/chat_tabs','Team');?></label>
    <input type="text" id="txt4" class="form-control" name="Team"  value="" />
</div>

<div class="btn-group" role="group" aria-label="...">
         <input type="submit" class="btn btn-default" name="Save_departament" onclick="myFunction()" value="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('system/buttons','Submit');?>"/>
</div>

<div>
    <br />
    <p id="demo"></p>
    <p id="demo1"></p>
    <p id="demo2"></p>
    <p id="demo3"></p>
 

</div>

<script>
    function myFunction() {
        var x = document.getElementById("txt").value;
        document.getElementById("demo").innerHTML = x;

        var y = document.getElementById("txt1").value;
        document.getElementById("demo1").innerHTML = y;

        var z = document.getElementById("txt2").value;
        document.getElementById("demo2").innerHTML = z;

        var a = document.getElementById("txt3").value;
        document.getElementById("demo3").innerHTML = a;
    }
</script>
