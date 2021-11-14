 <!DOCTYPE html>
    <html>
        <head>
            <title>CRUD System</title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="css/bootstrap.min.css">
            <script src="js/bootstrap.min.js"></script>
            <script src="js/jquery.min.js"></script>
            <script src="js/jquery.validate.min.js"></script>
            <style>
                .fluid-container{
                    background-color: azure;
                    height: 875px;
                }
                .sticky{
                    position: fixed;
                    width: 100%;
                    bottom: 0;
                }
            </style>
            <?php require_once 'process.php';?>
        </head>
        <body>
            <nav class="navbar navbar-dark navbar-top bg-dark justify-content-center sticky-top">
                <a class="navbar-brand" href="#" style="color: aqua;"><img src="images/server.png" width="25px"></img> CRUD SYSTEM</a>
            </nav>
            <div class="fluid-container">
                <div class="row">
                    <div class="col-md-3 pt-3 pl-5">
                        <form action="process.php" method="POST" id="regform" novalidate>
                            <input type="hidden" name="id" value="<?php echo $id ?>">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Md./Mst. Abc" value="<?php echo $name ?>" maxlength="30" required>
                            </div>
                            <div class="form-group">
                                <label for="fName">Father's Name</label>
                                <input type="text" class="form-control" id="fName" name="fName" placeholder="Md. Abc" value="<?php echo $fName ?>" maxlength="30" required>
                            </div>
                            <div class="form-group">
                                <label for="mName">Mother's Name</label>
                                <input type="text" class="form-control" id="mName" name="mName" placeholder="Mst. Abc" value="<?php echo $mName ?>" maxlength="30" required>
                            </div>
                            <div class="form-group">
                                <label for="age">Age</label>
                                <input type="text" class="form-control" id="age" name="age" value="<?php echo $age ?>" pattern="[0-9$,.]*" maxlength="3" required>
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select class="form-control" name="gender" id="gender" required>
                                    <option value="" disabled selected>Please Select</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="abc@email.com" value="<?php echo $email ?>" maxlength="30" required>
                            </div>
                            <div class="form-group">
                                <label for="pass">Password</label>
                                <input type="password" class="form-control" id="pass" name="pass" aria-describedby="hint" minlength="8" maxlength="20" required>
                                <small id="hint" class="form-text text-muted">minimum 8 characters</small>
                            </div>
                            <?php if($update): ?>
                                <div class="form-group pt-3">
                                    <button type="submit" class="btn btn-primary btn-block" name="update" id="update">UPDATE</button>
                                </div>
                                <div class="form-group">
                                    <a class="btn btn-warning btn-block" href="index.php" name="cancel" id="cancel">CANCEL</a>
                                </div>
                            <?php else: ?>
                                <div class="form-group pt-3">
                                    <button type="submit" class="btn btn-success btn-block" name="save" id="save">ADD ENTRY</button>
                                </div>
                            <?php endif; ?>
                        </form>
                    </div>
                    <div class="col-md-9 pt-5 px-5">
                        <label for="table" style="color: darkslategrey;"><strong>DATABASE ENTRIES</strong></label>
                        <table class="table table-bordered table-hover" id="table" name="table">
                            <thead class="thead-dark">
                                <th>ID</th>
                                <th>NAME</th>
                                <th>FATHER'S NAME</th>
                                <th>MOTHER'S NAME</th>
                                <th>AGE</th>
                                <th>GENDER</th>
                                <th>EMAIL</th>
                                <th>PASSWORD</th>
                                <th><center>OPERATIONS</center></th>
                            </thead>
                            <?php
                                $con = mysqli_connect('localhost','root','','phone') or die(mysqli_connect_error($con));
                                $result = mysqli_query($con,"SELECT * FROM information") or die(mysqli_error());
                            ?>
                            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $row["id"] ?></td>
                                    <td><?php echo $row["name"] ?></td>
                                    <td><?php echo $row["fatherName"] ?></td>
                                    <td><?php echo $row["motherName"] ?></td>
                                    <td><?php echo $row["age"] ?></td>
                                    <td><?php echo $row["gender"] ?></td>
                                    <td><?php echo $row["email"] ?></td>
                                    <td><?php echo $row["password"] ?></td>
                                    <td>
                                        <center>
                                            <a type="button" class="btn btn-primary btn-sm" name="edit" href="index.php?edit=<?php echo $row['id']; ?>"><img src="images/edit.png" width="15px" height="15px"></img></a>
                                            <a type="button" class="btn btn-danger btn-sm" name="delete" href="index.php?delete=<?php echo $row['id']; ?>"><img src="images/bin.png" width="15px" height="15px"></img></a>
                                        </center>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <script>
                $(function () {
                    jQuery.validator.setDefaults({
                        highlight: function (element) {
                            jQuery(element).closest('.form-control').addClass('is-invalid');
                        },
                        unhighlight: function (element) {
                            jQuery(element).closest('.form-control').removeClass('is-invalid');
                            jQuery(element).closest('.form-control').addClass('is-valid');
                        },
                        errorElement: 'span',
                        errorClass: 'invalid-feedback',
                        errorPlacement: function (error, element) {
                            if(element.parent('.form-check').length){
                                $(element).siblings('.form-check-label').append(error);
                                error.insertAfter(element.parent());
                            }
                            else {
                                error.insertAfter(element);
                            }
                        }
                    });
                    $('#regform').validate();
                })
            </script>
        </body>
        <footer>
            <div class="navbar navbar-dark navbar-bottom bg-dark justify-content-center sticky" style="color: grey;">Copyright &copy; Kamrul Haque</div>
        </footer>
 </html>