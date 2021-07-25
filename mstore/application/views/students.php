<form action="<?php echo base_url(); ?>marketplace/add_selected_student" method="post">
    <button type="submit" name="submit" class="btn btn-danger">Add Selected</button>
    <table class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr class="btn-primary">
                <th></th>
                <th>S.no.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($student_list as $student) { ?>
                <tr>
                    <td>
                        <input type="checkbox" name="student_id[]" value="<?php echo $student->id; ?>" <?php if ($student->id == $student->student_id) {
                                                                                                            echo 'checked disabled';
                                                                                                        } ?>>
                    </td>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $student->name; ?></td>
                    <td><?php echo $student->email; ?></td>
                    <td><?php echo $student->phone; ?></td>
                </tr>
            <?php $i++;
            } ?>

        </tbody>
    </table>
</form>
<?php if ($error = $this->session->flashdata('msg')) { ?>
    <div class="alert alert-success" id="msg">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>Success!</strong> <?php echo  $error; ?>
    </div>
<?php } ?>