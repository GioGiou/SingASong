
<?php echo validation_errors(); ?>

<?php echo form_open('event/create'); ?>

    <label for="title">Naslov</label>
    <input type="input" name="title" /><br />
    <label for="kraj">Kraj</label>
    <input type="input" name="kraj" /><br />
    <label for="datum">Datum</label>
    <input type="date" name="datum" /><br />

    <label for="text">Text</label>
    <textarea name="text"></textarea><br />

    <input type="submit" name="submit" value="Dodaj nov dogodek" />

</form>