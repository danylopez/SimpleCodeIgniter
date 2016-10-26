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
                <h1 clas="center"><dt>Playlist Manager - <?php echo $playlist[0]->name;?> (Editando)</dt></h1>
        </div>
        <!-- Row for table -->
        <div class="row">
            <div class="col-md-7 col-sm-7">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Videos </th>
                        </tr>
                    </thead>
                    <tbody>
                    <!-- Load the videos (playlist) -->
                    <?php if(empty($videos)) { ?>
                        <tr><td><?php echo "No hay videos." ?></td></tr>
                    <?php } else {  ?>
                    <?php foreach($videos as $object) { ?>
                        <tr>
                            <td>
                                <a href="<?php echo site_url("controller_video/load_play/{$object->id_video}"); ?>" class="btn btn-link center"><?php echo $object->name ?></a>
                            </td>
                            
                            <td class="text-center">
                                <a href="<?php echo site_url("controller_video/delete_video/{$object->id_video}"); ?>" class="btn btn-default center">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                    <?php }  ?>
                    </tbody>
                </table>
            </div>
            <!-- Jumbtron for save new video -->
            <div class="col-md-5 col-sm-5 ">
                <div class="jumbotron ">
                    <form role="form" method="post" action="<?php echo site_url('controller_video/insert_video/');echo "/"; echo $playlist[0]->id_playlist;?>">
                        <div class="form-group">
                            <label for="name">Nuevo video a la lista:</label>
                            <input type="text" class="form-control" name="name" placeholder="Nombre del video" />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="url" placeholder="URL del video (Youtube)" />
                        </div>
                        <input style="visibility:hidden;padding:0 0 0 0;width:0px;height:0px;" hidden type="text" class="form-control" name="id_playlist" value="<?php echo $playlist[0]->id_playlist;?>" />
                        <div class="text-right">
                            <input type="submit" class="btn btn-primary text-right" value="Guardar" />
                        </div>
                    </form>
                </div>
                <a href="<?php echo site_url("Controller_playlist/index"); ?>" class="btn btn-primary text-right">Regresar</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>