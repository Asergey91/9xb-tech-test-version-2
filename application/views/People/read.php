<br><br>
<center>
<div class='row'>
<div class="col-xs-12 col-md-8 col-md-offset-2">
<div class='well'>
<form action="<?php echo $base_url?>index.php/People/submit" method="post">
    <?php
    $csrf=[
        'name' => $this->security->get_csrf_token_name(),
        'hash' => $this->security->get_csrf_hash()
    ];
    echo '<input type="hidden" name="'.$csrf['name'].'" value="'.$csrf['hash'].'" />';
    ?>
    <fieldset>
    <legend>9xb Technical Test</legend>
    <table>
        <tr>
            <th>First name</th>
            <th>Last name</th>
            <th>Email Address</th>
            <th>Job Role</th>
            <th>Delete</th>
        </tr>
        <?php
        $counter=0;
        foreach ($people as $person) {
        echo'
        <tr>
            <input type="hidden" name="people['.$counter.'][id]" value="'.$person['id'].'" />
            <td><div class="form-group"><input type="text" name="people['.$counter.'][first_name]" value="'.$person['first_name'].'" class="form-control"/></div></td>
            <td><div class="form-group"><input type="text" name="people['.$counter.'][last_name]" value="'.$person['last_name'].'" class="form-control"/></div></td>
            <td><div class="form-group"><input type="text" name="people['.$counter.'][email]" value="'.$person['email'].'" class="form-control"/></div></td>
            <td><div class="form-group"><input type="text" name="people['.$counter.'][job_role]" value="'.$person['job_role'].'" class="form-control"/></div></td>
            <td><div class="form-group"><div class="checkbox"><label><input type="checkbox" name="people['.$counter.'][delete]" value="1"></label></div></div></td>
        </tr>
        ';
        $counter++;
        }
        if($counter<10){
        echo'
        <tr>
            <td><div class="form-group"><input type="text" name="people['.$counter.'][first_name]" placeholder="Add new..." class="form-control"/></div></td>
            <td><div class="form-group"><input type="text" name="people['.$counter.'][last_name]" placeholder="Add new..." class="form-control"/></div></td>
            <td><div class="form-group"><input type="text" name="people['.$counter.'][email]" placeholder="Add new..." class="form-control"/></div></td>
            <td><div class="form-group"><input type="text" name="people['.$counter.'][job_role]" placeholder="Add new..." class="form-control"/></div></td>
        </tr>
        ';}
        ?>
    </table>
    <br><br>
    <button type="submit" class="btn btn-primary btn-raised pull-right" />Submit!</button>
    </fieldset>
</form>
</div>
</div>
</div>
</center>