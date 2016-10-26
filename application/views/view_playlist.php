<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Playlist Manager</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	 <!-- Load style for Bootstrap  -->
    <link rel="stylesheet" href=" <?php echo base_url(); ?>assets/css/bootstrap.min.css" />
	<!-- Load Jquery -->
    <script src=" <?php echo base_url(); ?>assets/js/jquery.min.js"></script>
	<!-- Load JS for Bootstrap -->
    <script src=" <?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
</head>
<body>
<div id="container">
    <div class="container">
        <!-- Row for tittle -->
        <div class="page-header">
                <h1 clas="center"><dt>Playlist Manager</dt></h1>
        </div>
        <!-- Row for table -->
        <div class="row">
            <div class="col-md-7 col-sm-7">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Listas</th>
                        </tr>
                    </thead>
                    <tbody>
                    <!-- Load the playlists -->
                    <?php if(sizeof($playlists)>0) { foreach($playlists as $object) { ?>
                        <tr>
                            <td><?php echo $object->name ?></td>
                            <td class="text-center"><a href="<?php echo site_url("controller_video/load_videos/{$object->id_playlist}"); ?>" class="btn btn-link center">Editar</a></td>
                            <td class="text-center"><a href="<?php echo site_url("controller_video/load_playid/{$object->id_playlist}"); ?>" class="btn btn-link center">Ver</a></td>
                        </tr>
                    <?php } } ?>
                    </tbody>
                </table>
            </div>
            <!-- Jumbtron for save new playlist -->
            <div class="col-md-5 col-sm-5 ">
                <div class="jumbotron ">
                    <form role="form" method="post" action="<?php echo site_url('controller_playlist/insert_playlist'); ?>">
                        <div class="form-group">
                            <label for="name">Nuevo playlist:</label>
                            <input type="text" class="form-control" name="name" placeholder="Nombre del playlist" />
                        </div>
                        <div class="text-right">
                            <input type="submit" class="btn btn-primary text-right" value="Guardar" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>